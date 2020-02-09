<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $casts = [
		'price' => 'float',
		'user_id' => 'integer',
		'establishment_id' => 'integer'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function establishment() {
		return $this->belongsTo('App\Models\Establishment');
	}

	public function tastes() {
		return $this->hasMany('App\Models\Taste');
	}

	public function ratings() {
		return $this->hasMany('App\Models\PlateRating');
	}

	public function images() {
		return $this->hasMany('App\Models\Image');
	}

}
