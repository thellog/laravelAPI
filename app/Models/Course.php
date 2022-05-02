<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_course',
        'is_new',
        'is_loved',
        'price',
        'discount'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function coursedetail() {
        return $this->hasOne(CourseDetail::class);
    }

    public function enroll() {
        return $this->hasMany(Enroll::class);
    }
}
