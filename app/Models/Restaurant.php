<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_name',
        'address',
        'image',
        'p_iva'
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function dishes(){

        return $this->hasMany(Dish::class);

    }

    public function orders(){

        return $this->hasMany(Order::class);

    }

    public function categories(){

        return $this->belongsToMany(Category::class);

    }

}
