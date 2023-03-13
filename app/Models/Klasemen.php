<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;
    protected $fillable = [
        'klub_id',
        'ma',
        'me',
        's',
        'k',
        'gm',
        'gk',
        'point'
    ];

    public function klub()
    {
        return $this->belongsTo(Klub::class, 'klub_id');
    }
}
