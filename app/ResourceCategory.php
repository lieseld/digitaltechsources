<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
    protected $fillable = [
    	'name', 'private', 'short_name', 'description'
    ];

    public function resources()
    {
    	return $this->hasMany(Resource::class);
    }
}
