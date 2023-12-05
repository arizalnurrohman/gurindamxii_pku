@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Materi Highlight
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    <!-- <pre style="height:200px">
        <?php #print_r($data_category) ?>
    </pre> -->
    <div style="text-align:left; margin-bottom:20px;">
        <a href="{{route('pengetahuan_highlight.create')}}" class="btn btn-primary">Tambah Materi Highlight</a>
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
                <th>Nama Materi</th>
                <th style="width:30px;">Jumlah</th>
                <th style="width:30px;"><i class="fa fa-eye bigger-120"></i></th>
                <th style="width:80px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data['data'] as $catkey=>$catpem)
            <tr>
                <td class="center">{{($data['data']->currentPage() - 1) * $data['data']->perPage() + $loop->iteration}}</td>
                <td>
                    <a href="#" style="font-weight:bold">{{$catpem->pgTitle}}</a><br>
                    <em>{!!$catpem->pgDescription!!}</em><br>
                    <em style="font-weight:bold">{{date("d M Y",strtotime($catpem->hlStart))}} s/d {{date("d M Y",strtotime($catpem->hlEnd))}}</em><br>
                </td>
                <td>{{($catpem->pgViewed)}}</td>
                <td>
                    @if($catpem->hlStatus == 'y')
                        <i class="fa fa-check bigger-120"></i>
                    @else
                        <i class="fa fa-close bigger-120"></i>
                    @endif
                </td>
                <td>
                    <button class="btn btn-mini btn-info" onclick='window.location.href="{{route('pengetahuan_highlight.edit',$catpem->hlPermalink)}}"'><?php /*"{{route('pengetahuan_highlight.edit',data_category->catPermalink)}}'*/ ?>
                        <i class="fa fa-pencil bigger-120"></i>
                    </button>
                    <?php /*
                    <form action="{{route('pengetahuan_highlight.destroy',$catpem->catPermalink)}}" class="deletes" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                    </form>*/?>
                    <?php /*
                    <a href="{{route('pengetahuan_highlight.destroy',$catpem->catPermalink)}}" title="Data Pengetahuan Kategori" class="deletes">
                        <button class="btn btn-mini btn-danger">
                        <i class="fa fa-trash bigger-120"></i>
                        </button>
                    </a>
                    */ ?>
                    <form method="POST" class="delete-form" data-route="{{route('pengetahuan_highlight.destroy',$catpem->hlPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
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
    {{$data['data']->links()}}
@endsection
