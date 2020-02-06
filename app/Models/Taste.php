<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taste extends Model
{

	protected $hidden = [
		'created_at', 'updated_at'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function plate() {
		return $this->belongsTo('App\Models\Plate');
	}

	public function ratings() {
		return $this->hasMany('App\Models\PlateRating');
	}

}
