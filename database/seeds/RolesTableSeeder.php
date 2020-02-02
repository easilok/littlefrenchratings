<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(array(
          'role' => 0,
          'name' => 'Demo',
          'enable' => true,
        ));

        Role::create(array(
          'role' => 1,
          'name' => 'Viewer',
          'enable' => true,
        ));

        Role::create(array(
          'role' => 2,
          'name' => 'role2',
          'enable' => true,
        ));
        Role::create(array(
          'role' => 3,
          'name' => 'Update',
          'enable' => true,
        ));
        Role::create(array(
          'role' => 4,
          'name' => 'Create',
          'enable' => true,
        ));
        Role::create(array(
          'role' => 5,
          'name' => 'Master',
          'enable' => true,
        ));
    }
}
