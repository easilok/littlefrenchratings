<?php

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->delete();

        Rating::create(array(
          'name' => 'Geral',
					'description' => 'Pequeno comentário sobre o que achou do prato e local',
					'slug' => 'general',
					'type' => 2, // text
					'order' => 0,
          'enable' => true,
        ));

        Rating::create(array(
          'name' => 'Molho',
					'description' => 'Avaliar Sabor e consistência do molho',
					'slug' => 'sauce',
					'type' => 1, // Value + Text
					'order' => 2,
          'enable' => true,
        ));

        Rating::create(array(
          'name' => 'Atendimento',
					'slug' => 'service',
					'description' => 'Avaliar qualidade de atendimento',
					'type' => 0, // Value
					'order' => 1,
					'enable' => true,
        ));

    }
}
