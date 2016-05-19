<?php

namespace App\Console\Commands;

use App\Rota;
use App\Parada;
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

    protected $first = true;

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
        $csv = file_get_contents($path);
        $csv = explode("\n", $csv);
        foreach ($csv as $line) {
          $cols = explode(",", $line);
          switch ($cols[0]) {
            case 'Motorista':
              $motorista = $cols[1];
              break;
            case 'Ônibus':
              $onibus = $cols[1];
              break;
            case 'Via':
              //$rota->via = $cols[0];
            break;
            default:
              $rota = new Rota;
              $rota->onibus = $onibus;
              $rota->motorista = $motorista;
              $rota->horario = $cols[0];
              $parada = new Parada;
              $parada->nome = $cols[3];
              // não está atualizando o banco de dados, mas incluindo todas as paradas 
              $parada->save();
              $rota->paradas_id = $parada->id;
              $rota->save();
              break;
          }
        }
      $this->info('As tabelas foram preenchidas!');
    }

}
