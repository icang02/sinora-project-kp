<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $guarded = [''];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
}
