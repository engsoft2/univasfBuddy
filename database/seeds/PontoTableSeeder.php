<?php

use Illuminate\Database\Seeder;
use App\Ponto;

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
