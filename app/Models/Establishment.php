<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{

	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $casts = [
		'card' => 'boolean',
		'user_id' => 'integer',
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function plates() {
		return $this->hasMany('App\Models\Plate');
	}

}
