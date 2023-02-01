<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAbsen extends Model
{
    use HasFactory;
    protected $table = 'file_absen';
    protected $guarded = [''];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
}
