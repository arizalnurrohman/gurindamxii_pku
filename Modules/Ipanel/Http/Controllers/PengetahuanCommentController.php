<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Ipanel\Entities\PengetahuanCommentModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Helper\ImageManager;

class PengetahuanCommentController extends Controller
{
    public $table_pengetahuan              ="pengetahuan";
    public $table_pengetahuan_comments     ="pengetahuan_comment";
    public $table_user         ="users";
    public $paging                         =10;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(isset($_GET['search'])){
            /*
            $datais=DB::table('ms_pembelajaran')
                        ->leftJoin('ms_pembelajaran_categori', 'ms_pembelajaran.catId', '=', 'ms_pembelajaran_categori.catId')
                        ->where('pmPermalink', $id)
                        ->first();*/

            $query      = DB::table($this->table_pengetahuan_comments)
                                ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_comments.'.pgId')
                                ->leftJoin($this->table_user, $this->table_pengetahuan_comments.'.id_user', '=', $this->table_user.'.id')
                                ->where('cmComment',"like","%".$_GET['search']."%")
                                ->orderBy('cmAddedDate', 'desc')
                                ->paginate($this->paging);
        }else{
            #$query      = DB::table($this->table_pengetahuan_comments)->paginate($this->paging);
            $query      = DB::table($this->table_pengetahuan_comments)
                                ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_comments.'.pgId')
                                ->leftJoin($this->table_user, $this->table_pengetahuan_comments.'.id_user', '=', $this->table_user.'.id')
                                ->orderBy('cmAddedDate', 'desc')
                                ->paginate($this->paging);
        }
        $data['data']           =$query;
        
        return view('ipanel::pengetahuan_comment.index',['data_comment'=>$data]);
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
}
