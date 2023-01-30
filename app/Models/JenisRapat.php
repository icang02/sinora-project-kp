<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRapat extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'jenis_rapat';
    public $timestamps = false;

    public function rapat()
    {
        return $this->hasMany(Rapat::class);
    }
}
