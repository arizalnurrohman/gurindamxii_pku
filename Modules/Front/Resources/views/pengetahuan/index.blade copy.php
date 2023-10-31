@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Riwayat Baca Materi Pembelajaran</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <!-- <div style="display:block; float:left;width:100%">
                    <ol>
                        <li><a href="{{url("/front")}}">Home</a></li>
                        <li>Materi</li>
                    </ol>
                </div> -->
                <h2 style="font-weight:bold">Riwayat Baca Materi Pembelajaran</h2>
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
                /*DIBUANG<div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div>*/ ?>
                <div class="col-lg-12">
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <?php #---------------------------------------------------------------------------------------------?>
                    <div class="widget-box">
                        <div class="widget-header widget-header-small">
                            <h5 class="widget-title lighter">Kolom Pencarian</h5>
                        </div>
                    
                        <div class="widget-body">
                            <div class="widget-main">
                                <form class="form-search" action="<?php #print baseurl()."ipanel/".$this->uri->segment(2)."/" ?>" method="get">
                                    <div class="row">
                                        <?php /*
                                        <div class="box col-xs-6 ">
                                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Status Pembatalan..." name="pembatalansts">
                                                <option value="">  </option>
                                                <option value="Menunggu" <?php #print $filter['pembatalansts']=="Menunggu" ? 'selected="Selected"' : ''; ?>>Menunggu Proses</option>
                                                <option value="Disetujui" <?php #print $filter['pembatalansts']=="Disetujui" ? 'selected="Selected"' : ''; ?>>Pembatalan Disetujui</option>
                                            </select>
                                        </div> */ ?>
                                        <div class="box col-xs-8">
                                            <div class="input-group">
                                                <?php /*
                                                <span class="input-group-addon">
                                                    <i class="ace-icon fa fa-check"></i>
                                                </span>*/ ?>
                    
                                                <input type="text" class="form-control search-query" placeholder="Masukan Judul materi" name="search" value="<?php #print $filter['search'] ? $filter['search'] : ''; ?>">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-purple btn-sm">
                                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                        Cari Materi
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php ##-------------------------------------------------------------------------------------------------------------?>
                    <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-6">
                        <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                            <div class="widget-header">
                                <h5 class="widget-title smaller">Daftar Riwayat Baca Anda</h5>

                                <div class="widget-toolbar">
                                    <span class="badge badge-danger" style="border-radius:0px;">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace">
                                            <span class="lbl">&nbsp;Semua</span>
                                        </label>
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
                                            <div class="col-xs-6 col-sm-3" style="margin-bottom:10px;vertical-align:top">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                                <img src="{{asset('storage/images/assets_pengetahuan/'.$maval->pgImage)}}" width="90%">
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
                                                        andaadadimana
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