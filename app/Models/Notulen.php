<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;
    protected $table = 'notulen';
    protected $guarded = [''];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
}
