<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $hidden=[
        'created_at',
        'uploaded_at',

    ];

    public function restaurants(){

        return $this->belongsToMany(Restaurant::class);

    }

}
