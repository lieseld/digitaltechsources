<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
    	'name', 'category_id', 'user_id', 'short_description', 'long_description', 'platform', 'thumbnail_url', 'private', 'downloadable', 'comments_locked', 'adult_only', 'upvotes', 'downloads', 'views', 'uploaded-at', 'last_edited-at', 'license', 'license_url'
    ];

    public function category()
    {
    	return $this->belongsTo(ResourceCategory::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ResourceComment::class);
    }

    public function age(){

        $created = $this->created_at;
        $now = Carbon::now();
        $difference = $created->diff($now)->days;

        return $difference;
    }
}
