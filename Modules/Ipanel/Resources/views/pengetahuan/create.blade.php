@extends('ipanel::layouts.master')

@section('content')
<div class="page-header">
    <h1>Materi Pembelajaran
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
        <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan.store')}}" id="pengetahuan">
            @csrf
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                    <li class="active">
                        <a data-toggle="tab" href="#home4" aria-expanded="true">Pengetahuan</a>
                    </li>

                    <li class="">
                        <a data-toggle="tab" href="#profile4" aria-expanded="false">Pengetahuan Konten</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="home4" class="tab-pane active">
                        <!-- ISI TAB HOME -->
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Kategori Pengetahuan 	</label>
                            <div class="col-sm-11">
                                <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Kategori Materi..." name="pemcat" >
                                    <option value="">Pilih Kategori Pengetahuan</option>
                                    @foreach ($data['kategori'] as $dakategori)
                                    <option value="{{$dakategori->catId}}">{{$dakategori->catName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tipe Pengetahuan 	</label>
                            <div class="col-sm-11">
                                <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Kategori Materi..." name="pemtype" >
                                    <option value="">Pilih Tipe Pengetahuan</option>
                                    <option value="Public">Publik</option>
                                    <option value="Private">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal dan Waktu	</label>
                            <div class="col-sm-11">
                                <?php #<input type="text" name="pemdatetime" id="form-field-1" placeholder="Tanggal dan Waktu" class="col-xs-10 col-sm-12 datetime_picker"/> ?>
                                <div class="input-group">
                                    <input class="form-control datetime_picker" placeholder="Tanggal dan Waktu" id="id-date-picker-1" name="pemdatetime" type="text">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Pengetahuan	</label>
                            <div class="col-sm-11">
                                <input type="text" name="pemtitle" id="form-field-1" placeholder="Judul Pengetahuan" class="col-xs-10 col-sm-12"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Durasi Materi</label>
                            <div class="col-sm-11">
                                <div class="input-group">
                                <input type="text" name="pemtimeestimate" id="form-field-1" placeholder="Waktu Penyelesaian" class="col-xs-10 col-sm-12"/>
                                    <span class="input-group-addon">
                                        Menit
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
                            <div class="col-sm-11">
                                <textarea class="form-control summernote" name="pemdesc" id="form-field-8" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Gambar</label>
                            <div class="col-sm-11">
                                <input type="file" id="id-input-file-2" <?php #multiple?> name="pemfile" class="file_upload_theme_two"/>
                                <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em>
                            </div>
                        </div>
                        <!-- WNS TAB HOME -->
                    </div>

                    <div id="profile4" class="tab-pane">
                        <!-- TAB KONTENT -->
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

                        <hr>

                        <!-- END TAB KONTENT -->
                    </div>
                </div>
            </div>
            <?php #FORM SUBMIT BUTTON ?>
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