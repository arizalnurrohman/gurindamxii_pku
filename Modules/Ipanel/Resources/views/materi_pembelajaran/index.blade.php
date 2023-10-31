@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Materi Pembelajaran
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    <!-- <pre style="height:200px">
        <?php #print_r($materi_pembelajaran) ?>
    </pre> -->
    <div style="text-align:left; margin-bottom:20px;">
        <a href="{{route('mpembelajaran.create')}}" class="btn btn-primary">Tambah Materi Pembelajaran</a>
    </div>
    <div class="widget-box">
        <div class="widget-header widget-header-small">
            <h5 class="widget-title lighter">Search Form</h5>
        </div>
    
        <div class="widget-body">
            <div class="widget-main">
                <form class="form-search" action="<?php #print baseurl()."ipanel/".$this->uri->segment(2)."/" ?>" method="get">
                    <div class="row">
                        
                        <div class="box col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-check"></i>
                                </span>
    
                                <input type="text" class="form-control search-query" placeholder="Ketik Pencarian" name="search" value="<?php print isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-purple btn-sm">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        Search
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="center" style="width:35px;">#</th>
                <th style="width:80px">Kategori<br>Pembelajaran</th>
                <th>Judul Materi</th>
                <th style="width:30px;">Data<br>Materi</th>
                <th style="width:80px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($materi_pembelajaran as $pemkey=>$pemval)
            <tr>
                <td class="center">{{($pemkey+1)}}</td>
                <td>
                    @if($pemval->pmImage)   
                        <a href="{{url('/assets/documents/materi_pembelajaran/').'/'.$pemval->pmImage}}" rel="facebox">    
                            <img src="{{url('/assets/documents/materi_pembelajaran/').'/'.$pemval->pmImage}}" width="75">
                        </a>
                    @endif
                </td>
                <td>
                    <a href="#">{{$pemval->pmTitle}}</a><br>
                    <em>{!! $pemval->pmDescription !!}</em><br>
                </td>
                <td>
                    <button class="btn btn-mini btn-warning" onclick='window.location.href="{{route('mpembelajaran.show',$pemval->pmPermalink)}}"'>
                        <i class="fa fa-list bigger-120"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-mini btn-info" onclick='window.location.href="{{route('mpembelajaran.edit',$pemval->pmPermalink)}}"'>
                        <i class="fa fa-pencil bigger-120"></i>
                    </button>
                    <?php /*
                    <form action="{{route('mpembelajaran.destroy',$pemval->pmPermalink)}}" class="deletes" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                    </form>*/?>
                    <?php /*
                    <a href="{{route('mpembelajaran.destroy',$pemval->pmPermalink)}}" title="Data kategori Pembelajaran" class="deletes">
                        <button class="btn btn-mini btn-danger">
                        <i class="fa fa-trash bigger-120"></i>
                        </button>
                    </a>
                    */ ?>
                    <form method="POST" class="delete-form" data-route="{{route('mpembelajaran.destroy',$pemval->pmPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
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
    <?php /*{{$materi_pembelajaran->links()}} */ ?>
@endsection
