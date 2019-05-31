<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = [
    	'name', 'short_name', 'description', 'colour', 'access_priv_resource_categories'
    ];

    public function members()
    {
        return $this->hasMany(User::class);
    }
}
