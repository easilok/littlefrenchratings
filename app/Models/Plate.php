<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

	protected $guarded = [];

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

	public function cover() {
		return $this->hasMany('App\Models\Images')->where('cover', true)->limit(1);
	}

	public function images() {
		return $this->hasMany('App\Models\Images');
	}

	public function averageRating() {
		/* Only Uses ratings that has numeric rating */
		$numericRatings = Rating::where('type', '<', 2)->pluck('id');
		$this->ratingCount = $this->ratings->whereIn('rating_id', $numericRatings)->where('rating_value', '>', 0)->count('rating_value');
		$this->ratingAvg = $this->ratings->whereIn('rating_id', $numericRatings)->where('rating_value', '>', 0)->average('rating_value');
		unset($this->ratings);

		return $this->ratingAvg;
	}

	public function latestRatings() {

		$result = DB::table('plate_rating')->join('tastes', 'plate_rating.taste_id', '=' , 'tastes.id')
											->selectRaw('plate_rating.plate_id, plate_rating.user_id, plate_rating.taste_id, tastes.visit_at')
											->where('plate_rating.plate_id', $this->id)
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
			$collection[] = [
				'user' => $user, 
				'visit_at' => $ratingDate,
				'average' => $ratingAvg,
				'max' => $ratingMax,
				'min' => $ratingMin,
				'general' => $ratingGeneral
			];
		};

		return collect($collection);
	}

	public function averagePrice() {
		$this->tastes;

		if ($this->tastes->count() > 0) {
			$this->priceAvg = $this->tastes->average('price');
		} else {
			$this->priceAvg = 0;
		}

		unset($this->tastes);

		return $this->priceAvg;
	}

}
