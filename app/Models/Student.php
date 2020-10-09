<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'phone',
        'age',
        'gender',
        'address',
        'is_active'
    ];

    // function posts the hien 1 student co nhieu bai post
    public function posts() {
        return $this->hasMany(Post::class, 'student_id', 'id');
    }
}
