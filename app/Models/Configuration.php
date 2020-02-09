<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{

	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $casts = [
		'role_id' => 'integer',
		'enable' => 'boolean',
	];

	public function users() {
		return $this->belongsToMany('App\User');
	}

	public function role() {
		return $this->belongsTo('App\Models\Role');
	}

}
