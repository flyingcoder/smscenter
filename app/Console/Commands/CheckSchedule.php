<?php

namespace App\Console\Commands;
use App\Schedule;

use Illuminate\Console\Command;

class CheckSchedule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will check if there is to be text on the current day.';

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
        $now = date_create(date('Y-m-d', time()));
        $sched = Schedule::where('remind_date', $now)->get();
        $this->info($sched);
    }
}
