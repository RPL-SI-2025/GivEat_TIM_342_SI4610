<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumLike extends Model
{
    protected $fillable = ['user_id', 'forum_topic_id'];
}
