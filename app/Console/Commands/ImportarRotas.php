<?php

namespace App\Console\Commands;

use App\Rota;
use App\Ponto;
use Illuminate\Console\Command;

class ImportarRotas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:rotas {csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adiciona informações referentes às rotas dos ônibus da UNIVASF';

    protected $rota = null;
    protected $ponto = null;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
     {
       $path =  base_path($this->argument('csv'));
       // Reference: http://php.net/manual/en/function.fgetcsv.php
       if (($handle = fopen($path, "r")) !== FALSE) {
         while (($data = fgetcsv($handle, 100, ",")) !== FALSE) {
           switch ($data[0]) {
             case 'Motorista':
               $this->rota = new Rota;
               $this->rota->motorista = $data[1];
               break;
             case 'Ônibus':
               $this->rota->onibus = $data[1];
               break;
             case 'Via':
               $this->rota->via = $data[1];
               $this->rota->save();
               break;
             default:
               $ponto = Ponto::firstOrCreate(['nome' => $data[3],
                                              'lat'  => $data[4],
                                              'lng'  => $data[5]]);
               $this->rota->pontos()->attach($ponto, ['horario' => $data[0]]);
           }
         }
         fclose($handle);
       }
       $this->info('As tabelas foram preenchidas!');
     }
}
