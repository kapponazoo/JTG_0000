<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'role', 'description'
        // 他に必要なカラムがあれば追加
    ];

    public function user()
        {
            return $this->belongsTo(User::class);
        }
}