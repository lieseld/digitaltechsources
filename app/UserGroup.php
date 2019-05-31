<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = [
    	'name', 'short_name', 'description', 'colour', 'access_priv_resoruce_categories'
    ];
}
