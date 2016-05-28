<?php

use Illuminate\Database\Seeder;

class RotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::load('rotas.csv', function ($reader) {

            // reader methods

        });
    }
}
