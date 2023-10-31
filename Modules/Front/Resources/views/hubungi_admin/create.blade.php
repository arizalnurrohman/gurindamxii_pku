@extends('front::layouts.master')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Hubungi Admin</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <h2 style="font-weight:bold">Hubungi Admin</h2>
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
                </div>*/ ?>
                <div class="col-lg-12">
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-6">
                        <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                            <div class="widget-header">
                                <h5 class="widget-title smaller">Hubungi Admin - Tambah</h5>

                                <div class="widget-toolbar">
                                    <span class="badge badge-danger">&nbsp;</span>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-6">        
                                    <div class="row" style="padding:5px; background-color:white; margin-left:0px !important; margin-right:0px !important;">
                                        <div class="col-xs-12">
                                            <!-- PAGE CONTENT BEGINS -->
                                            <div class="alert alert-danger print-error-msg" style="display:none"></div>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('hubungi_admin.store')}}" id="hubungiadmin">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Judul Topik</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" name="hubungijudul" id="form-field-1" placeholder="Judul Topik" class="col-xs-10 col-sm-12"/>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-top:20px;">
                                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Isi Topik</label>
                                                    <div class="col-sm-12">
                                                        <textarea name="hubungikonten" class="summernote"></textarea>
                                                    </div>
                                                </div>
                                        
                                                <div class="form-group"></div>
                                                <div class="form-group">
                                                <div class="col-sm-12"></div>
                                                </div>
                                        
                                                <div class="clearfix form-actions">
                                                    <div class="col-md-offset-3 col-md-12" style="text-align:right">
                                                        <button class="btn btn-info btn-submit" type="submit">
                                                            <i class="ace-icon fa fa-check bigger-110"></i>
                                                            Tambah Topik
                                                        </button>
                                        
                                                        &nbsp; &nbsp; &nbsp;
                                                        <button class="btn" type="reset">
                                                            <i class="ace-icon fa fa-undo bigger-110"></i>
                                                            Reset
                                                        </button>
                                                        
                                                        &nbsp; &nbsp; &nbsp;
                                                        <button class="btn btn-danger" type="button" OnClick="window.location.href='{{url('/front/'.request()->segment(2))}}'">
                                                            <i class="ace-icon fa fa-mail-reply bigger-110"></i>
                                                            Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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