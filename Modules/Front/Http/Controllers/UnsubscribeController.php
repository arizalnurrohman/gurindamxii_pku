<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class UnsubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('front::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('front::create');
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
        return view('front::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('front::edit');
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

    public function email()
    {
        $email=$_GET['emails'];
        $subscriber     = DB::table("newsletter_subscriber")->select("nsubId","nsubEmail")->where("nsubEmail",$email);
        if($subscriber->count()>0){
            $subscriber=$subscriber->first();
            $update_payload =array(
                "nsubStatus"     =>'n',
                "nsubUnSubsribe" =>date("Y-m-d H:i:s")
            );
            $update_query   =DB::table("newsletter_subscriber")->where('nsubId', $subscriber->nsubId)->update($update_payload);
        }
        $data=array();
        return view('front::subscriber.index',['data'=>$data]);
    }
}
