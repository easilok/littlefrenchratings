<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $hidden = [
		'created_at', 'updated_at'
	];

	protected $casts = [
		'order' => 'integer',
		'visible' => 'boolean',
		'plate_id' => 'integer',
		'user_id' => 'integer'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function plate() {
		return $this->belongsTo('App\Models\Plate');
	}

}
