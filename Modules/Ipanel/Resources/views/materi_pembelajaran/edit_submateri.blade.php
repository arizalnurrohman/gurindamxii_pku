@extends('ipanel::layouts.master')

@section('content')
<div class="page-header">
    <h1>Kategori Pembelajaran
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i> Tambah 
        </small>
    </h1>
</div>
<!-- <div class="col-xs-12">
    <form action="{{route('categoripembelajaran.store')}}" method="POST">
        @csrf
        <label for="">Title</label><br>
        <input type="text" name="title" id=""><br>

        <label for="">Author</label><br>
        <input type="text" name="author" id=""><br>

        <label for="">Page</label><br>
        <input type="text" name="page" id=""><br>

        <label for="">year</label><br>
        <input type="text" name="year" id=""><br><br>

        <input type="submit" value="save" class="btn btn-primary">
    </form>
</div> -->
<pre style="height:200px">
    <?php print_r($data) ?>
</pre>
<!-- Way 1: Display All Error Messages -->
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
    select.select2combo{
        radius:0px !important;
    } 
</style>
<div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->
    
    <div class="alert alert-danger print-error-msg" style="display:none"></div>
    <form class="form-horizontal" role="form" method="post" action="{{route('mpembelajaran.update_submateri',$data['data']->pdPermalink)}}" id="detail_pembelajaran">
        @csrf
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Sub Materi 	</label>
            <div class="col-sm-11">
                <input type="text" name="pdsubmateri" id="form-field-1" placeholder="Judul Sub Materi" class="col-xs-10 col-sm-12" value="{{$data['data']->pdTitle}}"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
            <div class="col-sm-11">
                <textarea class="form-control summernote" name="pddesc" id="form-field-8" placeholder="Keterangan">{{$data['data']->pdDescription}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">File Materi</label>
            <div class="col-sm-11">
                <input type="file" id="id-input-file-2" <?php #multiple?> name="pdfile" class="file_upload_theme_two"/>
                <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Url Video</label>
            <div class="col-sm-11">
                <div class="input-group" style="margin-bottom:3px;">
                    <span class="input-group-addon">
                        <strong>URL</strong>
                    </span>
                    <input type="text" name="pdurl" id="form-field-1" placeholder="Url Video" class="col-xs-10 col-sm-12" value="{{$data['data']->pdVideo}}"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Waktu</label>
            <div class="col-sm-11">
                <div class="input-group" style="margin-bottom:3px;">
                <input type="text" name="pdestimate" id="form-field-1" placeholder="Durasi Waktu" class="col-xs-10 col-sm-12" maxlength="3" value="{{$data['data']->pdDuration}}"/>
                    <span class="input-group-addon">
                        <strong>Menit</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group"></div>
        <div class="form-group">
            <div class="col-sm-9"></div>
        </div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9" style="text-align:right">
                <button class="btn btn-info btn-submit" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Simpan
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                </button>
                
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-danger" type="button" onClick="window.location='<?php #print $cancel_url ?>'">
                    <i class="ace-icon fa fa-mail-reply bigger-110"></i>
                    Batal
                </button>
            </div>
        </div>
    </form>
    </div>
@endsection