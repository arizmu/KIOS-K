<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $table = 'tickets';

    protected $fillable = [
        'nama',
        'no_antrian',
        'catatan',
        'tanggal',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

}
