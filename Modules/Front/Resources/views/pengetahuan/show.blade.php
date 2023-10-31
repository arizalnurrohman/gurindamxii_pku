@extends('front::layouts.master')

@section('content')
<main id="main">
    <style>
        .post-content{
        background: #f8f8f8;
        border-radius: 4px;
        width: 100%;
        border: 1px solid #f1f2f2;
        overflow: hidden;
        position: relative;
        }

        .post-content img.post-image, video.post-video, .google-maps{
        width: 100%;
        height: auto;
        }

        .post-content .google-maps .map{
        height: 300px;
        }

        .post-content .post-container{
        padding: 20px;
        }

        .post-content .post-container .post-detail{
        margin-left: 65px;
        position: relative;
        margin-top:-50px;
        }

        .post-content .post-container .post-detail .post-text{
        line-height: 24px;
        margin: 0;
        }

        .post-content .post-container .post-detail .reaction{
        position: absolute;
        right: 0;
        top: 0;
        }

        .post-content .post-container .post-detail .post-comment{
        display: inline-flex;
        margin: 10px auto;
        width: 100%;
        }

        .post-content .post-container .post-detail .post-comment img.profile-photo-sm{
        margin-right: 10px;
        }

        .post-content .post-container .post-detail .post-comment .form-control{
        height: 30px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        margin: 7px 0;
        min-width: 0;
        }

        img.profile-photo-md {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        img.profile-photo-sm {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        .text-green {
            color: #8dc63f;
        }

        .text-red {
            color: #ef4136;
        }

        .following {
            color: #8dc63f;
            font-size: 12px;
            margin-left: 20px;
        }
        .text-muted{
            font-size:12px;
        }

        /* FORM COMMENTS */
        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;
            border-color:#ccc;
        }
        a {
            color: #851a8b;
        }
        a:hover{
            color:#5e1362
        }
    </style>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" <?php if(isset($_GET['display'])){ print ' style="display:none"'; } ?>>
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a href="{{url('/front/materi/')}}">Materi</a></li>
                    <li>{{$data['data']->pgTitle}}</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page p-0">
        <div class="container p-4" style="text-align:justify; ">
        <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify;">
                <h2 style="font-weight:bold">{{$data['data']->pgTitle}}</h2>
            </div>
            <div style="display:block; float:left;width:100%;">
                <span class="label label-xlg label-danger arrowed">&nbsp; {{$data['data']->pgType}} &nbsp;</span>
                <span style="font-size:16px;">{{$data['data']->catName}}</span>
            </div>
            <div style="display:block; float:left;width:100%;font-size:11px;">
                <div style="float:left">
                    {{date("d M Y H:i:s",strtotime($data['data']->pgTimePost))}} WIB
                </div>
                <div style="float:right; padding-bottom:20px;" class="social">
                    <style type="text/css">
                        .social a{
                            margin: 0 3px;
                            border-radius: 4px;
                            min-width: 36px;
                            height: 36px;
                            background: rgba(255, 255, 255, 0.8);
                            transition: ease-in-out 0.3s;
                            color: #484848;
                            display: inline-flex;
                            justify-content: center;
                            align-items: center;
                            font-size:18px;
                            border:1px solid #C78400;
                            padding:0px 5px 0px 5px;
                        }
                        .social a:hover{
                            cursor:pointer;
                            background-color:#FEB652;
                        }
                        a.btn_dtl{
                            color:#C78400;
                        }
                        a.btn_dtl:hover{
                            color:#7d6026;
                        }
                    </style>
                    
                    <a class="btn_dtl" title="Tambahkan ke Daftar Baca" onClick="addItemToCart('{{$data['data']->pgPermalink}}','read_later')"><i class="fa-solid fa-list"></i> &nbsp;Baca Nanti</a>
                    <?php /*<a style="<?php #{{$pgval->pnId ? 'background:red; color:white' : ''}} ?>" class="btn_dtl done_already" title="Tandai Materi ini" onClick="addItemToCart('{{$data['data']->pgPermalink}}','pin')"><i class="fa-solid fa-thumbtack"></i></a>*/ ?>
                    <a style="<?php #{{$pgval->lkId ? 'background:red; color:white' : ''}} ?>" class="btn_dtl" title="Sukai Materi ini" onClick="addItemToCart('{{$data['data']->pgPermalink}}','like')""><i class="fa-solid fa-heart"></i> &nbsp;Sukai</a>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 d-flex align-items-stretch" style="margin-bottom:10px;  ">
                <span style="font-weight:bold; border-bottom:1px solid #ccc; width:100%"><?php /*Keterangan :*/ ?></span><br>
            </div>
            <div class="row"  style="letter-spacing:0.6px !important;font-size:16px !important;">
                <p>{!!$data['data']->pgDescription!!}</p>
            </div><br>

            <div class="line-divider" <?php #style="border:1px solid #ccc; margin-bottom:20px;" ?>></div>

            <div class="col-lg-12 col-md-12 d-flex align-items-stretch" style="margin-bottom:10px;  ">
                <span style="font-weight:bold; border-bottom:1px solid #ccc; width:100%">Materi :</span><br>
            </div>
            <?php ####################################################################################################?>
            <style type="text/css">
                .accordion {
                font-size: 1rem;
                width: 100%;
                margin: 0 auto;
                border-radius: 5px;
                }

                .accordion-header,
                .accordion-body {
                background: white;
                }

                .accordion-header {
                padding: 1.5em 1.5em;
                background: #151515;/*3F51B5*/
                color: white;
                cursor: pointer;
                font-size: .7em;
                letter-spacing: .1em;
                transition: all .3s;
                text-transform: uppercase;
                }

                .accordion__item {
                    border-bottom: 1px solid #e8a13e;
                }

                .accordion__item .accordion__item {
                border-bottom: 1px solid #e8a13e;
                }

                .accordion-header:hover {
                background: #FFB752;
                position: relative;
                z-index: 5;
                color:black;
                }

                .accordion-body {
                background: #fcfcfc;
                color: #353535;
                display: none;
                }

                .accordion-body__contents {
                /*padding: 1.5em 1.5em;*/
                font-size: .85em;
                }

                .accordion__item.active:last-child .accordion-header {
                border-radius: none;
                }

                .accordion:first-child > .accordion__item > .accordion-header {
                border-bottom: 1px solid transparent;
                }

                .accordion__item > .accordion-header:after {
                content: "\25BC";
                font-family: IonIcons;
                font-size: 1.2em;
                float: right;
                position: relative;
                top: -2px;
                transition: .3s all;
                transform: rotate(0deg);
                }

                .accordion__item.active > .accordion-header:after {
                transform: rotate(-180deg);
                }

                .accordion__item.active .accordion-header {
                background: #FEB652;
                color:black;
                }

                .accordion__item .accordion__item .accordion-header {
                background: #f1f1f1;
                color: #353535;
                }
                .title_check{
                    font-weight:bold; color:#FFB752
                }

                @media screen and (max-width: 1000px) {
                    body {
                        padding: 1em;
                    }
                    
                    .accordion {
                        width: 100%;
                    }
                }
            </style>
            <div class="accordion js-accordion">
                @foreach($data['data']->content as $ctid=>$ctval)
                    @php
                        $ctval->pcText=str_replace('<a href=','<a target="_blank" href=',$ctval->pcText);
                    @endphp
                    <div class="accordion__item js-accordion-item {{$ctid==0?'active':''}} ttl_{{$ctid}}">
                        <div class="accordion-header js-accordion-header">
                            @if($ctval->pcContentType =='document')
                                <i class="fa-solid fa-file-pdf"></i>
                            @elseif($ctval->pcContentType =='video')
                                <i class="fa-solid fa-video"></i>
                            @else
                                <i class="fa-solid fa-newspaper"></i>
                            @endif
                            &nbsp;
                            {{$ctval->pcTitle? $ctval->pcTitle : 'Konten'}} &nbsp;
                            @if($ctval->rcId)
                            <span class="title_check"><i class='fa-solid fa-check'></i>Selesai Dibaca</span>
                            @endif
                        </div> 
                        
                        <div class="accordion-body js-accordion-body">
                            <div class="accordion-body__contents">
                                @if($data['data']->pgType =='Private')
                                    @auth
                                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user')
                                            @if($ctval->pcContentType =='document')
                                                <object data="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}" type="application/pdf" width="100%" height="900">
                                                    <a href="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}">{{$ctval->pcContentType}}</a>
                                                </object>
                                            @endif
                                            @if($ctval->pcContentType =='video')
                                                <video width="100%" style="aspect-ratio: 16 / 9" controls>
                                                    <source src="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcVideo)}}" type="video/mp4">
                                                    <source src="movie.ogg" type="video/ogg">
                                                        Your browser does not support the video tag.
                                                </video>
                                            @endif
                                            @if($ctval->pcContentType =='text')
                                                {!!$ctval->pcText!!}
                                            @endif

                                            {{-- START : TOMBOL TANDAI SUDAH SELESAI --}}
                                            @php
                                            $already_finish = Modules\Front\Http\Controllers\MateriController::get_beread($ctval->pcPermalink);
                                            @endphp
                                            @if($already_finish===0)
                                            <div style="text-align:right !important; padding-bottom:10px;">
                                                <a href="{{route('materi.post_finish',$ctval->pcPermalink)}}" class="clicks click_{{$ctid}}" title="click_{{$ctid}}">
                                                    <button class="btn btn-xs btn-info" <?php /*OnClick="alert('hahha')" */ ?>>
                                                        <i class="ace-icon fa fa-bolt bigger-110"></i>
                                                            Tandai Selesai
                                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            @endif
                                            {{-- END : TOMBOL TANDAI SUDAH SELESAI --}}
                                        @endif
                                    @endauth
                                
                                    @guest
                                        {{-- START : NOTIFIKASI APABILA BELUM LOGIN --}}
                                        <div class="alert alert-danger" role="alert">
                                            Anda harus Login terlebih dahulu untuk membaca Materi Ini..
                                        </div>
                                        {{-- END : NOTIFIKASI APABILA BELUM LOGIN --}}
                                    @endguest
                                @else
                                    @if($ctval->pcContentType =='document')
                                        <object data="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}" type="application/pdf" width="100%" height="900">
                                            <a href="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcDocuments)}}">{{$ctval->pcContentType}}</a>
                                        </object>
                                    @endif
                                    @if($ctval->pcContentType =='video')
                                        <video width="100%" style="aspect-ratio: 16 / 9" controls>
                                            <source src="{{asset('storage/images/assets_pengetahuan/'.$ctval->pcVideo)}}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    @if($ctval->pcContentType =='text')
                                        {!!$ctval->pcText!!}
                                    @endif

                                    @auth
                                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user')
                                            {{-- START : TOMBOL TANDAI SUDAH SELESAI --}}
                                                @php
                                                $already_finish = Modules\Front\Http\Controllers\MateriController::get_beread($ctval->pcPermalink);
                                                @endphp
                                                
                                                @if($already_finish===0)
                                                <div style="text-align:right !important; padding-bottom:10px;">
                                                    <a href="{{route('materi.post_finish',$ctval->pcPermalink)}}" class="clicks click_{{$ctid}}" title="click_{{$ctid}}">
                                                        <button class="btn btn-xs btn-info" <?php /*OnClick="alert('hahha')" */ ?>>
                                                            <i class="ace-icon fa fa-bolt bigger-110"></i>
                                                                Tandai Selesai
                                                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                @endif
                                            {{-- END : TOMBOL TANDAI SUDAH SELESAI --}}
                                        @else
                                            
                                        @endif
                                    @endauth    
                                @endif
                            </div>
                        </div><!-- end of accordion body -->
                        
                    </div><!-- end of accordion item -->
                @endforeach
            </div><!-- end of accordion -->
                
            <?php ####################################################################################################?>
            <div class="row">
                <!-- STAR BUTTON -->
                <div class="col-lg-3 col-xs-12">
                    <style type="text/css">
                        *{
                            margin: 0;
                            padding: 0;
                        }
                        #rate {
                            float: left;
                            height: 46px;
                            padding: 0 10px;
                        }
                        #rate:not(:checked) > input {
                            position:absolute;
                            top:-9999px;
                        }
                        #rate:not(:checked) > label {
                            float:right;
                            width:1em;
                            overflow:hidden;
                            white-space:nowrap;
                            cursor:pointer;
                            font-size:30px;
                            color:#ccc;
                        }
                        #rate:not(:checked) > label:before {
                            content: '★ ';
                        }
                        #rate > input:checked ~ label {
                            color: #ffc700;    
                        }
                        #rate:not(:checked) > label:hover,
                        #rate:not(:checked) > label:hover ~ label {
                            color: #deb217;  
                        }
                        #rate > input:checked + label:hover,
                        #rate > input:checked + label:hover ~ label,
                        #rate > input:checked ~ label:hover,
                        #rate > input:checked ~ label:hover ~ label,
                        #rate > label:hover ~ input:checked ~ label {
                            color: #c59b08;
                        }

                        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */

                        
                    </style>
                    
                    <div class="rate" id="rate" style="display: table-cell;vertical-align: middle">
                        <span class="count_star">4.5(<i class="fa-solid fa-star" style="color:red;"></i>)</span>
                        <input type="radio" class="ratelist" id="star5" name="rate" value="5" onClick="addRating(this,'{{$data['data']->pgPermalink}}');"/>
                        <label for="star5" class="ratelist" title="5">5 stars</label>
                        <input type="radio" class="ratelist" id="star4" name="rate" value="4" onClick="addRating(this,'{{$data['data']->pgPermalink}}');"/>
                        <label for="star4" class="ratelist" title="4">4 stars</label>
                        <input type="radio" class="ratelist" id="star3" name="rate" value="3" onClick="addRating(this,'{{$data['data']->pgPermalink}}');"/>
                        <label for="star3" class="ratelist" title="3">3 stars</label>
                        <input type="radio" class="ratelist" id="star2" name="rate" value="2" onClick="addRating(this,'{{$data['data']->pgPermalink}}');"/>
                        <label for="star2" class="ratelist" title="2">2 stars</label>
                        <input type="radio" class="ratelist" id="star1" name="rate" value="1" onClick="addRating(this,'{{$data['data']->pgPermalink}}');"/>
                        <label for="star1" class="ratelist" title="1">1 star</label>
                        <a href="#" class="reratelist" style="display:none">Ulang beri Rate</a>

                    </div>
                </div>
                <!-- END STAR BUTTON-->
                <div class="col-lg-9 col-xs-12">
                    <!-- SHARE BUTTON-->
                    <style type="text/css">
                        /* asdas*/
                        .mn-social-bottom-c {margin: 10px /*calc(50vh - 23px) calc(50vw - 194px)*/}
                        .mn-social-bottom{
                                border:1px solid #D2D2D2;
                                background:#f5f5f5;
                                width:46px;
                                height:46px;
                                box-sizing:border-box;
                                padding:13px 0 0;
                                color:#ff822d;
                                border-radius:4px;
                                margin:0 2px 15px;
                                transition:all .3s;
                                font-size:19px;
                                display:inline-block;
                                text-align:center;
                                position:relative}
                        .mn-social-bottom:hover{background:#ff822d;color:#fff;top:-3px;cursor: pointer;}
                        #mn-social-bottom-hidden{display:none}
                        .fa-plus {transition:-webkit-transform 0.3s}
                        .fa-plus.mn-social-r {-webkit-transform:rotate(45deg)}
                    </style>
                    <div class="mn-social-bottom-c">
                        <a class="mn-social-bottom" href="https://www.facebook.com/sharer/sharer.php?u={{url('front/materi/'.$data['data']->pgPermalink)}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="mn-social-bottom" href="http://twitter.com/share?text={{$data['data']->pgTitle}}&url={{url('front/materi/'.$data['data']->pgPermalink)}}&hashtags=" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="mn-social-bottom" href="https://www.linkedin.com/shareArticle?url={{url('front/materi/'.$data['data']->pgPermalink)}}&title={{$data['data']->pgTitle}}&source={{url('front/materi/'.$data['data']->pgPermalink)}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a class="mn-social-bottom" href="mailto:?subject={{$data['data']->pgTitle}}&body={{strip_tags($data['data']->pgDescription)}}. kunjungi Alamat ini {{url('front/materi/'.$data['data']->pgPermalink)}}" target="_blank"><i class="fa fa-envelope"></i></a>
                        <a class="mn-social-bottom" href="http://pinterest.com/pin/create/button/?url={{url('front/materi/'.$data['data']->pgPermalink)}}&media={{asset('storage/images/assets_pengetahuan/'.$data['data']->pgImage)}}&description={{url('front/materi/'.$data['data']->pgTitle)}}" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                        <?php /*<a class="mn-social-bottom" onclick="$('#mn-social-bottom-hidden').slideToggle();$('.fa-plus').toggleClass('mn-social-r')"><i class="fa fa-plus"></i></a>*/ ?>
                        
                        <?php /*
                        <div id="mn-social-bottom-hidden">
                            <a class="mn-social-bottom"><i class="fa fa-tumblr"></i></a>
                            <a class="mn-social-bottom"><i class="fa fa-get-pocket"></i></a>
                            <a class="mn-social-bottom"><i class="fa fa-stumbleupon"></i></a>
                            <a class="mn-social-bottom"><i class="fa fa-reddit"></i></a>
                            <a class="mn-social-bottom"><i class="fa fa-envelope"></i></a>
                            <a class="mn-social-bottom"><i class="fa fa-delicious"></i></a>
                        </div>*/ ?>
                    </div>
                </div>    
            </div>
            
            <!-- END SHARE BUTTON-->
            
            <br><br>
            <div class="col-lg-12 col-md-12 d-flex align-items-stretch" style="margin-bottom:10px;  ">
                <span style="font-weight:bold; border-bottom:1px solid #ccc; width:100%">Komentar :</span><br>
            </div>
            @guest
                <div class="alert alert-danger" role="alert">
                    Anda harus Login terlebih dahulu apabila ingin memberikan komentar..
                </div>
            @endguest
            {{-- START : KOMENTAR ROOM --}}
            
            <div class="container">
                @auth
                @if (\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user')
                    @if(session()->get('USER_LOGIN.VERIFIED')=="y")
                        <form class="form-block post_comments" action="{{route('materi.post_comments',$data['data']->pgPermalink)}}" method="POST" id="post_comments">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12">									
                                    <div class="form-group">
                                        <textarea class="form-input summernote" name="komentar" required="" placeholder="Ketikkan Komentar Anda di Sini" style="color:black"><p></p></textarea>
                                    </div>
                                </div>
                                <div style="text-align:right !important; padding-top:10px;">
                                    {!! htmlFormSnippet() !!} 
                                </div>
                                <div style="text-align:right !important; padding-bottom:10px;">
                                    <input  class="btn btn-warning pull-right" type="submit" name="comment" value="Kirim Komentar"  style="width:150px; margin-top:10px;">
                                </div>    
                            </div>
                        </form>
                    @else
                        <div class="alert alert-danger" role="alert">
                            Anda harus Memverifikasi Akun anda terlebih dahulu apabila ingin memberikan komentar..
                        </div>
                    @endif    
                @endif
                @endauth
                <!-- END  FORM KOMENTAR -->
                <div class="row" id="kolom_komentar">
                    <div class="col-md-12">
                        @foreach($data['komentar'] as $cmkey=>$cmval)
                        @php
                        $comments = Modules\Front\Http\Controllers\MateriController::get_comments($cmval->cmId);
                        $time_ago = Modules\Front\Http\Controllers\MateriController::time_elapsed_string($cmval->cmAddedDate);
                        @endphp
                        <div class="post-content">
                            <div class="post-container">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="profile-photo-md pull-left">
                                <div class="post-detail">
                                    
                                    <div class="user-info" style="max-width:100% !important">
                                        <h5><a href="timeline.html" class="profile-link">{{$cmval->name}}</a> <span class="following"><?php #following?></span></h5>
                                        <p class="text-muted">{{date("d M Y",strtotime($cmval->cmAddedDate))}} WIB ({{$time_ago}})</p>
                                    </div>
                                    <div class="line-divider"></div>
                                    <div class="post-text" id="{{$cmval->cmPermalink}}">
                                        <p>{!!$cmval->cmComment!!} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                                    </div>
                                    <div class="line-divider"></div>
                                    <div class="list_reply_comments_{{$cmval->cmId}}">
                                        @foreach($comments as $rmkey=>$rmval)
                                        <div class="post-comment"  id="{{$rmval->cmPermalink}}">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="profile-photo-sm">
                                            <p>
                                                <a href="timeline.html" class="profile-link">{{$rmval->name}} </a>
                                                <i class="em em-laughing"></i>
                                                {{$rmval->cmComment}}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                    @auth
                                    @if (\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user')
                                        @if(session()->get('USER_LOGIN.VERIFIED')=="y")
                                            <form class="form-block post_comments" action="{{route('materi.post_replycomments',$cmval->cmPermalink)}}" method="POST" id="post_comments">
                                                @csrf
                                                <div class="post-comment">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
                                                    <input type="text" name="balas_komentar" class="form-control post_commentsx " placeholder="Balas Komentar di sini">
                                                </div>
                                            </form>
                                        @endif    
                                    @endif
                                    @endauth
                                        
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                </div>
            </div>
            
            {{-- END : KOMENTAR ROOM --}}
            <div class="col-lg-12 col-md-12 d-flex align-items-stretch" style="margin-bottom:10px;margin-top:20px;  ">
                <span style="font-weight:bold; border-bottom:1px solid #ccc; width:100%">Materi lainnya :</span><br>
            </div>    
            <div class="row" style="padding:5px; background-color:white; padding-bottom:40px;">
                @foreach($data['materi_lain'] as $makey=>$maval)
                @php
                $time_ago = Modules\Front\Http\Controllers\MateriController::time_elapsed_string($maval->pgTimePost);
                @endphp
                <div class="col-xs-6 col-sm-2" style="margin-bottom:10px;">
                    <img src="{{asset('storage/images/assets_pengetahuan/'.$maval->pgImage)}}" width="100%">
                </div>
                <div class="col-xs-6 col-sm-4" style="margin-bottom:10px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="{{url("front/materi/".$maval->pgPermalink)}}" style="font-size:16px;">{{$maval->pgTitle}}</a>
                        </div>
                        <div class="col-xs-12" style="font-size:14px">
                            <a> <strong>{{$maval->catName}}</strong></a>
                        </div>
                        <div class="col-xs-12" style="font-size:14px">
                            {{$maval->pgTimePost}} WIB ({{$time_ago}})
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection