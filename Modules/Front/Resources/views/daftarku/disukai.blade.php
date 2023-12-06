@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Daftarku - Disukai</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <!-- <div style="display:block; float:left;width:100%">
                    <ol>
                        <li><a href="{{url("/front")}}">Home</a></li>
                        <li>Materi</li>
                    </ol>
                </div> -->
                <h2 style="font-weight:bold">Daftar Materi Disukai</h2>
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
                                <h5 class="widget-title smaller">Daftar Materi yang disukai</h5>

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
                                            @php
                                            $time_ago = Modules\Front\Http\Controllers\MateriController::time_elapsed_string($maval->pgTimePost);
                                            @endphp
                                            <div class="col-xs-6 col-sm-3" style="margin-bottom:10px;">
                                                <img src="{{asset('storage/images/assets_pengetahuan/'.$maval->pgImage)}}" width="100%">
                                            </div>
                                            <div class="col-xs-6 col-sm-9" style="margin-bottom:10px;border-bottom:dashed 1px #5E1362;position: relative">
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
                                                    <div class="col-xs-12" style="font-size:12px;text-align:right;bottom:0px;position:absolute;bottom: 8px;">
                                                        <form method="POST" class="delete-form" data-route="{{route('daftarku.destroy',$maval->lkId)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-white btn-warning btn-bold">
                                                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                                                Hapus Sukai
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    </section>

</main><!-- End #main -->
@endsection