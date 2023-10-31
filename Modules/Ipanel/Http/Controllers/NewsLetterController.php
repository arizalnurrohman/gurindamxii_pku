<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Mail\MySendMail;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public $table_newsletter    ="newsletter";
    public $paging              =10;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(isset($_GET['send_mail'])){
            $newsletter     = DB::table("newsletter")->where('newsGenerate',"n")->first();
            #INSERT INTO NEWS LETTER QUEUE
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

            #SEND NEWS LETTER----------------------------------------------------------------
            $queue      =DB::table("newsletter_queue")->whereNull('nqSent')->get();
            foreach($queue as $key=>$val){
                $MSG['FROM']['EMAIL']    ="aishaazzahrarohman@example.com";
                $MSG['FROM']['NAME']    ="NewsLetter Gurindam BKN";
                $MSG['TO']      =$val->nqEmail;
                $MSG['SUBJECT'] ="Materi - ".$NEWS_JUDUL;
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


        /*
        $target=array("arizalnurrohman@gmail.com","arizalnurrohman13@gmail.com");
        $query          = DB::table("newsletter_template")->first();
        $NEWS_JUDUL     ='Membangun "Tim Audit Spesialis" yang Kompeten';
        $NEWS_GAMBAR    ="https://godemo.my.id/storage/images/assets_pengetahuan/2023/10/20231010/6524b8e4aac46.jpg";
        $NEWS_URL       ="https://godemo.my.id/front/materi/11-membangun-tim-audit-spesialis-yang-kompeten";
        $NEWS_BODY      ="Dalam kesempatan ini, penulis hendak berbagi pengalaman selama setidaknya 6 tahun terakhir dalam mendampingi rekan-rekan tim audit keamanan siber di Inspektorat VII. Pembahasan tema ini rasanya bukan yang pertama, namun demikian apa yang penulis temui dan praktikkan kiranya dapat memperkaya khasanah pembaca tentang bagaimana membentuk tim audit dengan kompetensi spesialis yang mumpuni. Terlebih dengan terbitnya PMK Nomor 18/PMK.09/2022 yang memperkuat peran pengawasan Inspektorat Jenderal atas tugas fungsi Menteri Keuangan selaku Chief Operational Officer, Chief Financial Officer, dan wakil pemerintah dalam Kepemilikan Kekayaan Negara yang Dipisahkan, menuntut organisasi ini memiliki tim-tim audit yang memiliki kompetensi spesialis (misal: konstruksi, energi sumber daya alam, asuransi, kontraktual). Tim audit keamanan siber merupakan salah satu kompartemen di Inspektorat VII yang bertugas memberikan asurans dan konsultasi bagi manajemen dan pimpinan di Kemenkeu, bahwa risiko keamanan siber di Kemenkeu telah dimitigasi secara memadai melalui penerapan berbagai bentuk instrumen pengendalian. Tim ini dituntut untuk memiliki kompetensi spesialis keamanan siber yang sifatnya konseptual dan teknikal. Dan berdasarkan pengalaman penulis, untuk dapat menjadi tim yang solid dan kompeten, harus ditempuh dalam waktu yang tidak sebentar.";
        $RESULTS        ="";
        
        $RESULTS        =str_replace("[NEWS_TITLE]",$NEWS_JUDUL,$query->nwtTemplate);
        $RESULTS        =str_replace("[NEWS_URL_IMAGES]",$NEWS_GAMBAR,$RESULTS);
        $RESULTS        =str_replace("[NEWS_BODY]",$NEWS_BODY,$RESULTS);
        $RESULTS        =str_replace("[NEWS_URL_CONTENT]",$NEWS_URL,$RESULTS);
        foreach($target as $vval){
            $MSG['FROM']    ="gurindam@gmail.com";
            $MSG['TO']      =$vval;
            $MSG['SUBJECT'] ="Materi - ".$NEWS_JUDUL;
            $MSG['HTML']    =$RESULTS;
            $send_mail=Mail::send([], [], function ($message) use ($MSG) {
                $message->from('aishaazzahrarohman@example.com','NewsLetter Gurindam BKN')
                        ->to($MSG['TO'])
                        ->subject($MSG['SUBJECT'])
                        ->html($MSG['HTML'])
                        ->text('NO-TEXT');
            });
        }
        */
        /*
        exit;
        #-------------------------------------------------------------------------------------
        #------------------------------BROADCAST--------------------------------
        
        $send_mail=Mail::send([], [], function ($message) {
            $target=array("arizalnurrohman@gmail.com","arizalnurrohman13@gmail.com");
            $query          = DB::table("newsletter_template")->first();
            $NEWS_JUDUL     ='Membangun "Tim Audit Spesialis" yang Kompeten';
            $NEWS_GAMBAR    ="https://godemo.my.id/storage/images/assets_pengetahuan/2023/10/20231010/6524b8e4aac46.jpg";
            $NEWS_URL       ="https://godemo.my.id/front/materi/11-membangun-tim-audit-spesialis-yang-kompeten";
            $NEWS_BODY      ="Dalam kesempatan ini, penulis hendak berbagi pengalaman selama setidaknya 6 tahun terakhir dalam mendampingi rekan-rekan tim audit keamanan siber di Inspektorat VII. Pembahasan tema ini rasanya bukan yang pertama, namun demikian apa yang penulis temui dan praktikkan kiranya dapat memperkaya khasanah pembaca tentang bagaimana membentuk tim audit dengan kompetensi spesialis yang mumpuni. Terlebih dengan terbitnya PMK Nomor 18/PMK.09/2022 yang memperkuat peran pengawasan Inspektorat Jenderal atas tugas fungsi Menteri Keuangan selaku Chief Operational Officer, Chief Financial Officer, dan wakil pemerintah dalam Kepemilikan Kekayaan Negara yang Dipisahkan, menuntut organisasi ini memiliki tim-tim audit yang memiliki kompetensi spesialis (misal: konstruksi, energi sumber daya alam, asuransi, kontraktual). Tim audit keamanan siber merupakan salah satu kompartemen di Inspektorat VII yang bertugas memberikan asurans dan konsultasi bagi manajemen dan pimpinan di Kemenkeu, bahwa risiko keamanan siber di Kemenkeu telah dimitigasi secara memadai melalui penerapan berbagai bentuk instrumen pengendalian. Tim ini dituntut untuk memiliki kompetensi spesialis keamanan siber yang sifatnya konseptual dan teknikal. Dan berdasarkan pengalaman penulis, untuk dapat menjadi tim yang solid dan kompeten, harus ditempuh dalam waktu yang tidak sebentar.";
            $RESULTS        ="";
            
            $RESULTS        =str_replace("[NEWS_TITLE]",$NEWS_JUDUL,$query->nwtTemplate);
            $RESULTS        =str_replace("[NEWS_URL_IMAGES]",$NEWS_GAMBAR,$RESULTS);
            $RESULTS        =str_replace("[NEWS_BODY]",$NEWS_BODY,$RESULTS);
            $RESULTS        =str_replace("[NEWS_URL_CONTENT]",$NEWS_URL,$RESULTS);
            
            foreach($target as $vval){
                $MSG['FROM']    ="gurindam@gmail.com";
                $MSG['TO']      =$vval;
                $MSG['SUBJECT'] ="Materi - ".$NEWS_JUDUL;
                $MSG['HTML']    =$RESULTS;
                
                $message->from('aishaazzahrarohman@example.com','NewsLetter Gurindam BKN')
                        ->to($MSG['TO'])
                        ->subject($MSG['SUBJECT'])
                        ->html($MSG['HTML'])
                        ->text('NO-TEXT');
            }
        });    
        exit;
        */

        #-------------------------------------------------------------------------

        $query      = DB::table($this->table_newsletter);
        if(isset($_GET['search'])){
            $query         = $query->where('newsContent',"like","%".$_GET['search']."%");
        }
        $query             =$query->orderby($this->table_newsletter.'.created_at', 'DESC');
        $query             =$query->paginate($this->paging);

        $data['data']           =$query;
        return view('ipanel::newsletter.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ipanel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ipanel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ipanel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
    }
}
