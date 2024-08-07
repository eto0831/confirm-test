<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
}