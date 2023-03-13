<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_klub_home',
        'id_klub_away',
        'score_home',
        'score_away'
    ];

    public function klub_home()
    {
        return $this->belongsTo(Klub::class, 'id_klub_home');
    }

    public function klub_away()
    {
        return $this->belongsTo(Klub::class, 'id_klub_away');
    }
}
