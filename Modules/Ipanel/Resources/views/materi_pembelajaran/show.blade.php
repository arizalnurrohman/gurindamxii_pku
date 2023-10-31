@extends('ipanel::layouts.master')

@section('content')
<?php /* <h3>{{$categori_pembelajaran->catPermalink}}</h3>
<p>Writen By : {{$categori_pembelajaran->catPermalink}}</p>
<p>Number of Page : {{$categori_pembelajaran->catPermalink}}</p>
<p>Publisher On : {{$categori_pembelajaran->catPermalink}}</p>
*/ ?>
<div class="page-header">
        <h1>Materi Pembelajaran -> Detail
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption <strong>{{ Request::segment(2) }}</strong>
            </small>
        </h1>
    </div>
<pre style="height:200px">
    <?php print_r($data);?>
</pre>
<div class="profile-user-info profile-user-info-striped" style="margin-bottom:20px;">
    <div class="profile-info-row">
        <div class="profile-info-name"> Kategori Materi: </div>
        <div class="profile-info-value"><span>{{$data['data']->catName}}</span></div>
    </div>
    <div class="profile-info-row">
        <div class="profile-info-name"> Judul Materi: </div>
        <div class="profile-info-value"><span>{{$data['data']->pmTitle}}</span></div>
    </div>
    <div class="profile-info-row">
        <div class="profile-info-name"> Keterangan: </div>
        <div class="profile-info-value"><span>{!!$data['data']->pmDescription!!}</span></div>
    </div>
    <div class="profile-info-row">
        <div class="profile-info-name"> Estimasi Waktu: </div>
        <div class="profile-info-value"><span>{{$data['data']->pmEstimation}} Menit</span></div>
    </div>
</div>
<div style="text-align:right; margin-bottom:20px;">
    <a href="{{route('mpembelajaran.create_submateri',$data['data']->pmPermalink)}}" class="btn btn-warning">Tambah Materi Pembelajaran</a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="center" style="width:35px;">#</th>
            <th>Sub Materi</th>
            <th style="width:30px;">Data<br>Materi</th>
            <th style="width:80px">&nbsp</th>
        </tr>
    </thead>
    
    <tbody>
        <?php 
        #for($x=1;$x<5;$x++){?>
        @foreach($data['datadt'] as $dtkey=>$dtval)
        <tr>
            <td class="center">{{($dtkey+1)}}</td>
            <?php /*
            <td>
                
                @if($pemval->pmImage)   
                    <a href="{{url('/assets/documents/materi_pembelajaran/').'/'.$pemval->pmImage}}" rel="facebox">    
                        <img src="{{url('/assets/documents/materi_pembelajaran/').'/'.$pemval->pmImage}}" width="75">
                    </a>
                @endif 
            </td>*/ ?>
            <td>
                <a href="#">{{$dtval->pdTitle}}</a><br>
                <em>{!! $dtval->pdDescription !!}</em><br>
            </td>
            <td>
                <?php /*
                <button class="btn btn-mini btn-warning" onclick='window.location.href="{{route('mpembelajaran.show',$pemval->pmPermalink)}}"'>
                    <i class="fa fa-list bigger-120"></i>
                </button> */ ?>
            </td>
            <td>
                <button class="btn btn-mini btn-info" onclick='window.location.href="{{route('mpembelajaran.edit_submateri',$dtval->pdPermalink)}}"'>
                    <i class="fa fa-pencil bigger-120"></i>
                </button>
                <form method="POST" class="delete-form" data-route="{{route('mpembelajaran.destroy_submateri',$dtval->pdPermalink )}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                </form>

            </td>
        </tr>
        <?php
        #} ?>
        @endforeach
    </tbody>
</table>
<a href="<?php #{{route('categori_pembelajaran.index')}} ?>" class="btn btn-secondary">Back to Index</a>
@endsection