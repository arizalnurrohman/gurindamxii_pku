<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NewsLetterQueueCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsqueue:cron';

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
        $newsletter     = DB::table("newsletter")->where('newsGenerate',"n")->first();
        #INSERT INTO NEWS LETTER QUEUE
        if($newsletter){
            $NEWS_JUDUL     =$newsletter->newsTitle;
            $NEWS_GAMBAR    =$newsletter->newsImage;
            $NEWS_URL       =$newsletter->newsURL;
            $NEWS_BODY      =$newsletter->newsContent;
            $NEWS_TMPLT     =$newsletter->nwtId;
            
            $query          = DB::table("newsletter_template")->where('nwtId',$NEWS_TMPLT)->first();
            $RESULTS        ="";
            $RESULTS        =str_replace("[NEWS_TITLE]",$NEWS_JUDUL,$query->nwtTemplate);
            $RESULTS        =str_replace("[NEWS_URL_IMAGES]",$NEWS_GAMBAR,$RESULTS);
            $RESULTS        =str_replace("[NEWS_BODY]",$NEWS_BODY,$RESULTS);
            $RESULTS        =str_replace("[NEWS_URL_CONTENT]",$NEWS_URL,$RESULTS);
            
            $subscriber     = DB::table("newsletter_subscriber")->select("nsubId","nsubEmail")->where("nsubStatus","y")->get();
            #nqId 	nqPermalink 	newsId 	nsubId 	nqBody 	nqEmail 	nqSent 	created_at 	updated_at 	
            foreach($subscriber as $key=>$val){
                $cavailable     =DB::table("newsletter_queue")->where('newsId',$newsletter->newsId)->where('nqEmail',$val->nsubEmail)->first();
                if(!$cavailable){
                    $payload=array(
                        "nqId"          =>$this->nextid("newsletter_queue","nqId"),
                        "nqPermalink"   =>$this->nextid("newsletter_queue","nqId")."-".sha1($this->nextid("newsletter_queue","nqId")),
                        "newsId"        =>$newsletter->newsId,
                        "nsubId"        =>$val->nsubId,
                        "nqBody"        =>$RESULTS,
                        "nqEmail"       =>$val->nsubEmail,
                        //"nqSent"        =>"0000-00-00 00:00:00",
                        "created_at"    =>date('Y-m-d H:i:s'),
                    );
                    $save_content=DB::table("newsletter_queue")->insert($payload);
                }
            }
            $update_payload =array(
                "newsGenerate"  =>'y',
            );
            $update_query   =DB::table("newsletter")->where('newsId', $newsletter->newsId)->update($update_payload);
            #################################################################################
        }
    }

    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
    }
}
