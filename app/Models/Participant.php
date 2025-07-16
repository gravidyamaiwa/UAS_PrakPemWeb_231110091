<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'institution',
        'seminar_id',
        'status'
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}