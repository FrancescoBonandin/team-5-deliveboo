<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'last_name',
        'address',
        'phone_number',
        'email',
        'total_price'
    ];


    public function dishes(){

        return $this->belongsToMany(Dish::class)->withPivot('quantity');

    }

    public function restaurant(){

        return $this->belongsTo(Restaurant::class);

    }
    
}
