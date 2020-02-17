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

	protected $guarded = [];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function plates() {
		return $this->hasMany('App\Models\Plate');
	}

	public function averageRating() {
	
		/* Initializes two varibles for making average */
		$this->ratingAvg = 0;
		$this->ratingCount = 0;

		/* Get average of each of establishment plates */
		foreach($this->plates as $key => $plate) {
			$tmp = $plate->averageRating();
			if ($tmp) {
				if ($tmp > 0) {
					$this->ratingAvg += $tmp;
					$this->ratingCount++;
				}
			}
		}

		/* Averages the average rating of each plate */
		if ($this->ratingCount > 0) {
			$this->ratingAvg /= $this->ratingCount;
		}

		unset($this->plates);

		return $this;
	}

}
