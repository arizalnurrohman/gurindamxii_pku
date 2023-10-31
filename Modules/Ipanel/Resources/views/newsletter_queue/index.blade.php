@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>News Letter Queue
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
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
                <th>Email</th>
                <th style="width:20px;"><i class="fa fa-eye bigger-120"></i></th>
                <th style="width:40px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data['data'] as $dakey=>$daval)
            <tr>
                <td class="center">{{($data['data']->currentPage() - 1) * $data['data']->perPage() + $loop->iteration}}</td>
                <td>
                    <i class="fa fa-at bigger-120"></i>: <strong>{{$daval->nqEmail}}</strong><br>
                    <i class="fa fa-send bigger-120"></i>: <em style="font-size:12px;">
                        <strong>
                            @if($daval->nqSent) 
                                {{date("d M Y H:i:s",strtotime($daval->nqSent))." WIB"}}
                            @else
                                -
                            @endif    
                        </strong></em><br>
                    <i class="fa fa-newspaper-o bigger-120"></i>: <em><a href="{{$daval->newsURL}}" target="_blank">{{$daval->newsTitle}}</a></em><br>
                </td>
                <td>
                    @if($daval->nqSent != '0000-00-00 00:00:00')
                        <i class="fa fa-send bigger-120"></i>
                    @else
                        <i class="fa fa-clock-o bigger-120"></i>
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <a rel="facebox" href="{{route('newsletter_queue.show',$daval->nqPermalink)}}" title="Edit Pengetahuan">
                            <button class="btn btn-mini btn-warning">
                            <i class="fa fa-list bigger-120"></i>
                            </button>
                        </a>

                    </div>
                </td>
            </tr>
            <?php
            #} ?>
            @endforeach
        </tbody>
    </table>
    {{$data['data']->links()}}
@endsection
