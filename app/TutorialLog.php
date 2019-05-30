<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorialLog extends Model
{
    protected $fillable = [
    	'user_id', 'tutorials_disabled', 'account_profile'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
