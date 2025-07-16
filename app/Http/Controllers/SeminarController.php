<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index(Request $request)
    {
        $query = Seminar::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%');
        }

        $seminars = $query->orderBy('date', 'desc')->paginate(10);

        return view('seminars.index', compact('seminars'));
    }

    public function create()
    {
        return view('seminars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        Seminar::create($request->all());

        return redirect()->route('seminars.index')
                        ->with('success', 'Seminar berhasil dibuat!');
    }

    public function show(Seminar $seminar)
{
    return view('seminars.show', compact('seminar'));
}


    public function edit($id)
{
    $seminar = Seminar::findOrFail($id);
    return view('seminars.edit', compact('seminar'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'kuota' => 'required|integer'
    ]);

    $seminar = Seminar::findOrFail($id);
    $seminar->update($request->all());

    return redirect()->route('seminars.index')->with('success', 'Data seminar berhasil diperbarui.');
}

    public function destroy($id)
{
    $seminar = Seminar::findOrFail($id);
    $seminar->delete();

    return redirect()->route('seminars.index')->with('success', 'Data seminar berhasil dihapus.');
}

}