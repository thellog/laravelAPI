<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'pay_method'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
