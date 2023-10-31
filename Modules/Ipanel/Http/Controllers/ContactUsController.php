<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Ipanel\Entities\ContactUsModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class ContactUsController extends Controller
{
    public $table_contactus           ="contact_us";
    public $paging                    =5;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $query      = DB::table($this->table_contactus)
                                ->where('cuTitle',"like","%".$_GET['search']."%")
                                ->orderBy("created_at", "desc")
                                ->paginate($this->paging);
        }else{
            $query      = DB::table($this->table_contactus)
                                ->orderBy("created_at", "desc")
                                ->paginate($this->paging);
        }

        $data=array(
            "data"  =>$query,
            "new_ajax"=>"
                $('#dataTable tbody tr').click(function() {
                    var id = $(this).find(\"td:eq(0)\").text();
                    var nama = $(this).find(\"td:eq(1)\").text();
                    var alamat = $(this).find(\"td:eq(2)\").text();
            
                    // Memasukkan data ke dalam popup
                    $(\"#popup-id\").text(id);
                    $(\"#popup-nama\").text(nama);
                    $(\"#popup-alamat\").text(alamat);
            
                    // Menampilkan popup
                    $(\"#popup\").fadeIn();
            
                    // Mengubah warna baris yang di klik
                    $(this).css('background-color', '#a0a0a0 !important');
                });
            
                // Menutup popup saat tombol \"Tutup\" di klik
                $(\"#close-popup\").click(function() {
                    $(\"#popup\").fadeOut();
            
                    // Mengembalikan warna baris ke warna asli
                    //$(\"#dataTable tbody tr\").css(\"background-color\", \"\");
                });

            ",
        );
        return view('ipanel::contact_us.index',['data'=>$data]);
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
        $payload['cuRead']='read';
        $update_contactus=DB::table($this->table_contactus)->where('cuPermalink', $id)->update($payload);

        $data_get = DB::table($this->table_contactus)
                            ->where('cuPermalink', $id)
                            ->first();
        $detail='
            <div style="width:auto; min-width:400px; max-width:600px;">
                <div style="background-color:#438EB9 !important; padding:3px"><h2 style="color:white">Data Detail</h2></div>
                <table border="0">
                    <tr>
                        <td style="width:15%"><strong>Nama</strong></td>
                        <td style="width:1%">:</td>
                        <td> '.$data_get->cuName.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%"><strong>Email</strong></td>
                        <td style="width:1%">:</td>
                        <td> '.$data_get->cuEmail.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%"><strong>No HP</strong></td>
                        <td style="width:1%">:</td>
                        <td> '.$data_get->cuHP.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;"><strong>Waktu Kirim</strong></td>
                        <td style="width:1%">:</td>
                        <td> '.date("d M Y H:i:s",strtotime($data_get->created_at)).' WIB</td>
                    </tr>
                    <tr>
                        <td style="width:15%">&nbsp;</td>
                        <td style="width:1%">&nbsp;</td>
                        <td>&nbsp; </td>
                    </tr>
                    <tr>
                        <td style="width:15%"><strong>Judul</strong></td>
                        <td style="width:1%;">:</td>
                        <td> '.$data_get->cuTitle.'</td>
                    </tr>
                    <tr>
                        <td style="width:15%;vertical-align: top;"><strong>Pesan</strong></td>
                        <td style="width:1%;vertical-align: top;">:</td> 
                        <td> '.$data_get->cuMessage.'</td>
                    </tr>
                </table>
            </div>
        ';
        print $detail;
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
