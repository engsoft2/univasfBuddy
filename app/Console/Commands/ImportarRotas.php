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
        $csv = file_get_contents($path);
        $csv = explode("\n", $csv);
        foreach ($csv as $line) {
          $cols = explode(",", $line);
          switch ($cols[0]) {
            case 'Motorista':
              $this->rota = new Rota;
              $this->rota->motorista = $cols[1];
              break;
            case 'Ônibus':
              $this->rota->onibus = $cols[1];
              break;
            case 'Via':
              $this->rota->via = $cols[1];
              $this->rota->save();
            break;
            default:
              $ponto = Ponto::firstOrCreate(['nome' => $cols[3]]);            
              $this->rota->pontos()->attach($ponto, ['horario' => $cols[0]]);
              break;
          }
        }
      $this->info('As tabelas foram preenchidas!');
    }

}
