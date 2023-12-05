@extends('ipanel::layouts.master')

@section('content')
<div class="page-header">
    <h1>Materi Highlight
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i> Tambah 
        </small>
    </h1>
</div>
<!-- <div class="col-xs-12">
    <form action="{{route('pengetahuan_category.store')}}" method="POST">
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
<div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan_highlight.store')}}" id="pengetahuan_category">
            @csrf
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Materi	</label>
                <div class="col-sm-11">
                    <select multiple="" name="hltitle[]" class="select2 tag-input-style" data-placeholder="Pilih Judul Materi..." style="width:100%">
                        <option value="">&nbsp;</option>
                        @foreach ($data['materi'] as $mat)
                        <option value="{{$mat->pgId}}">{{$mat->pgTitle}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal Mulai	</label>
                <div class="col-sm-11">
                    <input type="text" name="hlstart" id="form-field-1" placeholder="Tanggal Mulai" class="col-xs-10 col-sm-12 datetime_picker"/>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal Selesai	</label>
                <div class="col-sm-11">
                    <input type="text" name="hlend" id="form-field-1" placeholder="Tanggal Akhir" class="col-xs-10 col-sm-12 datetime_picker"/>
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