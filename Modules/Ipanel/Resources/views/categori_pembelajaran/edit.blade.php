@extends('ipanel::layouts.master')

@section('content')
<div class="row">
    <pre style="height:200px;">
        <?php print_r($data) ?>
    </pre>
</div>
<div class="col-xs-12">
        <?php
            $data_get=$data['data'];
            //{{route('books.update',$book->id)}}
        ?>
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <form class="form-horizontal" role="form" method="post" action="{{route('categoripembelajaran.update',$data['data']->catPermalink)}}" id="categori_pembelajaran">
            @csrf
            @method('PUT')
            <!-- @method('PUT') -->
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Nama Kategori</label>
                <div class="col-sm-11">
                    <input type="text" name="pername" id="form-field-1" placeholder="Nama Kategori" value="{{$data['data']->catName}}" class="col-xs-10 col-sm-12"/>
                </div>
            </div>
          	<div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
                <div class="col-sm-11">
                    <textarea class="form-control summernote" name="perdesc" id="form-field-8" placeholder="Keterangan">{{$data['data']->catDescription}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Gambar Kategori</label>
                <div class="col-sm-11">
                    <a href="{{url('/assets/documents/kategori_pembelajaran/').'/'.$data['data']->catImage}}" rel="facebox">
                        <img src="{{url('/assets/documents/kategori_pembelajaran/').'/'.$data['data']->catImage}}" width="250px">
                    </a><br><br>    
                    <input type="file" id="id-input-file-2" <?php #multiple?> name="perfile" class="file_upload_theme_two"/>
                    <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em>
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