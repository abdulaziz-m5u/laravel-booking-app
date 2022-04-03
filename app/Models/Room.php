<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function booking()
    {
        return $this->HasOne(Booking::class);
    }
}
