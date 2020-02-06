<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

	protected $hidden = [
		'created_at', 'updated_at'
	];

	public function users() {
		return $this->belongsToMany('App\User');
	}

	public function role() {
		return $this->belongsTo('App\Models\Role');
	}

}
