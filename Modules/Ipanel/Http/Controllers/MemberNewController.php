<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class MemberNewController extends Controller
{
    public $table_member           ="users";
    public $table_model_has_roles  ="model_has_roles";
    
    public $paging                 =20;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $query      = DB::table($this->table_member);
        if(isset($_GET['search'])){
            $query         = $query->where('name',"like","%".$_GET['search']."%");
        }
        $query             =$query->leftJoin($this->table_model_has_roles, $this->table_member.'.id', '=', $this->table_model_has_roles.'.model_id');
        $query             =$query->where($this->table_model_has_roles.'.role_id', 2);
        $query             =$query->where($this->table_member.'.verified', 'n');
        $query             =$query->orderBy('created_at','DESC');
        $query             =$query->paginate($this->paging);
        $data['data']           =$query;
        return view('ipanel::member_new.index',['data'=>$data]);
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
