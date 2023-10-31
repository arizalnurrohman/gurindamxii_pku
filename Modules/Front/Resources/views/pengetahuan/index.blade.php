@extends('front::layouts.master')

@section('content')

<section id="hero" class="d-flex align-items-center justify-content-center" style="height:330px;">
    <style type="text/css">
        /*
        @use postcss-color-function;
        @use postcss-nested;
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700,900');
        .search__container {
            padding-top: 0px;
        }
        
        .search__title {
            font-size: 22px;
            font-weight: 900;
            text-align: center;
            color: #FFC451;
        }
        
        .search__input {
            width: 100%;
            padding: 12px 24px;

            background-color: transparent;
            transition: transform 250ms ease-in-out;
            font-size: 18px !important;
            line-height: 18px;
            height:45px;
            opacity: 40%;
            
            color: #575756;
            background-color: transparent;
    
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-size: 18px 18px;
            background-position: 95% center;
            border-radius: 50px;
            border: 1px solid #575756;
            transition: all 250ms ease-in-out;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            text-align:center !important;
        }    
        .search__input:placeholder {
            color: color(#575756 a(0.8));
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        .search__input:hover,
        .search__input:focus {
            padding: 12px 12px;
            outline: 0;
            border: 1px solid transparent;
            border-bottom: 1px solid #575756;
            border-radius: 0;
            background-position: 98% center;
            height:60px;
            opacity: 100%;
        }*/
        
        /* end of use*/
        /*
        .credits__container {
            margin-top: 24px;
        }
        
        .credits__text {
            text-align: center;
            font-size: 13px;
            line-height: 18px;
        }
        
        .credits__link {
            color: #ff8b88;
            text-decoration: none;
            transition: color 250ms ease-in;
        }    
        .credits__link:hover,
        .credits__link:focus {
            color: color(#ff8b88 blackness(+25%));
        }
        */
        .search-input {
                border: 1px solid #ff6b81; /* Warna border */
                border-radius: 5px;
                transition: box-shadow 0.3s ease;
                width: 80%; /* Lebar kolom pencarian */
                display: inline-block;
                height:60px;
                font-size:24px !important;
                text-align:center;
                opacity:75%;
            }
            .search-input:hover{
                opacity:100%;
            }
            .filter-button {
                background-color: #ff6b81; /* Warna tombol filter */
                border: none;
                height:60px;
            }
            .modal-content {
                position: absolute;
                max-width: 500px;
                margin: 0 auto;
                z-index:9999;
                margin-top:-100px;
            }

            .modal-header {
                background-color: #428BCA; /* Warna header modal */
                color: #b3b2b2; /* Warna teks header modal */
            }

            .modal-footer {
                background-color: #ff6b81; /* Warna footer modal */
            }

            /*close */
            .close {
                float: right;
                
                font-weight: 20px;
                line-height: 1;
                color: #060;
                text-shadow: 0px;

                background-color: transparent;
                border: 0;

            }
            .modal-open {
                overflow: hidden;
            }
            #form_field_select_4_chosen{
                width:100% !important;
                font-size:20px;
            }
    </style>
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <!-- <div class="col-xl-6 col-lg-8" style="padding-top:10px;">
            <h1><span>GURINDAM</span></h1>
            <h2>Gapura Pembelajaran Individu Aktif Mandiri Sebagai Pusat Pembelajaran ASN</h2>
            </div> -->
            <div class="search__container">
                <?php /*<p class="search__title">
                    Hai Sobat BKN, Ingin mencari Materi apa hari ini ??
                </p>*/ ?>
                <!-- <select name="search__filter" class="search__filter form-input tag-input-style">
                    <option value="">Pilih Kategori</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select> -->
                <?php /*
                <form action="{{route('materi.index')}}<?php #{url('/front/materi/')} ?>" method="GET">
                    @csrf
                    <input class="search__input form-input" name="cari_materi" type="text" placeholder="Ketikkan Judul Materi" value="{{ app('request')->input('cari_materi') }}<?php #print $_GET['cari_materi'] ?>">
                </form>*/ ?>    
                    <!-- <select multiple name="search__filter" class="search__filter">
                        <option value="">Pilih Kategori</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> -->
                <form action="{{route('materi.index')}}<?php /*{url('/front/materi/')} */ ?>" method="GET">
                    @csrf
                    <div class="row justify-content-between search-container" style="margin-top:20px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group"> <!-- Mengelompokkan elemen dalam input-group -->
                                    <input type="text" name="cari_materi" class="form-control search-input" placeholder="Hai Sobat BKN, Ingin mencari Materi apa hari ini ??" value="{{ app('request')->input('cari_materi') }}">
                                    <div class="input-group-append"> <!-- Grupkan tombol Filter dan Cari -->
                                        <?php /*<button type="button" class="btn btn-primary filter-button" id="filterButton">
                                            <i class="fas fa-filter"></i> <!-- Ikon filter -->
                                        </button> */ ?>
                                        <button type="submit" class="btn btn-primary filter-button">
                                            <i class="fas fa-search"></i> <!-- Ikon pencarian -->
                                        </button>
                                        <?php /*
                                        <button type="reset" class="btn btn-primary filter-button" id="resetButton">
                                            <i class="fas fa-refresh"></i>
                                        </button> */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="myModal"  style="overflow:visible !important">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Filter Kategori Materi</h2>
                                    <button type="button" class="close" id="closeModal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <?php /*<label for="filterOptions">Pilih Filter:</label> */ ?>
                                    <div class="form-group">
                                        <!-- Tambahkan class "custom-select" dan "custom-select-lg" untuk membuat Combo Box dengan Bootstrap -->
                                        <select multiple="" name="cari_filter[]" class="chosen-select form-control tag-input-style" id="form-field-select-4" data-placeholder="Pilih Nama Kategori...">
                                            @foreach($data['category'] as $catid=>$catname)
                                                @php 
                                                    $selected="";
                                                    if(app('request')->input('cari_filter')){
                                                        if(in_array($catname->catPermalink,app('request')->input('cari_filter'))){ 
                                                            $selected='selected="Selected"'; 
                                                        }else{
                                                            $selected="";
                                                        } 
                                                    }
                                                @endphp
                                                <option value="{{$catname->catPermalink}}" {{$selected}}>{{$catname->catName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="closeModal">Terapkan Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
            <?php /*
            <div class="credits__container">
                <p class="credits__text">Background color: Pantone Color of the Year 2016 <a href="https://www.pantone.com/color-of-the-year-2016" class="credits__link">Rose Quartz</a></p>
            </div> */ ?>
            <!-- COBA TAMBAH SINI -->
            <?php /*
            <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title lighter">Search Form</h5>
                </div>
            
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-search" action="" method="get">
                            <div class="row">
                                <div class="box col-xs-6 ">
                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Bulan..." name="selmonth">
                                        <option value="">  </option>
                                        <option value="1" >1</option>
                                    </select>
                                </div>
                                <div class="box col-xs-6 ">
                                    <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Tahun..." name="selyear">
                                        <option value="">  </option>
                                        <option value="1" >1</option>                                    
                                    </select>
                                </div>
                                <div class="box col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-check"></i>
                                        </span>
            
                                        <input type="text" class="form-control search-query" placeholder="Ketik NIP atau Nama" name="search" value="">
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
            </div> */ ?>
        </div>
    </div>
</section><!-- End Hero -->
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <?php /*
    <section class="breadcrumbs">
    <div class="container">
        <div style="display:block; float:left;width:100%">
            <ol>
                <li><a href="{{url("/front")}}">Home</a></li>
                <li><a href="{{url('/front/materi/')}}">Materi</a></li>
            </ol>
        </div>
        <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
            <h2 style="font-weight:bold">Daftar Materi</h2>
        </div>
    </div>
    </section> */ ?><!-- End Breadcrumbs -->
    <section id="team" class="team">
    <?php #<section class="team">; ?>
        <div class="container">
            <div class="section-title">
                <p>Daftar Materi Pembelajaran <?php #print_r($data) ?></p>
                <div style="margin-bottom:20px;text-align:center" id="btn_cat">
                    <?php /*<button class="btn btn-sm btn-warning"  style="margin-bottom:5px;">
                        <span class="bigger-110 no-text-shadow">Semua</span>
                    </button>*/?>
                    <style type="text/css">
                        .radio_button{
                            pointer-events: none;
                            text-decoration:none;
                            position: absolute;
                            clip: rect(0,0,0,0);
                        }
                    </style>
                    <?php /*<button style="margin-bottom:5px;" type="button" class="btn btn-sm btn-warning" data-toggle="button" aria-pressed="true">Semua</button>*/ ?>
                    @php
                        $bgbutton=array("primary","blue","warning","purple","info","danger","pink","inverse","yellow","grey");
                    @endphp
                    <?php /*<div data-toggle="buttons" class="btn-group">*/ ?>
                        <label id="btn_0" class="btn_category btn btn-warning btn-sm" style="margin-bottom:5px;">
                            <input type="radio" class="radio_button kategorinama" name="kategorinama" value="" OnClick="filterCategory('0-semua')">
                            Semua
                        </label>
                        @foreach($data['category'] as $catid=>$catname)
                            <?php /*<button class="btn btn-sm btn-" style="margin-bottom:5px;">
                                <span class="bigger-110 no-text-shadow">{{$catname->catName}}</span>
                            </button> */ ?>
                            <?php /* <button style="margin-bottom:5px;" type="button" class="btn btn-sm" data-toggle="button" aria-pressed="true">{{$catname->catName}}</button>*/ ?>
                            <label id="btn_{{$catname->catId}}" class="btn_category btn btn-sm" style="margin-bottom:5px;background-color:yellow"><?php #alert($(this).val())?>
                                <input class="radio_button kategorinama" type="radio" value="{{$catname->catPermalink}}" name="kategorinama" OnClick="filterCategory('{{$catname->catPermalink}}')">
                                {{$catname->catName}}
                            </label>
                        @endforeach
                    <?php /*</div>*/ ?>

                </div>
                
                @if(app('request')->input('cari_materi') or app('request')->input('cari_filter'))
                <div class="row" style="background-color:#CCCCCC;  margin-bottom:20px; margin-left:2px; margin-right:5px;">
                    <div class="col-lg-2 col-sm-12" style="font-size:16px; padding:15px 15px 3px 15px;font-weight:bold;">Pencarian Materi </div>
                    <div class="col-lg-10 col-sm-12" style="font-size:14px;background-color:#fgt4;padding:15px 15px 3px 15px;">: {{ app('request')->input('cari_materi') }} </div>
                    <div class="col-lg-2 col-sm-12" style="font-size:16px; padding:0px 15px 3px 15px;font-weight:bold;">Filter Kategori </div>
                    <div class="col-lg-10 col-sm-12" style="font-size:14px;background-color:#fgt4;padding:0px 15px 3px 15px;">: {{ app('request')->input('cari_filter') ? implode(",",app('request')->input('cari_filter')): '' }} </div>
                    <div class="col-lg-12 col-sm-12" style="font-size:14px;background-color:#fgt4;padding:0px 15px 15px 15px;font-weight:bold;">Total data ditampilkan ({{$data['data_count']}}) </div>
                </div>
                @endif
                <div class="row data_materi">
                    <style>
                        a.btn_dtl{
                            color:#C78400;
                        }
                        a.btn_dtl:hover{
                            color:#7d6026;
                    </style>
                    @foreach($data['data'] as $pgkey=>$pgval)
                        @php
                        $content_type = Modules\Front\Http\Controllers\FrontController::get_typecontent($pgval->pgId);
                        $comments     = Modules\Front\Http\Controllers\FrontController::get_count($pgval->pgId);
                        @endphp
                    <?php $number=$pgkey+1; if($number>4){ $number=1;} ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100" style="background-color:#ccc">
                            <div class="member-img">
                                <img src="{{asset('storage/images/assets_pengetahuan/'.$pgval->pgImage)}}" class="img-fluid" alt="">
                                
                                <div class="social" style="display:block; width:100%; background-color:#ccc; padding:5px 0px;">
                                    <a class="btn_dtl" title="Tambahkan ke Daftar Baca" onClick="addItemToCart('{{$pgval->pgPermalink}}','read_later')"><i class="fa-solid fa-list"></i></a>
                                    <?php /*<a style="<?php #{{$pgval->pnId ? 'background:red; color:white' : ''}} ?>" class="btn_dtl done_already" title="Tandai Materi ini" onClick="addItemToCart('{{$pgval->pgPermalink}}','pin')"><i class="fa-solid fa-thumbtack"></i></a>*/ ?>
                                    <a class="btn_dtl" title="Sukai Materi ini" onClick="addItemToCart('{{$pgval->pgPermalink}}','like')"><i class="fa-solid fa-heart"></i></a>
                                </div>                            
                            </div>
                            <div class="" style="font-size:12px; padding:5px;background-color:#C53A54;height:26px;">
                                <div style="float:left">
                                    <span style="color:#000; background-color:#E6CB90; margin-right:10px; padding:6px 10px ; margin-left:-5px;"><strong>{{$pgval->pgType}}</strong></span>
                                    <span style="color:#fff;margin-left:-5px;"><i class="fa-solid fa-clock"></i> : {{$pgval->pgEstimation}} menit</span>
                                </div>
                                <div style="float:right">    
                                    <a style="color:#FFD584"><i class="fa-regular fa-comment"></i> {{$comments}}</a>
                                    <a style="color:#FFD584"><i class="fa-regular fa-star"></i> {{rand(1,5)}}</a>
                                    <a style="color:#FFD584"><i class="fa-regular fa-eye"></i> {{$pgval->pgViewed}}</a>
                                </div>    
                            </div>
                            <div class="" style="font-size:20px; padding:5px;text-align:right">
                                @foreach($content_type as $ctid=>$ctval)
                                    @if($ctval->pcContentType =='document')
                                        <i class="fa-regular fa-file-pdf"></i>
                                    @elseif($ctval->pcContentType =='video')
                                        <i class="fa-solid fa-video"></i>
                                    @else
                                        <i class="fa-solid fa-newspaper"></i>
                                    @endif 
                                @endforeach

                                &nbsp;
                            </div>
                            <div class="" style="font-size:15px; padding:5px 0px 0px 15px;margin-top:-20px;">
                                <span style="margin-top:0px;font-weight:bold">
                                    {{$pgval->catName}}
                                    <?php /*<a href="{{url("front/materi/?cari_filter[]=".$pgval->catPermalink)}}" style="color:#C53A54">{{$pgval->catName}}</a>*/ ?>
                                </span>
                            </div>
                            <div class="member-info" style="margin-top:0px; padding: 0px 10px 15px 15px;text-align:justify; font-size:13px; font-weight:bold">
                                <a href="{{url("front/materi/".$pgval->pgPermalink)}}" style="color:#1A3773;">{{$pgval->pgTitle}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div style="text-align:center; padding-bottom:10px;">
                    <input  class="btn btn-warning pull-right load_more_button" type="button" name="comment" value="Tampilkan Lebih Banyak"  style="color:black;width:250px; margin-top:10px;" OnClick="load_more({{app('request')->input('page')?app('request')->input('page') : 0}})")>
                </div> 
            </div>
        </div>    
    </section>
</main><!-- End #main -->
    
@endsection
