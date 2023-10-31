@extends('front::layouts.master')

@section('content')

<main id="main">
    <style>
        .post-content{
        background: #f8f8f8;
        border-radius: 4px;
        width: 100%;
        border: 1px solid #f1f2f2;
        overflow: hidden;
        position: relative;
        }

        .post-content img.post-image, video.post-video, .google-maps{
        width: 100%;
        height: auto;
        }

        .post-content .google-maps .map{
        height: 300px;
        }

        .post-content .post-container{
        padding: 20px;
        }

        .post-content .post-container .post-detail{
        margin-left: 65px;
        position: relative;
        margin-top:-50px;
        }

        .post-content .post-container .post-detail .post-text{
        line-height: 24px;
        margin: 0;
        }

        .post-content .post-container .post-detail .reaction{
        position: absolute;
        right: 0;
        top: 0;
        }

        .post-content .post-container .post-detail .post-comment{
        display: inline-flex;
        margin: 10px auto;
        width: 100%;
        }

        .post-content .post-container .post-detail .post-comment img.profile-photo-sm{
        margin-right: 10px;
        }

        .post-content .post-container .post-detail .post-comment .form-control{
        height: 30px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        margin: 7px 0;
        min-width: 0;
        }

        img.profile-photo-md {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        img.profile-photo-sm {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .text-green {
            color: #8dc63f;
        }

        .text-red {
            color: #ef4136;
        }

        .following {
            color: #8dc63f;
            font-size: 12px;
            margin-left: 20px;
        }
        .text-muted{
            font-size:12px;
        }

        /* FORM COMMENTS */
        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;
            border-color:#ccc;
        }
        a {
            color: #851a8b;
        }
        a:hover{
            color:#5e1362
        }
    </style>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a href="{{url('/front/dashboard/')}}">Dashboard</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <h2 style="font-weight:bold">Dashboard</h2>
            </div>
            <?php /*<div style="display:block; float:left;width:100%;">
                <span style="font-size:16px;">CAT NAME</span>
            </div> 
            <div style="display:block; float:left;width:100%;font-size:11px;">
                TIME_POST WIB
            </div>*/ ?>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="padding:0px">
        <div class="container" style="text-align:justify">
            <div class="row gy-4">
                <?php 
                /*DIBUANG
                <div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div>*/?>
                <div class="col-lg-12">
                    
                    <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                        <div class="widget-header">
                            <h5 class="widget-title smaller">Statistik Pencapaian Materi</h5>

                            <div class="widget-toolbar">
                                <span class="badge badge-danger" style="border-radius:0px;">
                                    &nbsp;
                                </span>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-6"> 
                                <div class="row" style="padding:5px; background-color:white; margin-left:0px !important; margin-right:0px !important;">
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title smaller">
													<i class="fa fa-quote-left smaller-80"></i>
													Persentase Total Penyelesaian Materi
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="row">
														<!-- START -->
                                                        <style type="text/css">
                                                            @property --p{
                                                                syntax: '<number>';
                                                                inherits: true;
                                                                initial-value: 1;
                                                            }

                                                            .pie {
                                                                --p:20;
                                                                --b:22px;
                                                                --c:darkred;
                                                                --w:150px;

                                                                width: var(--w);
                                                                aspect-ratio: 1;
                                                                position: relative;
                                                                display: inline-grid;
                                                                margin: 5px;
                                                                place-content: center;
                                                                font-size: 25px;
                                                                font-weight: bold;
                                                                font-family: sans-serif;
                                                                
                                                            }
                                                            .pie:before,.pie:after {
                                                                content: "";
                                                                position: absolute;
                                                                border-radius: 50%;
                                                            }
                                                            .pie:before {
                                                                inset: 0;
                                                                background:
                                                                    radial-gradient(farthest-side,var(--c) 98%,#0000) top/var(--b) var(--b) no-repeat,
                                                                    conic-gradient(var(--c) calc(var(--p)*1%),#0000 0);
                                                                -webkit-mask: radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
                                                                        mask: radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
                                                                        border:1px solid #313131;        
                                                            }
                                                            .pie:after {
                                                                inset: calc(50% - var(--b)/2);
                                                                background: var(--c);
                                                                transform: rotate(calc(var(--p)*3.6deg)) translateY(calc(50% - var(--w)/2));
                                                                
                                                            }
                                                            .animate {
                                                                animation: p 1s .5s both;
                                                            }
                                                            .no-round:before {
                                                                background-size: 0 0, auto;
                                                            }
                                                            .no-round:after {
                                                                content: none;
                                                            }
                                                            @keyframes p{
                                                                from{--p:0}
                                                            }

                                                        </style>
                                                        <div class="row">
                                                            <div class="col-lg-6" style="text-align:center">
                                                                <div class="col-lg-12" style="text-align:center">
                                                                    <div class="pie" style="--p:100;--c:purple;--b:10px; text-align:center"> {{$data_dashboard['dt_read']['total_materi']}}<br>Materi</div>
                                                                </div>
                                                                <div class="col-lg-12" style="text-align:center">
                                                                    <em>Jumlah  Materi yang telah ditandai Selesai Dibaca</em>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6" style="text-align:center">
                                                                <div class="col-lg-12" style="text-align:center">
                                                                    <div class="pie animate no-round" style="--p:{{$data_dashboard['dt_read']['total_persen']}};--c:orange;"> {{round($data_dashboard['dt_read']['total_persen'])}}%</div>
                                                                </div>
                                                                <div class="col-lg-12" style="text-align:center">
                                                                    <em>Jumlah Persentase Materi yang Selesai Dibaca</em>
                                                                </div>    
                                                            </div>
                                                        </div>    
                                                        
                                                        <?php /*<div class="pie" style="--p:90"> 20%</div>*/ ?>
                                                        
                                                        <?php /*<div class="pie no-round" style="--p:60;--c:purple;--b:15px"> 60%</div> */ ?>
                                                        
                                                        <?php /*<div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>*/ ?>
                                                        <?php /*<img src="https://cdn.vectorstock.com/i/preview-2x/67/07/golden-award-badge-vector-14876707.jpg" style="width:140px;">*/ ?> 
                                                        

                                                        <!-- END -->
													</div>
												</div>
											</div>
										</div>
                                        
                                    </div>
                                    

                                    <div class="col-lg-8 col-xs-12">
                                        <div class="row">
                                            <div class="widget-box">
                                                <div class="widget-header widget-header-flat">
                                                    <h4 class="widget-title smaller">
                                                        <i class="fa fa-quote-left smaller-80"></i>
                                                        Daftar Materi dan Persentase Penyelesaian
                                                    </h4>
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <?php /*
                                                        <div class="row>
                                                            <li class="clearfix ui-sortable-handle" style="list-style-type:none;">
                                                                <label class="inline" style="float:left; width:100%; background-color:#404040 !important;margin-left:0px;">
                                                                    <span class="lbl" style="float:left;width:80%"> 
                                                                        Judul Materi
                                                                    </span>
                                                                    <span style="float:right;width:20%;padding-right:5px; text-align:center">
                                                                        % Dibaca
                                                                    </span>
                                                                </label>
                                                            </li>
                                                        </div> */ ?>
                                                        <div class="row"  style="overflow:auto; max-height:160px;">
                                                            @php
                                                                $rndm_color=array("item-orange","item-red","item-default","item-blue","item-grey","item-green","item-pink");
                                                            @endphp
                                                            @if(count($data_dashboard['dt_read']['materi']) > 0)
                                                                @foreach($data_dashboard['dt_read']['materi'] as $mtkey=>$mtval)
                                                                @php
                                                                    $random_picked=array_rand($rndm_color,1);
                                                                    $hitung_persen=ceil(($mtval->readActual/$mtval->readContent)*100)
                                                                @endphp
                                                                <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle" style="list-style-type:none">
                                                                    <label class="inline" style="float:left; width:100%">
                                                                        <span class="lbl" style="float:left;width:80%"> 
                                                                            <a href="{{url('/front/materi/'.$mtval->pgPermalink)}}" target="_blank">
                                                                                {{$mtval->pgTitle}}
                                                                            </a>
                                                                        </span>
                                                                        <span style="float:right;width:20%;padding-right:5px; text-align:right">
                                                                            <a href="#">({{$mtval->readActual." / ".$mtval->readContent}}) {{$hitung_persen}}% </a>
                                                                        </span>
                                                                    </label>
                                                                </li>
                                                                @endforeach
                                                            @else
                                                                <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                       
                                </div>
                            </div>    
                        </div>    
                    </div>
                    <?php /*
                    <pre style="height:200px">
                        <?php print_r($data_dashboard['dt_riwayat']) ?>
                    </pre> */ ?>
                    <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                        <div class="widget-header">
                            <h5 class="widget-title smaller">RIWAYAT</h5>

                            <div class="widget-toolbar">
                                <span class="badge badge-danger" style="border-radius:0px;">
                                    &nbsp;
                                </span>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-6">
                            <!-- ini -->
                                <div class="widget-box transparent" id="recent-box">
                                    <div class="widget-header">
                                        <?php /*
                                        <h4 class="widget-title lighter smaller">
                                            <i class="fa fa-rss orange"></i>&nbsp; <strong>RIWAYAT</strong>
                                        </h4> */ ?>

                                        <div class="widget-toolbar no-border">
                                            <ul class="nav nav-tabs" id="recent-tab">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#materi-tab" aria-expanded="true">Materi</a>
                                                </li>
                                                
                                                <li class="">
                                                    <a data-toggle="tab" href="#daftar_baca-tab" aria-expanded="false">Daftar_Baca</a>
                                                </li>

                                                <li class="">
                                                    <a data-toggle="tab" href="#disukai-tab" aria-expanded="false">Disukai</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main padding-4">
                                            <div class="tab-content padding-8">
                                                <div id="materi-tab" class="tab-pane active">
                                                    <h4 class="smaller lighter green">
                                                        <i class="ace-icon fa fa-list"></i>
                                                        Riwayat Materi yang dibaca
                                                    </h4>

                                                    <ul id="tasks" class="item-list ui-sortable">
                                                        @if(count($data_dashboard['dt_riwayat']) > 0)
                                                            @foreach($data_dashboard['dt_riwayat'] as $mtkey=>$mtval)
                                                            @php
                                                                $random_picked=array_rand($rndm_color,1);
                                                            @endphp
                                                            <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                                                <label class="inline">
                                                                    <?php /*<input type="checkbox" class="ace"> */ ?>
                                                                    <span class="lbl"> 
                                                                        <a href="{{url('/front/materi/'.$mtval->pgPermalink)}}">{{$mtval->pgTitle}}</a>
                                                                        <br><i class="ace-icon fa fa-clock-o"></i>&nbsp;<em>{{date("d M Y H:i:s",strtotime($mtval->created_at))}} WIB</em>
                                                                    </span>
                                                                </label>
                                                                <?php /*
                                                                <div class="pull-right easy-pie-chart percentage" data-size="30" data-color="#ECCB71" data-percent="42" style="height: 30px; width: 30px; line-height: 29px;">
                                                                    <span class="percent">42</span>%
                                                                <canvas height="30" width="30"></canvas></div> */ ?>
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                                        @endif
                                                    </ul>
                                                    <div class="space-4"></div>
                                                    <div class="center">
                                                        <i class="ace-icon fa fa-list fa-2x green middle"></i>
                                                        &nbsp;
                                                        <a href="{{url('/front/riwayat_baca')}}" class="btn btn-sm btn-white btn-info">
                                                            Lihat Semua Riwayat Materi &nbsp;
                                                            <i class="ace-icon fa fa-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div id="daftar_baca-tab" class="tab-pane">
                                                    <h4 class="smaller lighter green">
                                                        <i class="ace-icon fa fa-book"></i>
                                                        Daftar Baca Materi
                                                    </h4>
                                                    <ul id="tasks" class="item-list ui-sortable">
                                                        @if(count($data_dashboard['dt_dfbaca']) > 0)
                                                            @foreach($data_dashboard['dt_dfbaca'] as $mtkey=>$mtval)
                                                            @php
                                                                $random_picked=array_rand($rndm_color,1);
                                                            @endphp
                                                            <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                                                <label class="inline">
                                                                    <span class="lbl"> 
                                                                        <a href="{{url('/front/materi/'.$mtval->pgPermalink)}}">{{$mtval->pgTitle}}</a>
                                                                        <br><i class="ace-icon fa fa-clock-o"></i>&nbsp;<em>{{date("d M Y H:i:s",strtotime($mtval->created_at))}} WIB</em>
                                                                    </span>
                                                                </label>
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                                        @endif
                                                    </ul>

                                                    <div class="space-4"></div>

                                                    <div class="center">
                                                        <i class="ace-icon fa fa-book fa-2x green middle"></i>

                                                        &nbsp;
                                                        <a href="{{url('/front/daftarku/daftar_baca/199002132023211016')}}" class="btn btn-sm btn-white btn-info">
                                                            Lihat Semua Daftar Baca Anda &nbsp;
                                                            <i class="ace-icon fa fa-arrow-right"></i>
                                                        </a>
                                                    </div>

                                                    <div class="hr hr-double hr8"></div>
                                                </div><!-- /.#member-tab -->

                                                <div id="disukai-tab" class="tab-pane">
                                                    <h4 class="smaller lighter green">
                                                    <i class="fa-solid fa-heart"></i>
                                                        Daftar Materi disukai
                                                    </h4>
                                                    <ul id="tasks" class="item-list ui-sortable">
                                                        @if(count($data_dashboard['dt_like']) > 0)
                                                            @foreach($data_dashboard['dt_like'] as $mtkey=>$mtval)
                                                            @php
                                                                $random_picked=array_rand($rndm_color,1);
                                                            @endphp
                                                            <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                                                <label class="inline">
                                                                    <span class="lbl"> 
                                                                        <a href="{{url('/front/materi/'.$mtval->pgPermalink)}}">{{$mtval->pgTitle}}</a>
                                                                        <br><i class="ace-icon fa fa-clock-o"></i>&nbsp;<em>{{date("d M Y H:i:s",strtotime($mtval->created_at))}} WIB</em>
                                                                    </span>
                                                                </label>
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                                        @endif
                                                    </ul>
                                                    <div class="hr hr8"></div>
                                                    <?php /*
                                                    <h4 class="smaller lighter green">
                                                        <i class="fa-solid fa-thumbtack"></i>
                                                        Daftar Materi ditandai
                                                    </h4>
                                                    <ul id="tasks" class="item-list ui-sortable">
                                                        @foreach($data_dashboard['dt_pinned'] as $mtkey=>$mtval)
                                                        @php
                                                            $random_picked=array_rand($rndm_color,1);
                                                        @endphp
                                                        <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                                            <label class="inline">
                                                                <span class="lbl"> 
                                                                    <a href="{{url('/front/materi/'.$mtval->pgPermalink)}}">{{$mtval->pgTitle}}</a>
                                                                    <br><i class="ace-icon fa fa-clock-o"></i>&nbsp;<em>{{date("d M Y H:i:s",strtotime($mtval->created_at))}} WIB</em>
                                                                </span>
                                                            </label>
                                                        </li>
                                                        @endforeach
                                                    </ul>

                                                    <!-- <div class="center">
                                                        <i class="ace-icon fa fa-comments-o fa-2x green middle"></i>

                                                        &nbsp;
                                                        <a href="#" class="btn btn-sm btn-white btn-info">
                                                            See all comments &nbsp;
                                                            <i class="ace-icon fa fa-arrow-right"></i>
                                                        </a>
                                                    </div> -->
                                                    */ ?>

                                                    <div class="hr hr-double hr8"></div>
                                                </div>
                                            </div>
                                        </div><!-- /.widget-main -->
                                    </div><!-- /.widget-body -->
                                </div>
                                <!-- end ini -->
                            </div>    
                        </div>    
                    </div>


                </div>
            </div>   
            
        </div>
    </section>

</main><!-- End #main -->
@endsection