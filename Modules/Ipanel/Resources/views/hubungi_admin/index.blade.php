@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Pengetahuan - Hubungi Admin
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    <?php /*
    <pre style="height:200px">
        <?php print_r($cu_data) ?>
    </pre> */ ?>
    <div class="widget-box">
        <div class="widget-header widget-header-small">
            <h5 class="widget-title lighter">Search Form</h5>
        </div>
    
        <div class="widget-body">
            <div class="widget-main">
                <form class="form-search" action="<?php #print baseurl()."ipanel/".$this->uri->segment(2)."/" ?>" method="get">
                    <div class="row">
                        <div class="box col-xs-4 ">
                        	<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Status Pesan..." name="statusperizinan">
                                <option value="">Pilih Status</option>
                                <option value="open" <?php #print $filter['statusperizinan']=="open" ? 'selected="Selected"' : ''; ?>>Open</option>
                                <option value="close" <?php #print $filter['statusperizinan']=="close" ? 'selected="Selected"' : ''; ?>>Close</option>
                            </select>
                        </div>
                        <div class="box col-xs-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-check"></i>
                                </span>
    
                                <input type="text" class="form-control search-query" placeholder="Ketik Pencarian" name="search" value="<?php print isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-purple btn-sm">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        Search
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style type="text/css">
        tr.unread td{
            background-color:#f4d0df !important 
        }
        tr.datarow:hover {
            background-color:#f2dce5 !important;
            cursor: pointer;
        }
        <?php /*
        .popup {
            display: none;
            position: fixed;
            top: 20%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            width: 80%;
            max-width: 600px; 
            height: auto;
            z-index: 10000;
            background-color: rgba(0, 0, 0, 0.8); 
            overflow-y: auto; 
            padding: 20px;
            box-sizing: border-box;
        }

        #popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            text-align: left;
        }

        .popup h2 {
            margin-top: 0;
        }

        .popup-button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-button:hover {
            background-color: #555;
        }

        */ ?>

        .blink {
            animation: blinker 1.5s linear infinite;
            color: red;
            font-family: sans-serif;
            font-weight:bold;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
            <tr>
                <th class="center" style="width:35px;background-color:#C6487E !important;color:white;">#</th>
                <th style="background-color:#C6487E !important;color:white;">-No Tiket<br>-Judul<br>-Isi<br>-Waktu Kirim</th>
                <th style="width:60px;background-color:#C6487E !important;color:white;">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data['data'] as $cukey=>$cupem)
            @php
                $comments = Modules\ipanel\Http\Controllers\HubungiAdminsController::count_comments($cupem->haId);
            @endphp
            <tr class="datarow <?php /*{{$cupem->cuRead =='unread'?'unread':''}} */ ?>">
                <td class="center">{{($data['data']->currentPage() - 1) * $data['data']->perPage() + $loop->iteration}}</td>
                <td>
                    <a href="{{route('hubungi_admins.show',$cupem->haPermalink)}}" style="font-weight:bold">{{$cupem->haTicket}}</a><br>
                    <em style="font-weight:bold">{{$cupem->haTitle}}</em><br>
                    <em>{!!$cupem->haContent!!}</em><br>
                    <em style="font-size:13px;">{!!date("d M Y H:i:s",strtotime($cupem->created_at))!!}</em><br>
                    
                </td>
                
                <td style="text-align:right">
                    <a href="{{route('hubungi_admins.show',$cupem->haPermalink)}}">
                        {{$comments['COUNT']}} &nbsp;<i class="fa fa-comments-o bigger-120"></i>
                    </a>
                    @if($comments['UNREAD']>0) 
                        <span class="blink">NEW</span>
                    @endif
                    <?php /*
                    <form method="POST" class="delete-form" data-route="{{route('pengetahuan_comments.destroy',$catpem->cmPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                    </form> */ ?>
                <?php /*
                </td> */ ?>
            </tr>
            <?php
            #} ?>
            @endforeach
        </tbody>
    </table>
    <?php /*
    <div id="popup" class="popup">
        <div id="popup-content">
            <h2>Data Detail</h2>
            <p>ID: <span id="popup-id"></span></p>
            <p>Nama: <span id="popup-nama"></span></p>
            <p>Alamat: <span id="popup-alamat"></span></p>
            <button id="close-popup" class="popup-button">Tutup</button>
        </div>
    </div> */ ?>
    {{$data['data']->links()}}
@endsection
