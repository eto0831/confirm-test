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

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }
    public function scopeKeywordSearch($query, $keyword) {
        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('email', 'like', '%' . $keyword . '%')
                  ->orWhere('last_name', 'like', '%' . $keyword . '%')
                  ->orWhere('first_name', 'like', '%' . $keyword . '%');                  // 必要に応じて他のカラムを追加
            });
        }
    }
    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }
    public function scopeDateSearch($query, $created_at)
    {
        if (!empty($created_at)) {
            $query->whereDate('created_at', $created_at);
        }
    }
}