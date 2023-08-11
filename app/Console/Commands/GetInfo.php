<?php

namespace App\Console\Commands;

use App\Enums\Status;
use App\Repositories\SuscriptionRepository;
use Illuminate\Console\Command;

class GetInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-info {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a summary from suscriptions for the date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = $this->argument('date');

        $suscriptionRepository = new SuscriptionRepository();
        $suscriptions = $suscriptionRepository->getAllByDate($date);

        $active    = $suscriptions->where('status','=', Status::$ACTIVE)->count();
        $nonactive = $suscriptions->where('status','=', Status::$CANCELLED)->count();
        $total     = $active + $nonactive;

        $this->table(
            ['Active Suscriptions', 'Non-active Suscriptions', 'Total Suscriptions'],
            [[$active, $nonactive, $total]]
        );
    }
}
