<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'rapat';

    public function jenis_rapat()
    {
        return $this->belongsTo(JenisRapat::class);
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class)->orderBy('nama');
    }

    public function notulen()
    {
        return $this->hasOne(Notulen::class);
    }

    public function file_absen()
    {
        return $this->hasOne(FileAbsen::class);
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class);
    }
}
