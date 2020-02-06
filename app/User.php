<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

}
