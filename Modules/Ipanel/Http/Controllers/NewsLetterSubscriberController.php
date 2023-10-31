<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class NewsLetterSubscriberController extends Controller
{
    public $table_newsletter_subscriber  ="newsletter_subscriber";
    public $table_user                   ="users";
    public $paging                       =10;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $query      = DB::table($this->table_newsletter_subscriber);
        $query      =$query->select($this->table_newsletter_subscriber.".*",$this->table_user.".name",$this->table_user.".id");
        $query      =$query->leftJoin($this->table_user, $this->table_newsletter_subscriber.'.nsubEmail', '=', $this->table_user.'.email');
        if(isset($_GET['search'])){
            $query         = $query->where('nsubEmail',"like","%".$_GET['search']."%");
        }
        $query             =$query->orderby($this->table_newsletter_subscriber.'.created_at', 'DESC');
        $query             =$query->paginate($this->paging);

        $data['data']           =$query;
        return view('ipanel::newsletter_subscriber.index',['data'=>$data]);
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

    public function update_show($id)
    {
        //
    }
}
