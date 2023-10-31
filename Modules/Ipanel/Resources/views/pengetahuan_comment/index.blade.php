@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Pengetahuan - Komentar
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    <?php /*
    <pre style="height:200px">
        <?php print_r($data_comment) ?>
    </pre> */ ?>
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
                <th>Judul Materi<br>Komentar</th>
                <th style="width:40px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data_comment['data'] as $catkey=>$catpem)
            <tr>
                <td class="center">{{($data_comment['data']->currentPage() - 1) * $data_comment['data']->perPage() + $loop->iteration}}</td>
                <td>
                    <a href="{{url('/front/materi/'.$catpem->pgPermalink.'#'.$catpem->cmPermalink)}}" target="_blank" style="font-weight:bold">{{$catpem->pgTitle}}</a><br>
                    <table style="width:100%">
                        <tr>
                            <td width="30"><i class="fa fa-user bigger-120"></i></td>
                            <td style="font-weight:bold">{{$catpem->name}}</td>
                        </tr>
                        <tr>
                            <td width="30"><i class="fa fa-commenting-o bigger-120"></i></td>
                            <td>{!!str_replace("</p>","",str_replace("<p>","",$catpem->cmComment))!!}</td>
                        </tr>
                        <tr>
                            <td width="30"><i class="fa fa-calendar bigger-120"></i></td>
                            <td><em style="font-size:11px;">{{date("d M Y H:i:s",strtotime($catpem->cmAddedDate))}} WIB</em></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <button class="btn btn-mini btn-danger" onclick='window.location.href="{{route('pengetahuan_comments.edit',$catpem->cmPermalink)}}"'><?php /*"{{route('pengetahuan_category.edit',data_category->catPermalink)}}'*/ ?>
                        <i class="fa fa-thumbs-o-down bigger-120"></i>
                    </button>
                    <?php /*
                    <form method="POST" class="delete-form" data-route="{{route('pengetahuan_comments.destroy',$catpem->cmPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                    </form> */ ?>

                </td>
            </tr>
            <?php
            #} ?>
            @endforeach
        </tbody>
    </table>
    {{$data_comment['data']->links()}}
@endsection
