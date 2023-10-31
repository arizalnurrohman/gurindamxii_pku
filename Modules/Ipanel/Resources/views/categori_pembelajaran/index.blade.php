@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Kategori Pembelajaran
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    <!-- <pre style="height:200px">
        <?php #print_r($categori_pembelajaran) ?>
    </pre> -->
    <div style="text-align:left; margin-bottom:20px;">
        <a href="{{route('categoripembelajaran.create')}}" class="btn btn-primary">Tambah Kategori Pembelajaran</a>
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
                <th style="width:80px">Gambar</th>
                <th>Nama Kategori</th>
                <th style="width:30px;">Jumlah</th>
                <th style="width:80px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($categori_pembelajaran as $catkey=>$catpem)
            <tr>
                <td class="center">{{($catkey+1)}}</td>
                <td>
                    @if($catpem->catImage)   
                        <a href="{{url('/assets/documents/kategori_pembelajaran/').'/'.$catpem->catImage}}" rel="facebox">    
                            <img src="{{url('/assets/documents/kategori_pembelajaran/').'/'.$catpem->catImage}}" width="75">
                        </a>
                    @endif
                </td>
                <td>
                    <a href="#">{{$catpem->catName}}</a><br>
                    <em>{!!$catpem->catDescription!!}</em><br>
                </td>
                <td>{{($catkey+100)}}</td>
                <td>
                    <button class="btn btn-mini btn-info" onclick='window.location.href="{{route('categoripembelajaran.edit',$catpem->catPermalink)}}"'><?php /*"{{route('categoripembelajaran.edit',categori_pembelajaran->catPermalink)}}'*/ ?>
                        <i class="fa fa-pencil bigger-120"></i>
                    </button>
                    <?php /*
                    <form action="{{route('categoripembelajaran.destroy',$catpem->catPermalink)}}" class="deletes" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                    </form>*/?>
                    <?php /*
                    <a href="{{route('categoripembelajaran.destroy',$catpem->catPermalink)}}" title="Data kategori Pembelajaran" class="deletes">
                        <button class="btn btn-mini btn-danger">
                        <i class="fa fa-trash bigger-120"></i>
                        </button>
                    </a>
                    */ ?>
                    <form method="POST" class="delete-form" data-route="{{route('categoripembelajaran.destroy',$catpem->catPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
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
    {{$categori_pembelajaran->links()}}
@endsection
