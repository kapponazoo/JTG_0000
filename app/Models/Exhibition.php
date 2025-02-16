<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    use HasFactory;

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }
}
