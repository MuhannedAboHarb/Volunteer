<?php

// app/Models/PostLearningOpportunity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLearningOpportunity extends Model
{
    protected $fillable = ['post_id', 'opportunity_description'];

    // علاقة الـ PostLearningOpportunity مع الـ Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

