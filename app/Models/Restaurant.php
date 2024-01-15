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
        'p_iva',
        
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'p_iva'

    ];

    public function getFullImageAttribute() {
        if($this->image) {
            return asset('storage/' . $this->image);
        } return null;

    }

    protected $appends = [
        'full_image'
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
