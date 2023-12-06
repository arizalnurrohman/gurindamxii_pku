@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Member
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
                <th>Member</th>
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
                    <i class="fa fa-male bigger-120"></i>: <strong>{{$daval->name}}</strong><br>
                    <i class="fa fa-at bigger-120"></i>: <strong>{{$daval->email}}</strong><br>
                    <i class="fa fa-clock-o bigger-120"></i>: <em style="font-size:12px;">
                        <strong>
                            {{date("d M Y H:i:s",strtotime($daval->created_at))}} WIB
                        </strong></em><br>
                </td>
                <td>
                    @if($daval->verified=='y')
                        <i class="fa fa-check bigger-120"></i>
                    @else
                        <i class="fa fa-clock-o bigger-120"></i>
                    @endif
                </td>
                <td>
                    <div class=" btn-group">
                        <a href="{{route('member.destroy',$daval->id)}}" title="Edit Pengetahuan" class="deletes">
                            <button class="btn btn-mini btn-danger">
                            <i class="fa fa-check bigger-120"></i>
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
