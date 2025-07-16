<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'max_participants',
        'price',
        'is_active'
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function getAvailableSlotsAttribute()
    {
        return $this->max_participants - $this->participants()->count();
    }
}