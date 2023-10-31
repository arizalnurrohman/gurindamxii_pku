@extends('front::layouts.master')

@section('content')
<main id="main">
    <style>
        a {
            color: #851a8b;
        }
        a:hover{
            color:#5e1362
        }
    </style>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Hubungi Admin</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <h2 style="font-weight:bold">Hubungi Admin</h2>
            </div>
            <?php /*<div style="display:block; float:left;width:100%;">
                <span style="font-size:16px;">CAT NAME</span>
            </div> 
            <div style="display:block; float:left;width:100%;font-size:11px;">
                TIME_POST WIB
            </div>*/ ?>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="padding:0px">
        <div class="container" style="text-align:justify">
            <div class="row gy-4">
            <?php 
                /*DIBUANG<div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div>*/ ?>
                <div class="col-lg-12">
                    <?php /*
                    <pre style="height:200px">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <div class="widget-box transparent" id="recent-box">
                        <?php
                        /*
                        item-orange
                        item-red
                        item-default
                        item-blue
                        item-grey
                        item-green
                        item-pink
                        */ ?>
                        @php
                            $rndm_color=array("item-orange","item-red","item-default","item-blue","item-grey","item-green","item-pink");
                        @endphp
                        <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                            <div class="widget-header">
                                <i class="ace-icon fa fa-comments-o"></i>
                                <h5 class="widget-title smaller">Riwayat Percakapan dengan Admin</h5>

                                <div class="widget-toolbar">
                                    <span class="badge badge-danger" style="border-radius:0px;">
                                        <a <?php /*href="{{route('hubungi_admin.create')}}"*/ ?> href="{{url('front/hubungi_admin/create/')}}" style="color:white">
                                            <i class="ace-icon fa fa-plus"></i> Topik
                                        </a>    
                                        <?php /*
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace">
                                            <span class="lbl">&nbsp;Semua</span>
                                        </label> */ ?>
                                    </span>
                                </div>
                            </div>
                            <div class="widget-body">
                            <style>
                                .blink {
                                    animation: blinker 1.5s linear infinite;
                                    color: red;
                                    font-family: sans-serif;
                                    font-weight:bold;
                                }
                                @keyframes blinker {
                                    50% {
                                        opacity: 0;
                                    }
                                }
                            </style>
                                <ul id="tasks" class="item-list ui-sortable">
                                    @if(count($data['data']) > 0)
                                        @foreach($data['data'] as $makey=>$maval)
                                            @php
                                                $random_picked=array_rand($rndm_color,1);
                                                $comments = Modules\Front\Http\Controllers\HubungiAdminController::count_comments($maval->haId);
                                            @endphp
                                            <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                                <label class="inline" style="width:100%">
                                                    <?php /*<input type="checkbox" class="ace"> */ ?>
                                                    <span class="lbl"> 
                                                        
                                                        <span style="font-size:16px;font-weight:bold;color:#851a8b">
                                                            No Ticket: 
                                                            <a href="{{url('/front/hubungi_admin/'.$maval->haPermalink)}}" style="font-size:16px;font-weight:bold;color#87B6D2">{{$maval->haTicket}}</a> 
                                                                <?php if($maval->haSession==='open'){?> <span class="label label-lg label-warning arrowed">Open</span> 
                                                                <?php  }else{?> 
                                                                <span class="label label-lg label-danger arrowed">Session Closed</span> 
                                                                <?php } ?>  
                                                        </span>
                                                        <br>
                                                        <a style="font-weight:bold;font-size:14px;">{{$maval->haTitle}}</a>
                                                        <?php /*<pre>{{print_r($comments)}}</pre> */ ?>
                                                        <?php /*if($x==0){?> <span class="label label-lg label-warning arrowed">Open</span> <?php  }else{?> <span class="label label-lg label-danger arrowed">Session Closed</span> <?php }*/ ?>    
                                                        <br>
                                                        <em><strong>Topik Dibuat pada</strong> {{date('d M Y H:i:s',strtotime($maval->created_at))}} WIB</em>
                                                        
                                                        <div style="text-align:right;margin-top:20px;">
                                                            <?php /*<i class="ace-icon fa fa-paperclip" style="color:#609FC4"></i>    
                                                            &nbsp; */ ?>
                                                            <i class="ace-icon fa fa-comments-o" style="color:#609FC4"></i> 
                                                            {{$comments['COUNT']}}
                                                            @if($comments['UNREAD']>0)
                                                                <span class="blink">NEW</span>
                                                            @endif
                                                            &nbsp;&nbsp;&nbsp;
                                                        <?php /*    
                                                        </div>
                                                        <div style="text-align:right; "> */ ?>
                                                        
                                                        @if(isset($comments['LAST']))
                                                            <i class="ace-icon fa fa-clock-o" style="color:#0b7bbc"></i>&nbsp;<em style="font-size:11px;">{{(isset($comments['LAST'])? $comments['LAST']->created_at : '-')}} WIB</em>
                                                        @endif
                                                        </div>
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    @else
                                        <div style="text-align:center; padding:30px; width:100%"> Data belum ada </div>
                                    @endif
                                </ul>
                                <div class="space-4"></div>
                            
                                <div class="hr hr-double hr8"></div>
                                        
                            </div><!-- /.widget-body -->
                        </div>
                    </div>
                </div>
            </div>   
            
        </div>
    </section>

</main><!-- End #main -->
@endsection