<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Seminar;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $query = Participant::with('seminar');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        }

        $participants = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $seminars = Seminar::where('is_active', true)
                          ->where('date', '>=', now()->toDateString())
                          ->get();
        
        return view('participants.create', compact('seminars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'institution' => 'nullable|string|max:255',
            'seminar_id' => 'required|exists:seminars,id'
        ]);

        // Check available slots
        $seminar = Seminar::findOrFail($request->seminar_id);
        if ($seminar->available_slots <= 0) {
            return back()->withErrors(['seminar_id' => 'Seminar sudah penuh!']);
        }

        Participant::create($request->all());

        return redirect()->route('participants.index')
                        ->with('success', 'Pendaftaran berhasil!');
    }

    public function show(Participant $participant)
    {
        $participant->load('seminar');
        return view('participants.show', compact('participant'));
    }

    public function edit(Participant $participant)
    {
        $seminars = Seminar::where('is_active', true)->get();
        return view('participants.edit', compact('participant', 'seminars'));
    }

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $participant->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'institution' => 'nullable|string|max:255',
            'seminar_id' => 'required|exists:seminars,id',
            'status' => 'required|in:registered,confirmed,cancelled'
        ]);

        $participant->update($request->all());

        return redirect()->route('participants.index')
                        ->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()->route('participants.index')
                        ->with('success', 'Data peserta berhasil dihapus!');
    }
}