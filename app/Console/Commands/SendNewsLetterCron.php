<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Mail\MySendMail;
use Illuminate\Support\Facades\Mail;

class SendNewsLetterCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendnewsletter:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue      =DB::table("newsletter_queue")
                        ->leftJoin("newsletter", 'newsletter_queue.newsId', '=', 'newsletter.newsId')
                        ->whereNull('nqSent')->get();
        foreach($queue as $key=>$val){
            $MSG['FROM']['EMAIL']    ="aishaazzahrarohman@example.com";
            $MSG['FROM']['NAME']    ="NewsLetter Gurindam BKN";
            $MSG['TO']      =$val->nqEmail;
            $MSG['SUBJECT'] ="Materi - ".$val->newsTitle;
            $MSG['HTML']    =$val->nqBody;
            $send_mail=Mail::send([], [], function ($message) use ($MSG) {
                $message->from($MSG['FROM']['EMAIL'],$MSG['FROM']['NAME'])
                        ->to($MSG['TO'])
                        ->subject($MSG['SUBJECT'])
                        ->html($MSG['HTML'])
                        ->text('NO-TEXT');
            });

            if($send_mail){
                $payload_up=array(
                    "nqSent"    =>date('Y-m-d H:i:s')
                );
                $update_queue=DB::table("newsletter_queue")->where('nqPermalink', $val->nqPermalink)->update($payload_up);
            }
        }
        exit;
    }
}
