<?php

use App\Ponto;
use Illuminate\Database\Seeder;

class PontoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pontos')->truncate();

        Ponto::create([

        ]);
    }
}
