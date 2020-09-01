<?php

namespace App\Console\Commands;
use App\Comment;
use App\Wtpeople;
use Illuminate\Console\Command;


class MatchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:matchcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $tmvar;
    protected $tsvar;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->tmvar= date('i');
        $this->tsvar = date('s');
     
        

    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function doMatch(){
        while(1){
        $twodata = Wtpeople::orderBy('created_at', 'asc')->where('status',1)->take(2)->get();
        echo count($twodata);
        $rnum=mt_rand();
        if(count($twodata)==2){
        foreach ($twodata as $tmpdata){
        $tmpdata->room_id=$rnum;
        $tmpdata->status=3;
        $tmpdata->save();
        }
        }
        else{
            break;
        }
        }
    }


    public function handle()
    {
        //echo $this->tmvar;
        //echo $this->tmvar;
        //$this->doMatch();
        //return;
        while(true){
            echo 'aa';
            if($this->tmvar!=date('i')){
                if($this->tsvar<date('s')||abs($this->tmvar-date('i'))>=2){
                    echo $this->tsvar;
                    echo date('s');
                    echo $this->tmvar;
                    echo date('i');
                    echo abs($this->tmvar-date('i'));
                    echo 'おわりー';
                break;
                }
            }
            $this->doMatch();
            sleep(1);
            echo 'hah';
        }
    }

    
}