<?php

// app/Models/PostRequiredSkill.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRequiredSkill extends Model
{
    protected $fillable = ['post_id', 'skill_name'];

    // علاقة الـ PostRequiredSkill مع الـ Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

