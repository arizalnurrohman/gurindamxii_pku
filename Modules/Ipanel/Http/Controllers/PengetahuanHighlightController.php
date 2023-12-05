<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PengetahuanHighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public $table_pengetahuan              ="pengetahuan";
    public $table_pengetahuan_category     ="pengetahuan_category";
    public $table_pengetahuan_highlight    ="pengetahuan_highlight";

    public $assets_pengetahuan_category    ="images/assets_pengetahuan_category/";#"public/images/assets_pengetahuan_category/";#"app/public/documents/assets_pengetahuan_category/";
    public $paging                         =10;

    public function index()
    {    
        $query          = DB::table($this->table_pengetahuan_highlight)
                          ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_highlight.'.pgId', '=', $this->table_pengetahuan.'.pgId')
                          #->where('hlMonth',(int)date('m'))
                          ->where('hlYear',date('Y'));
        if(isset($_GET['search'])){
            $query      =$query->where('pgTitle',"like","%".$_GET['search']."%");
        }
        $query          =$query->orderBy('hlStart', 'ASC');
        $query          =$query->paginate($this->paging);
        $data['data']           =$query;
        $data['assets_storage'] ="storage/".$this->assets_pengetahuan_category;
        
        return view('ipanel::pengetahuan_highlight.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        #DB::enableQueryLog();
        
        // print_r($pgidx);
        // exit;
        
        #$query = DB::getQueryLog();   
        // print "<pre>";
        // print_r($listpgid);
        // exit;              
        $data=array(
            "data"              =>array(),
            "datetime_picker"   => "datetime_picker",
            "select2combo"      =>"select2",
            "materi"            =>$this->get_materi(),
            "form_ajax_upload"  =>array(
                "theid"=>"#pengetahuan_category",
                "thebutton"=>".btn-submit"
            ),
        );
        
        return view('ipanel::pengetahuan_highlight.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'hlstart'=>'required',
            'hlend'=>'required',
            'hltitle'=>'required',
        ], [
            'hlstart.required' => 'Kolom Tanggal Mulai Wajib Di isi.',
            'hlend.required' => 'Kolom Tanggal Selesai Wajib Di isi.',
            'hltitle.required' => 'Kolom Judul Materi Wajib Di isi.',
        ]);

        if ($validator->fails()){
            // print_r($validator->errors()->all());exit;
            // print "error";exit;

            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            #SAVE DATA
            
            foreach($request->hltitle as $hltitle){
                $hlid           =$this->nextid();
                $hlpermalink    = $hlid."-".sha1($hlid);
                $payload=[
                    'hlId'       => $hlid,
                    'hlPermalink'=>$hlpermalink,
                    'pgId'       => $hltitle,
                    'hlMonth'    => date('m'),
                    'hlYear'     => date('Y'),
                    'hlStart'    => $this->change_datetime($request->hlstart),
                    'hlEnd'      => $this->change_datetime($request->hlend),
                    'hlStatus'   => 'y',
                    'created_at' =>date('Y-m-d H:i:s'),
                ];
                DB::table($this->table_pengetahuan_highlight)->insert($payload);
            }

            return response()->json(['success'=>route('pengetahuan_highlight.index')]);
            exit;
        }
    }

    public function change_datetime($dt){
        list($tgl,$time)    =explode(" ",$dt);
        list($dt,$mn,$yr)   =explode("/",$tgl);
        return $yr."-".$mn."-".$dt." ".$time;
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
        $data_get = DB::table($this->table_pengetahuan_highlight)
                    ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_highlight.'.pgId', '=', $this->table_pengetahuan.'.pgId')
                    ->where('hlPermalink', $id)->first();
        $data=array(
            "data"              =>$data_get,
            "datetime_picker"   => "datetime_picker",
            "select2combo"      =>"select2",
            "materi"            =>$this->get_materi(),
            "form_ajax_upload"  =>array(
                "theid"=>"#pengetahuan_category",
                "thebutton"=>".btn-submit"
            ),
        );
        
        return view('ipanel::pengetahuan_highlight.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'hlstart'=>'required',
            'hlend'=>'required',
            'hltitle'=>'required',
        ], [
            'hlstart.required' => 'Kolom Tanggal Mulai Wajib Di isi.',
            'hlend.required' => 'Kolom Tanggal Selesai Wajib Di isi.',
            'hltitle.required' => 'Kolom Judul Materi Wajib Di isi.',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            #SAVE DATA
            $hlid    =$this->nextid();
            $hlpermalink = $hlid."-".sha1($hlid);
            $payload=[
                'pgId'       => $request->hltitle,
                'hlMonth'    => date('m'),
                'hlYear'     => date('Y'),
                'hlStart'    => $this->change_datetime($request->hlstart),
                'hlEnd'      => $this->change_datetime($request->hlend),
                'hlStatus'   => $request->hlstatus,
                'updated_at' =>date('Y-m-d H:i:s'),
            ];
            $update_view=DB::table($this->table_pengetahuan_highlight)->where('hlPermalink', $id)->update($payload);

            return response()->json(['success'=>route('pengetahuan_highlight.index')]);
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_get = DB::table($this->table_pengetahuan_highlight)->where('hlPermalink', $id)->first();
        if(($data_get->hlId)>0){
            $run_query=DB::table($this->table_pengetahuan_highlight)->where('hlPermalink', $id)->delete();
            
            return response()->json(['success'=>route('pengetahuan_highlight.index')]);
            exit;
        }else{

        }
    }

    public function nextid(){
        $order =DB::table('pengetahuan_highlight')->max('hlId');
		return ($order + 1);
    }

    public function get_materi(){
        $listpgid   =DB::table($this->table_pengetahuan_highlight)
                    ->select('pgId')
                    ->where('hlStart', '<', date("Y-m-d H:i:s"))
                    ->where('hlEnd', '>', date("Y-m-d H:i:s"))
                    ->get()
                    ->toArray();
        foreach($listpgid as $pgid){
            $pgidx[]=$pgid->pgId;
        }

        $dmateri    =DB::table($this->table_pengetahuan)
                         ->select("pgId","pgTitle","pgPermalink")
                         #->where("pgId","NOT IN","(Select pgId FROM ".$this->table_pengetahuan_highlight." WHERE hlStart<'".date("Y-m-d H:i:s")."' AND hlEnd>'".date('Y-m-d H:i:s')."')")
                         ->whereNotIn("pgId",$pgidx)
                         ->orderBy('pgTitle', 'ASC')
                         ->get();
        return $dmateri;                 
    }
}
