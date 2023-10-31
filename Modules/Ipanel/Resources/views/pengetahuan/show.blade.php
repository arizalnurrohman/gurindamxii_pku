@extends('ipanel::layouts.master')

@section('content')
<?php /* <h3>{{$categori_pembelajaran->catPermalink}}</h3>
<p>Writen By : {{$categori_pembelajaran->catPermalink}}</p>
<p>Number of Page : {{$categori_pembelajaran->catPermalink}}</p>
<p>Publisher On : {{$categori_pembelajaran->catPermalink}}</p>
*/ ?>




<div class="widget-box">
    <div class="widget-header">
        <h4 class="smaller">
            Pengetahuan »
            <small>{{$data['data']->pgTitle}}</small>
        </h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <div class="profile-user-info profile-user-info-striped" style="margin-bottom:20px;">
                <div class="profile-info-row">
                    <div class="profile-info-name"> Kategori Pengetahuan: </div>
                    <div class="profile-info-value"><span>{{$data['data']->catName}}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Judul Pengetahuan: </div>
                    <div class="profile-info-value"><span>{{$data['data']->pgTitle}}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Keterangan: </div>
                    <div class="profile-info-value"><span>{!!$data['data']->pgDescription!!}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Estimasi Waktu: </div>
                    <div class="profile-info-value"><span>{{$data['data']->pgEstimation}} Menit</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Gambar: </div>
                    <div class="profile-info-value">
                        <span>
                            <a href="{{url('/storage/images/assets_pengetahuan/'.$data['data']->pgImage)}}" rel="facebox">
                                <img src="{{url('/storage/images/assets_pengetahuan/'.$data['data']->pgImage)}}" alt="{{$data['data']->pgTitle}}" width="250">
                            </a>
                        </span>
                    </div>
                </div>
                
                <hr>
            </div>
            <h3 class="header smaller lighter green">
                <i class="ace-icon fa fa-list"></i>
                Konten
            </h3>
            <div class="profile-user-info profile-user-info-striped" style="margin-bottom:20px;border:0px !important;">
                <div class="" style="margin-bottom:20px; text-align:right">
                    <a href="{{route('pengetahuan.create_submateri',$data['data']->pgPermalink)}}">
                        <button class="btn btn-xs btn-warning">
                            <i class="ace-icon fa fa-plus bigger-110"></i>

                            Tambah Data Sub Materi
                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </a>    
                </div>
                <!-- ACORDION -->
                <div id="accordion" class="accordion-style1 panel-group">
                    @foreach($data['data']->content as $ctid=>$ctval)
                    <div class="panel panel-default submateri_{{$ctval->pcId}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#accor_{{$ctval->pcId}}" aria-expanded="false">
                                    <i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
                                    &nbsp;
                                    {{$ctval->pcTitle}}
                                    &nbsp;
                                    @if($ctval->pcContentType =='document')
                                        <i class="ace-icon fa fa-file-pdf-o"></i>
                                    @elseif($ctval->pcContentType =='video')
                                        <i class="ace-icon fa fa-video-camera"></i>
                                    @else
                                        <i class="ace-icon fa fa-newspaper-o"></i>
                                    @endif
                                </a>
                            </h4>
                            
                        </div>

                        <div class="panel-collapse collapse" id="accor_{{$ctval->pcId}}" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <div class="profile-info-row" style="text-align:right;">
                                    <div class="profile-info-name" style="background-color:white !important">&nbsp;</div>
                                    <div class="profile-info-value" style="width:100%">
                                        <a onclick='window.location.href="{{route('pengetahuan.edit_submateri',$ctval->pcPermalink)}}"'>
                                            <button class="btn btn-xs btn-info">
                                                <i class="ace-icon fa fa-pencil bigger-110"></i>Edit
                                            </button>
                                        </a>
                                        <a href="{{route('pengetahuan.destroy_submateri',$ctval->pcPermalink)}}" class="delete_show">
                                            <button class="btn btn-xs btn-danger">
                                                <i class="ace-icon fa fa-trash bigger-110"></i>Hapus
                                            </button>
                                        </a>    
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Judul Sub Materi: </div>
                                    <div class="profile-info-value"><span>{{ucfirst($ctval->pcTitle)}}</span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tipe Sub Materi: </div>
                                    <div class="profile-info-value"><span>{{ucfirst($ctval->pcContentType)}}</span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Waktu: </div>
                                    <div class="profile-info-value"><span>{{$ctval->pcDuration}}</span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name" style="vertical-align:top"> Isi {{ucfirst($ctval->pcContentType)}}: </div>
                                    <div class="profile-info-value"><span>
                                        @if($ctval->pcContentType =='document')
                                            <object data="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}" type="application/pdf" width="100%" height="400">
                                                <a href="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}">{{$ctval->pcContentType}}</a>
                                            </object>
                                        @endif
                                        @if($ctval->pcContentType =='video')
                                            <video width="100%" style="aspect-ratio: 16 / 9" controls>
                                                <source src="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcVideo)}}" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                            </video>
                                        @endif
                                        @if($ctval->pcContentType =='text')
                                            {!!$ctval->pcText!!}
                                        @endif
                                    </span></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- END ACORDION -->

                
            </div>
        </div>
    </div>
</div>
<a href="{{route('pengetahuan.index')}}" class="btn btn-secondary">Back to Index</a>
@endsection