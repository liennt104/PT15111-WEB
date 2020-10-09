<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'desc',
        'content',
        'image_url',
        'status',
        'student_id',
    ];

    // Function comments the hien moi quan he 1 post se co nhieu comments
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    // Function student the hien moi quan he 1 post se thuoc ve 1 sinh vien
    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // function categories the hien nhieu post, moi post co nhieu categories
    public function categories() {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }
}
