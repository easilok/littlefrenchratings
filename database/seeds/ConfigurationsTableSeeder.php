<?php

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
				DB::table('configurations')->delete();

				Configuration::create(array(
					'name' => 'Theme',
					'default' => 'dark',
					'role_id' => 0,
				));
    }
}
