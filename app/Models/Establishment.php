<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

	public function ratings() {
		return $this->hasManyThrough('App\Models\PlateRating', 'App\Models\Plate');
	}

	public function latestRatings() {
		$this->plates;

		if (!$this->plates) {
			return null;
		}

		$plates = $this->plates->pluck('id');

		$result = DB::table('plate_rating')->join('tastes', 'plate_rating.taste_id', '=' , 'tastes.id')
											->selectRaw('plate_rating.plate_id, plate_rating.user_id, plate_rating.taste_id, tastes.visit_at')
											->whereIn('plate_rating.plate_id', $plates)
											->groupBy('plate_rating.plate_id', 'plate_rating.user_id', 'plate_rating.taste_id', 'tastes.visit_at')
											->orderBy('tastes.visit_at', 'DESC')->get();

		$generalRatingId = Rating::where('name', 'Geral')->first()->id;
		$collection = [];

		foreach ($result as $key => $item) {
			$user = User::find($item->user_id);
			$ratingDate = Taste::find($item->taste_id)->first()->visit_at->toDateString();
			$ratingAvg = round(PlateRating::where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->avg('rating_value'), 2);
			$ratingMax = PlateRating::with('rating')->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->orderBy('rating_value', 'DESC')->first();
			$ratingMin = PlateRating::with('rating')->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->orderBy('rating_value', 'ASC')->first();
			$ratingGeneral = PlateRating::with('rating')->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_id', $generalRatingId)->first()->rating_text;
			$ratingPlate = Plate::find($item->plate_id);
			$collection[] = [
				'user' => $user, 
				'plate' => $ratingPlate,
				'visit_at' => $ratingDate,
				'average' => $ratingAvg,
				'max' => $ratingMax,
				'min' => $ratingMin,
				'general' => $ratingGeneral
			];
		};

		return collect($collection);

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
