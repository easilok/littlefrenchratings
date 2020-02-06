<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlateRating extends Model
{
	protected $table = 'plate_rating';

	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $casts = [
		'plate_id' => 'integer',
		'rating_id' => 'integer',
		'user_id' => 'integer',
		'taste_id' => 'integer',
		'rating_value' => 'integer',
		'price' => 'float',
	];

	public function plate() {
		return $this->belongsTo('App\Models\Plate');
	}

	public function rating() {
		return $this->belongsTo('App\Models\Rating');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function taste() {
		return $this->belongsTo('App\Models\Taste');
	}

}
