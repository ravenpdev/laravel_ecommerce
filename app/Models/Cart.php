<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Cart extends Model
{
    use HasFactory;


    public static function booted()
    {
        static::creating(function (Cart $model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }
}
