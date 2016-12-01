<?php

namespace App\Console\Commands;
use App\Schedule;
use App\Child;
use App\Vaccine;
use DB;
use Twilio;

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
        if(!empty($sched)){
            foreach ($sched as $key => $value) {
                $child = Child::find($value->child_id);
                $pivot = DB::table('child_vaccine')->where('id', $value->pivot_id)->first();
                $vaccine = Vaccine::find($pivot->vaccine_id);
                $range = $pivot->vaccination_range;
                $message = $this->getMessage($value->type, $child, $vaccine, $range);
                $status = $this->send($child->phone_number, $message);
                $this->info($status);
            }
        }
        //$this->info("Successfully send ".count($sched)." text informations");
    }

    public function getMessage($type, Child $child, Vaccine $vaccine, $range)
    {
        if($type == 'remind'){
            return "PAHIBALO!
                    \n Adunay ipahigayon nga pagpa-bakuna sa ".$vaccine->name." karung umaabot nga ".$range." sa barangay ".$child->barangay." Health center. Ginaawhag ka isip ginikanan ni ".$child->name." sa pag-tambong niini. Daghan salamat. 

                    \n Sent via DUMDUM
                    \n Zenaida Casilac
                    \n (CHO Head Nurse/EPI Head)";
        } else if($type == 'recall'){
             return "PAHIBALO! \n
                    Adunay ipahigayon nga pagpa-bakuna sa ".$vaccine->name." karung umaabot nga ".$range." sa barangay ".$child->barangay." Health center. Ginaawhag ka isip ginikanan sa pag-tambong niini. Daghan salamat. 

                    \n Sent via DUMDUM
                    \n Zenaida Casilac
                    \n (CHO Head Nurse/EPI Head)";
        } else if($type == 'last_call') {
             return "PAHIBALO! \n
                    Adunay ipahigayon nga pagpa-bakuna sa ".$vaccine->name." karung umaabot nga ".$range." sa barangay ".$child->barangay." Health center. Ginaawhag ka isip ginikanan sa pag-tambong niini. Daghan salamat. 

                    \n Sent via DUMDUM
                    \n Zenaida Casilac
                    \n (CHO Head Nurse/EPI Head)";
        }

        return $type;
    }

    public function send($number, $message)
    {
        try 
        { 
            $m = Twilio::message($number, $message);

        } catch(Services_Twilio_RestException $e) {

            return $e;
        };

        return $m;
    }
}
