@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Daftarku - Daftar Baca</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <!-- <div style="display:block; float:left;width:100%">
                    <ol>
                        <li><a href="{{url("/front")}}">Home</a></li>
                        <li>Materi</li>
                    </ol>
                </div> -->
                <h2 style="font-weight:bold">Daftar Baca</h2>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="padding:0px">
        <div class="container" style="text-align:justify">
            <style type="text/css">
                a {
                    color: #851a8b;
                }
                a:hover{
                    color:#5e1362
                }
            </style>
            <div class="row gy-4">
                <?php 
                /*DIBUANG
                <div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div> */ ?>
                <div class="col-lg-12">
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-6">
                        <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                            <div class="widget-header">
                                <h5 class="widget-title smaller">Daftar Baca Materi</h5>

                                <div class="widget-toolbar">
                                    <span class="badge badge-danger" style="border-radius:0px;">
                                        &nbsp;
                                    </span>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main padding-6">        
                                    <div class="row" style="padding:5px; background-color:white; margin-left:0px !important; margin-right:0px !important;">
                                        <?php /*
                                        <div class="col-lg-12 col-md-12 d-flex align-items-stretch" style="margin-bottom:10px;  ">
                                            <span style="font-weight:bold; border-bottom:1px solid #ccc; width:100%">Riwayat Baca :</span><br>
                                        </div> */ ?>
                                        @if(count($data['data']) > 0)
                                            @foreach($data['data'] as $makey=>$maval)
                                                @if($maval->pgId > 0)
                                                    @php
                                                    $time_ago = Modules\Front\Http\Controllers\MateriController::time_elapsed_string($maval->pgTimePost);
                                                    @endphp
                                                    <div class="col-xs-6 col-sm-3" style="margin-bottom:10px;">
                                                        <img src="{{asset('storage/images/assets_pengetahuan/'.$maval->pgImage)}}" width="100%">
                                                    </div>
                                                    <div class="col-xs-6 col-sm-9" style="margin-bottom:10px;border-bottom:dashed 1px #5E1362">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <a href="{{url("front/materi/".$maval->pgPermalink)}}" style="font-size:16px;">{{$maval->pgTitle}}</a>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                {{$maval->catName}}
                                                            </div>
                                                            <div class="col-xs-12" style="font-size:12px;">
                                                                {{date("d M Y H:i:s",strtotime($maval->created_at))}} WIB
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ini ya -->
                    <?php /*
                    <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-1">
                        <div class="widget-box ui-sortable-handle" id="widget-box-1">
                            <div class="widget-header">
                                <h5 class="widget-title">Default Widget Box</h5>

                                <div class="widget-toolbar">
                                    <div class="widget-menu">
                                        <a href="#" data-action="settings" data-toggle="dropdown" aria-expanded="false">
                                            <i class="ace-icon fa fa-bars"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
                                            <li>
                                                <a data-toggle="tab" href="#dropdown1">Option#1</a>
                                            </li>

                                            <li>
                                                <a data-toggle="tab" href="#dropdown2">Option#2</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="#" data-action="fullscreen" class="orange2">
                                        <i class="ace-icon fa fa-expand"></i>
                                    </a>

                                    <a href="#" data-action="reload">
                                        <i class="ace-icon fa fa-refresh"></i>
                                    </a>

                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>

                                    <a href="#" data-action="close">
                                        <i class="ace-icon fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main ace-scroll scroll-disabled" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar" style="top: 0px;"></div></div><div class="scroll-content" style="">
                                    <p class="alert alert-info">
                                        Nunc aliquam enim ut arcu aliquet adipiscing. Fusce dignissim volutpat justo non consectetur. Nulla fringilla eleifend consectetur.
                                    </p>
                                    <p class="alert alert-success">
                                        Raw denim you probably haven't heard of them jean shorts Austin.
                                    </p>
                                </div></div>
                            </div>
                        </div>
                    </div>
                    */ ?>

                    

                    <!-- end -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection