<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentReport extends Model
{
    protected $fillable = [
        'user_id', 'date_time', 'content_url', 'issue', 'issue_description', 'closed', 'moderator_response'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
