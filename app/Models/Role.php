<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
		protected $hidden = [
			'created_at', 'updated_at'
		];

    public function users() {
      return $this->belongsToMany('App\User')->using('App\Models\RoleUser');
    }

		public function configurations() {
			return $this->hasMany('App\Models\Configuration');
		}
}
