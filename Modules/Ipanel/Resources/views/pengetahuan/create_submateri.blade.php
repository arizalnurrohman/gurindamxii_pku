@extends('ipanel::layouts.master')

@section('content')
<div class="page-header">
    <h1>Pengetahuan
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i> Tambah Sub Materi
        </small>
    </h1>
</div>
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
    <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan.store_submateri',$data['data']->pgPermalink)}}" id="detail_pengetahuan">
        @csrf
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tipe Konten 	</label>
            <div class="col-sm-11">
                <select class="chosen-select form-control type_content" id="form-field-select-3" data-placeholder="Tipe Konten..." name="content_type" >
                    <option value="">Pilih Tipe Konten</option>
                    <option value="document">Dokumen</option>
                    <option value="text">Artikel</option>
                    <option value="video">Video</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Sub Materi</label>
            <div class="col-sm-11">
                <input type="text" name="content_title" id="form-field-1" placeholder="Judul Sub Materi" class="col-xs-10 col-sm-12"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Sub Materi</label>
            <div class="col-sm-11">
                <div class="input-group">
                <input type="text" name="content_estimate" maxlength="3" id="form-field-1" placeholder="Waktu Penyelesaian" class="col-xs-10 col-sm-12"/>
                    <span class="input-group-addon">
                        Menit
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group content_content">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Isi Konten</label>
            <div class="col-sm-11">
                <textarea class="form-control summernote" name="content_content" id="form-field-8" placeholder="Isi Konten"></textarea>
            </div>
        </div>
        <div class="form-group content_video">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Video File</label>
            <div class="col-sm-11">
                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_video" class="file_upload_theme_two"/>
                <!-- <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em> -->
            </div>
        </div>

        <div class="form-group content_pdf">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">PDF File</label>
            <div class="col-sm-11">
                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_pdf" class="file_upload_theme_two"/>
                <!-- <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em> -->
            </div>
        </div>
        <?php /*
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Sub Materi 	</label>
            <div class="col-sm-11">
                <input type="text" name="pdsubmateri" id="form-field-1" placeholder="Judul Sub Materi" class="col-xs-10 col-sm-12"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
            <div class="col-sm-11">
                <textarea class="form-control summernote" name="pddesc" id="form-field-8" placeholder="Keterangan"></textarea>
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
                    <input type="text" name="pdurl" id="form-field-1" placeholder="Url Video" class="col-xs-10 col-sm-12"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Waktu</label>
            <div class="col-sm-11">
                <div class="input-group" style="margin-bottom:3px;">
                <input type="text" name="pdestimate" id="form-field-1" placeholder="Durasi Waktu" class="col-xs-10 col-sm-12" maxlength="3"/>
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