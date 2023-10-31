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
                    <li><a href="{{url('/front/hubungi_admin/')}}">Hubungi Admin</a></li>
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
                        <?php print_r($data) ?>
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
                                <div style="width:90%; float:left;padding:7px;">
                                    <h5 class="widget-title smaller" style="font-weight:bold;font-size:15px;">
                                        No Ticket: {{$data['data']->haTicket}}</h5>
                                </div>
                                <div class="widget-toolbar">
                                    <i class="ace-icon fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="widget-body">
                                <ul id="tasks" class="item-list ui-sortable">
                                    
                                    @php
                                        $random_picked=array_rand($rndm_color,1);
                                    @endphp
                                    <li class="{{$rndm_color[$random_picked]}} clearfix ui-sortable-handle">
                                        <label class="inline" style="width:100%">
                                            <?php /*<input type="checkbox" class="ace"> */ ?>
                                            <span class="lbl"> 
                                                <h3 style="font-weight:bold">{{$data['data']->haTitle}}</h3>
                                                <em><strong>Topik Dibuat pada</strong> 11-11-2022 12:12:12 WIB</em><br>
                                                <p style="font-size:14px;">{!!$data['data']->haContent!!}</p>
                                                <br>
                                            </span>
                                        </label>
                                    </li>
                                    
                                </ul>
                                <div class="space-4"></div>
                            
                                <div class="hr hr-double hr8"></div>
                                        
                            </div><!-- /.widget-body -->
                        </div>    
                    </div>

                    <?php #-- ------------------------------------------------------------------ - -- - - -- - -  ?>
                    <style type="text/css">
                        .itemdiv > .body {
                            margin-right:50px !important;	
                        }
                        .right{
                            right:0 !important;	
                            left:auto !important;
                            top:0 !important
                        }
                        /*.itemdiv.dialogdiv:before{
                            content:close-quote !important;
                            position:fixed !important;	
                        }*/
                        .itemdiv.dialogdiv > .body::before{
                            border:none;
                        }
                        .itemdiv.dialogdiv::before{
                            content:close-quote	
                        }
                        .card{
                            border-radius:0px !important;
                        }
                    </style>
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title lighter smaller">
                                <i class="ace-icon fa fa-comment blue"></i>
                                Balasan
                            </h4>
                        </div>
                
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="dialogs">
                                    @foreach($data['data_com'] as $cokey=>$coval)
                                        @if($coval->id_user !== $data['data']->id_user)
                                            <div class="itemdiv dialogdiv">
                                                <div class="user">
                                                    <img alt="Alexa's Avatar" src="https://bkpsdm.pelalawankab.go.id//assets/themes/cms/images/avatars/avatar4.png">
                                                </div>
                        
                                                <div class="body">
                                                    <div class="time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">{{date('d M Y H:i:s',strtotime($coval->created_at))}} WIB</span>
                                                    </div>
                        
                                                    <div class="name">
                                                        <a href="#">{{$coval->name}}</a>
                                                    </div>
                                                    <div class="text">
                                                        {!!$coval->haContent!!}
                                                    </div>
                                                    <?php /*
                                                    <div class="tools">
                                                        <a href="#" class="btn btn-minier btn-info">
                                                            <i class="icon-only ace-icon fa fa-share"></i>
                                                        </a>
                                                    </div> */ ?>
                                                </div>
                                            </div>
                                        @else
                                            <div class="itemdiv dialogdiv rightc">
                                                <div class="body">
                                                    <div class="time">
                                                        <a href="#" style="font-size:14px; font-weight:600">{{$coval->name}}</a>
                                                    </div>
                            
                                                    <div class="name">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green" style="font-size:11px;font-weight:bold">{{date('d M Y H:i:s',strtotime($coval->created_at))}} WIB</span>
                                                    </div>
                                                    <div class="text" style="text-align:right">
                                                        {!!$coval->haContent!!} 
                                                    </div>
                                                </div>
                                                <div class="user right">
                                                    <img alt="Alexa's Avatar" src="https://bkpsdm.pelalawankab.go.id/assets/themes/cms/images/avatars/avatar5.png">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div>
                    <?php #-- END  ------------------------------------------------------------------ - -- - - -- - -  ?>
                    @if($data['data']->haSession==="open")
                    <form action="{{route('hubungi_admin.post_comments',$data['data']->haPermalink)}}" method="post" id="balasan" style="border:1px solid #ccc;"> 
                        @csrf
                        <div class="form-actions" style="margin-top:0px !important">
                            <div class="row">
                                <textarea name="hapesan" id="" cols="auto" rows="10" class="summernote"></textarea>
                            </div>
                            <?php /*
                            <div class="row" style="text-align:right !important; padding-top:10px;">
                                {!! htmlFormSnippet() !!} 
                            </div>   */ ?> 
                            <div class="row" style="text-align:right; margin-top:10px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-warning no-radius btn-submit" type="button" OnClick="window.location.href='{{url('/front/'.request()->segment(2))}}'">
                                        <i class="ace-icon fa fa-reply"></i> kembali                                                  
                                    </button>

                                    <button class="btn btn-sm btn-info no-radius btn-submit" type="submit">
                                        <i class="ace-icon fa fa-send"></i> Kirim Balasan                                                   
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="form-actions" style="margin-top:0px !important">
                            <div class="row" style="text-align:right; margin-top:10px;">
                                <span class="input-group-btn">
                                    <button class="btn btn-sm btn-warning no-radius btn-submit" type="button" OnClick="window.location.href='{{url('/front/'.request()->segment(2))}}'">
                                        <i class="ace-icon fa fa-reply"></i> kembali                                                  
                                    </button>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>   
            
        </div>
    </section>

</main><!-- End #main -->
@endsection