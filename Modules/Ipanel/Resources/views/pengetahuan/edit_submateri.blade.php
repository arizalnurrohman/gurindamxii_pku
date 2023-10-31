@extends('ipanel::layouts.master')

@section('content')
<div class="page-header">
    <h1>Kategori pengetahuan
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i> Edit Data Sub Materi 
        </small>
    </h1>
</div>

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
    <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan.update_submateri',$data['data']->pcPermalink)}}" id="detail_pengetahuan">
        @csrf
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tipe Konten 	</label>
            <div class="col-sm-11">
                <select class="chosen-select form-control type_content" id="form-field-select-3" data-placeholder="Tipe Konten..." name="content_type" >
                    <option value="">Pilih Tipe Konten</option>
                    @if($data['data']->pcContentType=='document')
                    <option value="document" @if($data['data']->pcContentType=='document') {{'Selected="Selected"'}} @endif>Dokumen</option>
                    @endif
                    @if($data['data']->pcContentType=='text')
                    <option value="text" @if($data['data']->pcContentType=='text') {{'Selected="Selected"'}} @endif>Artikel</option>
                    @endif
                    @if($data['data']->pcContentType=='video')
                    <option value="video" @if($data['data']->pcContentType=='video') {{'Selected="Selected"'}} @endif>Video</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Sub Materi</label>
            <div class="col-sm-11">
                <input type="text" name="content_title" id="form-field-1" placeholder="Judul Sub Materi" class="col-xs-10 col-sm-12" value="{{$data['data']->pcTitle}}"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Sub Materi</label>
            <div class="col-sm-11">
                <div class="input-group">
                <input type="text" name="content_estimate" maxlength="3" id="form-field-1" placeholder="Waktu Penyelesaian" value="{{$data['data']->pcDuration}}" class="col-xs-10 col-sm-12"/>
                    <span class="input-group-addon">
                        Menit
                    </span>
                </div>
            </div>
        </div>
        @if($data['data']->pcContentType=='text')
        <div class="form-group content_content">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Isi Konten</label>
            <div class="col-sm-11">
                <textarea class="form-control summernote" name="content_content" id="form-field-8" placeholder="Isi Konten">{{$data['data']->pcText}}</textarea>
            </div>
        </div>
        @endif
        @if($data['data']->pcContentType=='video')
        <div class="form-group content_video">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Video File</label>
            <div class="col-sm-11">
                @if($data['data']->pcVideo)
                    <video width="100%" style="aspect-ratio: 16 / 9" controls>
                        <source src="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcVideo)}}" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                    </video>
                @endif                
                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_video" class="file_upload_theme_two"/>
                <!-- <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em> -->
            </div>
        </div>
        @endif
        @if($data['data']->pcContentType=='document')
        <div class="form-group content_pdf">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">PDF File</label>
            <div class="col-sm-11">
                @if($data['data']->pcDocuments)
                    <object data="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcDocuments)}}" type="application/pdf" width="100%" height="400">
                        <a href="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcDocuments)}}">{{$data['data']->pcTitle}}</a>
                    </object>
                @endif
                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_pdf" class="file_upload_theme_two"/>
                <!-- <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em> -->
            </div>
        </div>
        @endif
        <?php /*
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Sub Materi 	</label>
            <div class="col-sm-11">
                <input type="text" name="pdsubmateri" id="form-field-1" placeholder="Judul Sub Materi" class="col-xs-10 col-sm-12" value="{{$data['data']->pcTitle}}"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
            <div class="col-sm-11">
                <textarea class="form-control summernote" name="pddesc" id="form-field-8" placeholder="Keterangan">{{$data['data']->pcText}}</textarea>
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
                    <input type="text" name="pdurl" id="form-field-1" placeholder="Url Video" class="col-xs-10 col-sm-12" value="{{$data['data']->pcVideo}}"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Waktu</label>
            <div class="col-sm-11">
                <div class="input-group" style="margin-bottom:3px;">
                <input type="text" name="pdestimate" id="form-field-1" placeholder="Durasi Waktu" class="col-xs-10 col-sm-12" maxlength="3" value="{{$data['data']->pcDuration}}"/>
                    <span class="input-group-addon">
                        <strong>Menit</strong>
                    </span>
                </div>
            </div>
        </div>
        */ ?>
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