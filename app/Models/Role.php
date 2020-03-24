<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
		protected $hidden = [
			'created_at', 'updated_at'
		];

		protected $casts = [
			'role' => 'integer',
			'enable' => 'boolean'
		];

    public function users() {
      return $this->belongsToMany('App\User')->using('App\Models\RoleUser');
    }

		public function configurations() {
			return $this->hasMany('App\Models\Configuration');
		}
}
