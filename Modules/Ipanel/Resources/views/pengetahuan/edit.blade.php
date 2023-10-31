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
        <form class="form-horizontal" role="form" method="post" action="{{route('pengetahuan.update',$data['data']->pgPermalink)}}" id="pengetahuan">
            @csrf
            @method('PUT')
            <!-- @method('PUT') -->
            <?php
            /*
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
                    <a href="{{asset('storage/images/assets_pengetahuan_category/'.$data['data']->catImage)}}" rel="facebox">    
                        <img src="{{asset('storage/images/assets_pengetahuan_category/'.$data['data']->catImage)}}" width="250px">
                    </a>
                    <br><br>    
                    <input type="file" id="id-input-file-2" <?php #multiple?> name="perfile" class="file_upload_theme_two"/>
                    <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em>
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
              <div class="col-sm-9"></div>
            </div> */ ?>
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                    <li class="active">
                        <a data-toggle="tab" href="#home4" aria-expanded="true">Pengetahuan</a>
                    </li>
                    <?php /*
                    <li class="">
                        <a data-toggle="tab" href="#profile4" aria-expanded="false">Pengetahuan Konten</a>
                    </li> */ ?>
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
                                    <option value="{{$dakategori->catId}}" {{$data['data']->catId==$dakategori->catId? 'selected="Selected"':''}}>{{$dakategori->catName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tipe Pengetahuan 	</label>
                            <div class="col-sm-11">
                                <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Kategori Materi..." name="pemtype" >
                                    <option value="">Pilih Tipe Pengetahuan</option>
                                    <option value="Public" {{$data['data']->pgType=="Public"? 'selected="Selected"':''}}>Publik</option>
                                    <option value="Private" {{$data['data']->pgType=="Private"? 'selected="Selected"':''}}>Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tanggal dan Waktu	</label>
                            <div class="col-sm-11">
                                <?php #<input type="text" name="pemdatetime" id="form-field-1" placeholder="Tanggal dan Waktu" class="col-xs-10 col-sm-12 datetime_picker"/> ?>
                                <div class="input-group">
                                    <input class="form-control datetime_picker" value="{{date('d/m/Y H:i:s',strtotime($data['data']->pgTimePost))}}" placeholder="Tanggal dan Waktu" id="id-date-picker-1" name="pemdatetime" type="text">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Judul Pengetahuan	</label>
                            <div class="col-sm-11">
                                <input type="text" name="pemtitle" id="form-field-1" placeholder="Judul Pengetahuan" class="col-xs-10 col-sm-12" value="{{$data['data']->pgTitle}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Waktu Penyelesaian</label>
                            <div class="col-sm-11">
                                <div class="input-group">
                                <input type="text" name="pemtimeestimate" id="form-field-1" placeholder="Waktu Penyelesaian" class="col-xs-10 col-sm-12" value="{{$data['data']->pgEstimation}}"/>
                                    <span class="input-group-addon">
                                        Menit
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Keterangan</label>
                            <div class="col-sm-11">
                                <textarea class="form-control summernote" name="pemdesc" id="form-field-8" placeholder="Keterangan">{{$data['data']->pgDescription}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Gambar</label>
                            <div class="col-sm-11">
                                @if($data['data']->pgImage)
                                <a href="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pgImage)}}" rel="facebox">    
                                    <img src="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pgImage)}}" width="250px">
                                </a>
                                <br><br>
                                @endif
                                <input type="file" id="id-input-file-2" <?php #multiple?> name="pemfile" class="file_upload_theme_two"/>
                                <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em>
                            </div>
                        </div>
                        <!-- WNS TAB HOME -->
                    </div>
                    <?php /*
                    <div id="profile4" class="tab-pane">
                        <!-- TAB KONTENT -->
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Tipe Konten 	</label>
                            <div class="col-sm-11">
                                <select class="chosen-select form-control type_content" id="form-field-select-3" data-placeholder="Tipe Konten..." name="content_type" >
                                    <option value="">Pilih Tipe Konten</option>
                                    <option value="document" {{$data['data']->pcContentType=="document" ? 'selected="Selected"': ''}}>Dokumen</option>
                                    <option value="text" {{$data['data']->pcContentType=="text" ? 'selected="Selected"': ''}}>Artikel</option>
                                    <option value="video" {{$data['data']->pcContentType=="video" ? 'selected="Selected"': ''}}>Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Waktu Penyelesaian</label>
                            <div class="col-sm-11">
                                <div class="input-group">
                                <input type="text" name="content_estimate" maxlength="3" id="form-field-1" placeholder="Waktu Penyelesaian" class="col-xs-10 col-sm-12"  value="{{$data['data']->pcDuration}}"/>
                                    <span class="input-group-addon">
                                        Menit
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php #@if($data['data']->pcContentType =='text') ?>
                        <div class="form-group content_content">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> Isi Konten</label>
                            <div class="col-sm-11">
                                <textarea class="form-control summernote" name="content_content" id="form-field-8" placeholder="Isi Konten">{{$data['data']->pcText}}</textarea>
                            </div>
                        </div>
                        <?php #@endif ?>
                        <?php #@if($data['data']->pcContentType =='video') ?>
                        <div class="form-group content_video">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">Video File</label>
                            <div class="col-sm-11">
                                @if($data['data']->pcContentType =='video')
                                <video width="100%" style="aspect-ratio: 16 / 9" controls>
                                    <source src="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcVideo)}}" type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                </video>
                                @endif
                                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_video" class="file_upload_theme_two"/>
                            </div>
                        </div>
                        <?php #@endif ?>
                        <?php #@if($data['data']->pcContentType =='document') ?>
                        <div class="form-group content_pdf">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">PDF File</label>
                            <div class="col-sm-11">
                                @if($data['data']->pcContentType =='document')
                                <object data="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcDocuments)}}" type="application/pdf" width="100%" height="400">
                                    <a href="{{asset('storage/images/assets_pengetahuan/'.$data['data']->pcDocuments)}}">{{$data['data']->pcContentType}}</a>
                                </object>
                                @endif
                                <input type="file" id="id-input-file-2" <?php #multiple?> name="content_pdf" class="file_upload_theme_two"/>
                                <!-- <em style="color:#960">Format Scan File Harus <strong>JPG/JPEG</strong></em> -->
                            </div>
                        </div>
                        <?php #@endif ?>
                        <!-- END TAB KONTENT -->
                    </div>
                    */ ?>
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
                    <button class="btn btn-danger" type="button" onClick="window.location='{{route('pengetahuan.index')}}'">
                        <i class="ace-icon fa fa-mail-reply bigger-110"></i>
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection