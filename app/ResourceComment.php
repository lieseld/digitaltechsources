<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceComment extends Model
{
    protected $fillable = [
    	'user_id', 'content', 'posted_at', 'edited_at', 'reply_comment_id', 'hidden'
    ];
}
