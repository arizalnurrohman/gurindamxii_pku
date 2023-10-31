@extends('ipanel::layouts.master')

@section('content')
<?php /* <h3>{{$categori_pembelajaran->catPermalink}}</h3>
<p>Writen By : {{$categori_pembelajaran->catPermalink}}</p>
<p>Number of Page : {{$categori_pembelajaran->catPermalink}}</p>
<p>Publisher On : {{$categori_pembelajaran->catPermalink}}</p>

<pre style="height:400px;">
<?php print_r($data) ?>
</pre>*/ ?>



<div class="widget-box">

    <div class="widget-header">
        <h5 class="widget-title smaller">
            Hubungi Admin »<small>{{$data['data']->haTitle}}</small>
        </h5>

        <div class="widget-toolbar">
            <a href="">
                <span class="label label-warning">
                    <i class="ace-icon fa fa-power-off"></i>
                        Tutup Sesi Percakapan
                    <i class="ace-icon fa fa-close"></i>
                </span>
            </a>    
        </div>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <div class="profile-user-info profile-user-info-striped" style="margin-bottom:20px;">
                <div class="profile-info-row">
                    <div class="profile-info-name"> No Tiket: </div>
                    <div class="profile-info-value"><span style="font-weight:bold">{{$data['data']->haTicket}}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Judul Tiket: </div>
                    <div class="profile-info-value"><span>{{$data['data']->haTitle}}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Keterangan: </div>
                    <div class="profile-info-value"><span>{!!$data['data']->haContent!!}</span></div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name" style="vertical-align:top"> Waktu Posting: </div>
                    <div class="profile-info-value"><span>{{date("d M Y H:i:s",strtotime($data['data']->created_at))}} WIB</span></div>
                </div>
                
                <hr>
            </div>
            <?php /*
            <h3 class="header smaller lighter green">
                <i class="ace-icon fa fa-comments"></i>
                Riwayat Percakapan
            </h3>
            <div class="profile-user-info profile-user-info-striped" style="margin-bottom:20px;border:0px !important;">
                
            </div> */ ?>
        </div>
    </div>
    
</div>

<!-- START -->
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
                <i class="ace-icon fa fa-comment blue" aria-hidden="true"></i>
                Balasan
            </h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <div class="dialogs">
                    @foreach($data['data']->chat as $cokey=>$coval)
                        @if($coval->id_user == $data['data']->id_user)
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

                    <?php /*
                    <div class="itemdiv dialogdiv">
                        <div class="user">
                            <img alt="Alexa's Avatar" src="https://bkpsdm.pelalawankab.go.id//assets/themes/cms/images/avatars/avatar4.png">
                        </div>

                        <div class="body">
                            <div class="time">
                                <i class="ace-icon fa fa-clock-o" aria-hidden="true"></i>
                                <span class="green">29 Sep 2023 09:36:50 WIB</span>
                            </div>

                            <div class="name">
                                <a href="#">Admin Role</a>
                            </div>
                            <div class="text">
                                <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ips <br></p>
                            </div>
                        </div>
                    </div>
                    <div class="itemdiv dialogdiv rightc">
                        <div class="body">
                            <div class="time">        
                                <a href="#" style="font-size:14px; font-weight:600">Alesha Farzana Rohman</a>    
                            </div>    
                            <div class="name">        
                                <i class="ace-icon fa fa-clock-o" aria-hidden="true"></i>        
                                <span class="green" style="font-size:11px;font-weight:bold">04 Oct 2023 13:59:27 WIB</span>    
                            </div>    
                            <div class="text" style="text-align:right">        
                                <em>Highlight </em>
                                Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023 
                                <em>Highlight </em>Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023 <em>Highlight </em>
                                Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023 <em>Highlight </em>
                                Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023 <em>Highlight </em>
                                Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023     
                            </div>
                        </div>
                        <div class="user right">    
                            <img alt="Alexas Avatar" src="https://bkpsdm.pelalawankab.go.id/assets/themes/cms/images/avatars/avatar5.png">
                        </div>
                    </div>
                    */ ?>
                </div>
            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
    </div>

    @if($data['data']->haSession==="open")
    <form action="{{route('hubungi_admins.reply_comments',$data['data']->haPermalink)}}" method="post" id="balasan" style="border:1px solid #ccc;"> 
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
                    <button class="btn btn-sm btn-warning no-radius" style="margin-right:5px;" type="button" OnClick="window.location.href='{{url('/ipanel/'.request()->segment(2))}}'">
                        <i class="ace-icon fa fa-reply"></i> kembali                                                  
                    </button>

                    <button class="btn btn-sm btn-info no-radius btn-submit" type="submit">
                        <i class="ace-icon fa fa-send"></i> Kirim Balasan                                                   
                    </button>
                </span>
            </div>
        </div>
    </form>
    @endif
    <!-- END -->
@endsection