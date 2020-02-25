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
					'type' => 2, // text
          'enable' => true,
        ));

        Rating::create(array(
          'name' => 'Molho',
					'description' => 'Avaliar Sabor e consistência do molho',
					'type' => 1, // Value + Text
          'enable' => true,
        ));

        Rating::create(array(
          'name' => 'Atendimento',
					'description' => 'Avaliar qualidade de atendimento',
					'type' => 0, // Value
          'enable' => true,
        ));

    }
}
