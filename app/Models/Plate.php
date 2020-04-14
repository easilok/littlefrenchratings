<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
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
		return $this->hasManyThrough('App\Models\PlateRating', 'App\Models\Taste');
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
											->selectRaw('tastes.plate_id, tastes.user_id, plate_rating.taste_id, tastes.visit_at')
											->where('tastes.plate_id', $this->id)
											->groupBy('tastes.plate_id', 'tastes.user_id', 'plate_rating.taste_id', 'tastes.visit_at')
											->orderBy('tastes.visit_at', 'DESC')->get();

		$generalRatingId = Rating::where('name', 'Geral')->first()->id;
		$collection = [];

		foreach ($result as $key => $item) {
			$user = User::find($item->user_id);
			$tasteRatings = Taste::find($item->taste_id)->ratings()->get();
			$ratingDate = Taste::find($item->taste_id)->visit_at->toDateString();
			/* $ratingAvg = round(PlateRating::with('tastes')->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->avg('rating_value'), 2); */
			/* $ratingMax = PlateRating::with(['rating', 'taste'])->has('taste.plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->orderBy('rating_value', 'DESC')->first(); */
			/* $ratingMin = PlateRating::with(['rating', 'taste'])->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_value', '>', 0)->orderBy('rating_value', 'ASC')->first(); */
			/* $ratingGeneral = PlateRating::with(['rating', 'taste'])->where('plate_id', $item->plate_id)->where('user_id', $item->user_id)->where('taste_id', $item->taste_id)->where('rating_id', $generalRatingId)->first()->rating_text; */
			$ratingAvg = round($tasteRatings->where('rating_value', '>', 0)->avg('rating_value'), 2);
			$ratingMax = $tasteRatings->where('rating_value', '>', 0)->sortBy('rating_value')->last();
			$ratingMin = $tasteRatings->where('rating_value', '>', 0)->sortBy('rating_value')->first();
			$ratingGeneral = $tasteRatings->where('rating_id', $generalRatingId)->first()->rating_text;
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
		$this->tastes = $this->tastes->where('price', '>', 0);

		if ($this->tastes->count() > 0) {
			$this->priceAvg = $this->tastes->average('price');
		} else {
			$this->priceAvg = 0;
		}

		unset($this->tastes);

		return $this->priceAvg;
	}

	public function nextUserTaste($userId) {

		return Taste::where('plate_id', $this->id)->where('user_id', $userId)
									->where('visit_at', '>=', Carbon::now()->startOfDay())
									->orderBy('visit_at', 'ASC')->first();

	}

}
