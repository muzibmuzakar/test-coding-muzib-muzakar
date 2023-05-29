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
    

    // public function hitungPoinClubHome()
    // {
    //     if ($this->score_home > $this->score_away) {
    //         return 3; // Club home menang, poin +3
    //     } elseif ($this->score_home < $this->score_away) {
    //         return 0; // Club home kalah, poin +0
    //     } else {
    //         return 1; // Pertandingan imbang, poin +1
    //     }
    // }

    // public function hitungPoinClubAway()
    // {
    //     if ($this->score_away > $this->score_home) {
    //         return 3; // Club away menang, poin +3
    //     } elseif ($this->score_away < $this->score_home) {
    //         return 0; // Club away kalah, poin +0
    //     } else {
    //         return 1; // Pertandingan imbang, poin +1
    //     }
    // }

    // public static function klasemen()
    // {
    //     $pertandingan = Pertandingan::all();
    //     $klasemen = [];

    //     foreach ($pertandingan as $match) {
    //         $clubHomeId = $match->id_klub_home;
    //         $clubAwayId = $match->id_klub_away;

    //         if (!isset($klasemen[$clubHomeId])) {
    //             $klasemen[$clubHomeId] = 0;
    //         }
    //         if (!isset($klasemen[$clubAwayId])) {
    //             $klasemen[$clubAwayId] = 0;
    //         }

    //         $klasemen[$clubHomeId] += $match->hitungPoinClubHome();
    //         $klasemen[$clubAwayId] += $match->hitungPoinClubAway();
    //     }

    //     return $klasemen;
    // }
}
