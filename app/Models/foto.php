<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $primaryKey = 'id_foto';

    protected $fillable = [
        'judul_foto', 'deskripsi','tanggal_unggah','lokasi_file','picture'
    ];
}