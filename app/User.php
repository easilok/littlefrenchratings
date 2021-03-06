<?php

namespace App;

use App\Models\Configuration;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
      return $this->belongsToMany('App\Models\Role')->using('App\Models\RoleUser');
    }

    public function configurations() {
			return $this->belongsToMany('App\Models\Configuration')->withPivot('value')
									->where('configurations.enable', 1);

    }

		public function configurationList() {

			$result = $this->configurations;

			foreach ($result as $key => &$configuration) {
				if ($configuration->role->role <= $this->role->first()->role) {
					$configuration->value = $configuration->pivot->value;
				} else {
					unset($result[$key]);
				}
				unset($configuration->role);
				unset($this->role);
				unset($configuration->pivot);
			}

			return $result;

		}

		public function ResetConfigurations() {

			$this->configurations()->detach();

			$configurations = Configuration::all();

			foreach($configurations as $configuration) {
				$this->configurations()->attach($configuration->id, ['value' => $configuration->default]);
			}

		}

		public function establishments() {
			return $this->hasMany('App\Models\Establishment');
		}

		public function plates() {
			return $this->hasMany('App\Models\Plate');
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

		public function nextTastes() {

			$nextTastes = $this->tastes->where('visit_at', '>=', Carbon::now()->startOfDay())->sortBy('visit_at');
			unset($this->tastes);

			$nextTastes->each(function($item) {
				$item->plate->establishment;
				/* $item->plate->averageRating(); */
				/* $item->plate->averagePrice(); */
			});

			$this->nextTastes = $nextTastes;
			return $nextTastes;
		}

		public function unratedTastes() {
			$unratedTastes = $this->tastes->where('visit_at', '<', Carbon::now()->startOfDay())->sortBy('visit_at');
			unset($this->tastes);

			foreach($unratedTastes as $key => $item) {
				if ($item->ratings->count() > 0) {
					$unratedTastes->forget($key);
				}
				unset($item->ratings);
				$item->plate->establishment;
			};

			$this->unratedTastes = $unratedTastes;

			return $unratedTastes;
		}

		public function historyTastes($ignoreRatings = false) {
 
			$historyTastes = $this->tastes->where('visit_at', '<', Carbon::now()->startOfDay())->sortBy('visit_at');
			unset($this->tastes);

			foreach($historyTastes as $key => $item) {
				if ($item->ratings->count() == 0) {
					if ($ignoreRatings) {	
						$historyTastes->forget($key);
					}
				} else {
					$item->ratingAvg = 0;
					$item->ratingCount = 0;
					foreach($item->ratings as $rating) {
						if ($rating->rating_value > 0) {
							$item->ratingAvg += $rating->rating_value;
							$item->ratingCount++;
						}
					}

					if ($item->ratingCount > 0) {
						$item->ratingAvg /= $item->ratingCount;
					}
				}
				unset($item->ratings);
				$item->plate->establishment;
			};

			$this->historyTastes = $historyTastes;

			return $historyTastes;
		}


}
