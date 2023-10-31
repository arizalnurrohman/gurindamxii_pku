@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Pengetahuan - Komentar
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
                                <option value="">Pilih Status Pesan</option>
                                <option value="unread" <?php #print $filter['statusperizinan']=="unread" ? 'selected="Selected"' : ''; ?>>Belum Dibaca</option>
                                <option value="read" <?php #print $filter['statusperizinan']=="read" ? 'selected="Selected"' : ''; ?>>Sudah Dibaca</option>
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


    </style>
    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
            <tr>
                <th class="center" style="width:35px;background-color:#C6487E !important;color:white;">#</th>
                <th style="background-color:#C6487E !important;color:white;">-Judul<br>-Isi<br>-Waktu Kirim</th>
                <?php /* <th style="width:40px;background-color:#C6487E !important;color:white;">&nbsp</th> */ ?>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data['data'] as $cukey=>$cupem)
            <tr class="datarow {{$cupem->cuRead =='unread'?'unread':''}}">
                <td class="center">{{($data['data']->currentPage() - 1) * $data['data']->perPage() + $loop->iteration}}</td>
                <td>
                    <a href="{{route('contact_us.show',$cupem->cuPermalink)}}" style="font-weight:bold" rel="facebox">{{$cupem->cuTitle}}</a><br>
                    <em>{!!$cupem->cuMessage!!}</em><br>
                    <em style="font-size:13px;">{!!date("d M Y H:i:s",strtotime($cupem->created_at))!!}</em><br>
                </td>
                <?php /*
                <td>
                    <a href="{{route('contact_us.show',$cupem->cuPermalink)}}" rel="facebox">
                        <button class="btn btn-mini btn-warning">
                            <i class="fa fa-search bigger-120"></i>
                        </button>
                    </a>*/ ?>    
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
