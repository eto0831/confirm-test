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
        return $this->belongsTo(Category::class);
    }

    public function getGenderAttribute($value)
    {
        $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];
        return $genderMap[$value] ?? '-'; // null の場合は '-' を返す
    }
}
