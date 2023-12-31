<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class PengetahuanRatingController extends Controller
{
    public $table_user                  ="users";
    public $table_pengetahuan_rating    ="pengetahuan_rating";
    public $table_pengetahuan           ="pengetahuan";
    
    public $paging                      =20;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $query      = DB::table($this->table_pengetahuan_rating);
        if(isset($_GET['search'])){
            $query         = $query->where($this->table_user.'.name',"like","%".$_GET['search']."%");
        }
        $query             =$query->leftJoin($this->table_user, $this->table_pengetahuan_rating.'.id_user', '=', $this->table_user.'.id');
        $query             =$query->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_rating.'.pgId', '=', $this->table_pengetahuan.'.pgId');
        $query             =$query->orderBy($this->table_pengetahuan_rating.'.created_at','DESC');
        $query             =$query->paginate($this->paging);
        $data['data']           =$query;
        return view('ipanel::pengetahuan_rating.index',['data'=>$data]);
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
