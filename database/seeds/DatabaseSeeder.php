<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< Updated upstream
        /*
        factory(Rota::class, 10)->create()->each(function($rota) {
            factory(Ponto::class, 5)->make()->each(function($ponto) use($rota) {
                $rota->pontos()->attach($ponto);
            });
        });
        */
        /*
        factory(App\Ponto::class, 10)->make();
        factory(App\Rota::class, 5)->make();
        */
=======
    	$this->call(UsersTableSeeder::class);
>>>>>>> Stashed changes
    }
}
