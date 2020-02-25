<?php

use App\Models\LocationSource;
use Illuminate\Database\Seeder;

class LocationSourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			DB::table('location_sources')->delete();

			LocationSource::Create(array(
				'name' => 'Nome',
			));
			LocationSource::Create(array(
				'name' => 'Endereço',
			));
			LocationSource::Create(array(
				'name' => 'GPS',
			));
    }
}
