<?php

use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create(array(
          'name' => 'admin',
          'email' => 'admin@littlefrench.dev',
				  'password' => Hash::make('admin'),
				));

				$role=Role::orderBy('role', 'DESC')->first();

				if ($role) {
					$user->role()->attach($role);
				}
    }
}
