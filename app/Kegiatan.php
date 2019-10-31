<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'kodekegiatan', 'namakegiatan', 'tanggal_kegiatan','penyelenggara',
    ];
}
