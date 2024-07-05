<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }

    public function exhibitions()
    {
        return $this->hasMany(Exhibition::class);
    }
}
