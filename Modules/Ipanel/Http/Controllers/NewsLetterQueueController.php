<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class NewsLetterQueueController extends Controller
{
    public $table_newsletter        ="newsletter";
    public $table_newsletter_queue  ="newsletter_queue";
    public $paging                  =50;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $query      = DB::table($this->table_newsletter_queue);
        $query      =$query->leftJoin($this->table_newsletter, $this->table_newsletter_queue.'.newsId', '=', $this->table_newsletter.'.newsId');
        if(isset($_GET['search'])){
            $query         = $query->where('nqBody',"like","%".$_GET['search']."%");
        }
        $query             =$query->orderby($this->table_newsletter_queue.'.created_at', 'DESC');
        $query             =$query->paginate($this->paging);

        $data['data']           =$query;
        return view('ipanel::newsletter_queue.index',['data'=>$data]);
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
        $query      = DB::table($this->table_newsletter_queue);
        $query      = $query->where('nqPermalink',$id);
        $query      = $query->first();

        print $query->nqBody;
        exit;
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
