@extends('ipanel::layouts.master')

@section('content')
<div class="row">
    <?php /*
    <pre style="height:200px;">
        <?php print_r($data) ?>
    </pre> */ ?>
</div>
<div class="col-xs-12">
        <?php
            #$data_get=$data['data'];
            //{{route('books.update',$book->id)}}
        ?>
        <!-- PAGE CONTENT BEGINS -->
        <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan_highlight.update',$data['data']->hlPermalink)}}" id="pengetahuan_category">
            @csrf
            @method('PUT')
            <!-- @method('PUT') -->
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Nama Kategori</label>
                <div class="col-sm-11">
                    <?php /*<input type="text" name="hltitle" id="form-field-1" placeholder="Judul Materi" value="{{$data['data']->pgId}}" class="col-xs-10 col-sm-12"/>*/ ?>
                    <select name="hltitle" class="select2 tag-input-style" data-placeholder="Pilih Judul Materi..." style="width:100%">
                        <option value="{{$data['data']->pgId}}">{{$data['data']->pgTitle}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal Mulai	</label>
                <div class="col-sm-11">
                    <input type="text" name="hlstart" id="form-field-1" placeholder="Tanggal Mulai" class="col-xs-10 col-sm-12 datetime_picker" value="{{date('d/m/Y H:i:s',strtotime($data['data']->hlStart))}}"/>
                </div>
            </div>
            <div class="form-group">
            	<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal Selesai	</label>
                <div class="col-sm-11">
                    <input type="text" name="hlend" id="form-field-1" placeholder="Tanggal Akhir" class="col-xs-10 col-sm-12 datetime_picker" value="{{date('d/m/Y H:i:s',strtotime($data['data']->hlEnd))}}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Status Highlight 	</label>
                <div class="col-sm-11">
                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Status Highlight..." name="hlstatus" >
                        <option value="">Pilih Status Highlight</option>
                        <option value="y" {{($data['data']->hlStatus=='y' ? 'selected="Selected"': '')}}>Aktif</option>
                        <option value="n" {{($data['data']->hlStatus=='n' ? 'selected="Selected"': '')}}>Tidak Aktif</option>
                    </select>
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