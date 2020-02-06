<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

	protected $hidden = [
		'created_at', 'updated_at', 'enable'
	];

	protected $casts = [
		'type' => 'integer',
		'enable' => 'boolean',
	];

	public function ratings() {
		return $this->hasMany('App\Models\PlateRating');
	}
}
