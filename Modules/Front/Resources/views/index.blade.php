@extends('front::layouts.master')

@section('content')
        <?php
        /*
        <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Inner Page</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">
            <div class="container">
            <h1>Hello World</h1>

            <p>
                This view is loaded from module: {!! config('front.name') !!} <br>
                haha udah ada ternyata di sni ya wkwkwkk
            </p>
            </div>
        </section>

        </main><!-- End #main -->
        */ ?>
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
                font-size: 25px !important;
                line-height: 18px;
                height:65px;
                opacity: 70%;
                text-align:center !important;
                
                color: black !important;
                font-weight:bold;
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
                height:80px;
                opacity: 100%;
            }

            */ /*LAST STYLE */
            
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
                max-width: 500px;
                margin: 0 auto;
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
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center justify-content-center">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-xl-6 col-lg-8" style="padding-top:10px;">
                        <h1><span>GURINDAM</span></h1>
                        <h2>Gapura Pembelajaran Individu Aktif Mandiri Sebagai Pusat Pembelajaran ASN</h2>
                    </div>
                    <form action="{{route('materi.index')}}<?php /*{url('/front/materi/')} */ ?>" method="GET" style="padding-top:50px;">
                        @csrf
                        <?php /*
                        <div class="search__container">
                            <p class="search__title">
                                <?php #Hai Sobat BKN, Ingin mencari Materi apa hari ini ?? ?>
                                <br>
                            </p>
                            <input class="search__input form-input"  name="cari_materi" type="text" placeholder="Hai Sobat BKN, Ingin mencari Materi apa hari ini ??">
                        </div> */ ?>
                        
                        <div class="row justify-content-between search-container" style="margin-top:20px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group"> <!-- Mengelompokkan elemen dalam input-group -->
                                        <input type="text" name="cari_materi" class="form-control search-input" placeholder="Hai Sobat BKN, Ingin mencari Materi apa hari ini ??">
                                        <div class="input-group-append"> <!-- Grupkan tombol Filter dan Cari -->
                                            <?php /*<button type="button" class="btn btn-primary filter-button" id="filterButton">
                                                <i class="fas fa-filter"></i> <!-- Ikon filter -->
                                            </button> */ ?>
                                            <button type="submit" class="btn btn-primary filter-button">
                                                <i class="fas fa-search"></i> <!-- Ikon pencarian -->
                                            </button>
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
                                                @foreach($data_pengetahuan['category'] as $catid=>$catname)
                                                    <option value="{{$catname->catPermalink}}">{{$catname->catName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="closeModal">Terapkan Filter
                                            
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                

                <!-- <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-store-line"></i>
                        <h3><a href="">Lorem Ipsum</a></h3>
                    </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-bar-chart-box-line"></i>
                        <h3><a href="">Dolor Sitema</a></h3>
                    </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-calendar-todo-line"></i>
                        <h3><a href="">Sedare Perspiciatis</a></h3>
                    </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-paint-brush-line"></i>
                        <h3><a href="">Magni Dolores</a></h3>
                    </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                    <div class="icon-box">
                        <i class="ri-database-2-line"></i>
                        <h3><a href="">Nemos Enimade</a></h3>
                    </div>
                    </div>
                </div> -->

            </div>
        </section><!-- End Hero -->

        <main id="main">
            
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" style="background-color:white; padding:10px;">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" data-interval="3000">
                        <div class="carousel-indicators">
                            @foreach($data_pengetahuan['highlight'] as $hkey=>$hval)
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$hkey}}" <?php print ($hkey==0 ? 'class="active" aria-current="true"':'')?> aria-label="Slide {{$hkey+1}}"></button>
                            @endforeach
                            <?php /*
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>*/ ?>
                        </div>
                        <div class="carousel-inner">
                            @php
                                $no=1;
                            @endphp
                            @foreach($data_pengetahuan['highlight'] as $hkey=>$hval)
                            <div class="carousel-item <?php print $no==1 ? 'active' : ''; ?>">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <img src="{{asset('storage/images/assets_pengetahuan/'.$hval->pgImage)}}" class="d-block w-100" alt="..." style="height:300px;">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="row">
                                            <h1>{{$hval->pgTitle}}</h1>
                                            <p style="text-align:justify" class="hidden-sm hidden-xs">
                                                {{substr(strip_tags($hval->pgDescription),0,200)}}
                                                <br>
                                            </p>
                                                <a href="{{url('front/materi').'/'.$hval->pgPermalink}}" target="_blank">
                                                <button class="btn btn-xs btn-info" style="width:170px;">
                                                    Baca Materi
                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </a>

                                            <?php /*
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>First slide label</h5>
                                                <p>Some representative placeholder content for the first slide.</p>
                                            </div> */ ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php 
                            $no++;
                            @endphp
                            @endforeach
                            <?php /*
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <img src="http://127.0.0.1:8000/storage/images/assets_pengetahuan/2023/10/20231010/6524b8e4aac46.jpg" class="d-block w-100" alt="..." style="height:300px;">
                                    </div>
                                    <div class="col">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>Some representative placeholder content for the second slide.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <img src="http://127.0.0.1:8000/storage/images/assets_pengetahuan/2023/10/20231010/6524d5cbd0dd7.jpg" class="d-block w-100" alt="..." style="height:300px;">
                                    </div>
                                    <div class="col">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>Some representative placeholder content for the second slide.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>*/ ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>    
                <?php /*
                <div class="container">
                    <div class="container-fluid py-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <a class="h1" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span>&lt;</span>
                                </a>
                            </div>
                            <div class="col">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row align-items-center">
                                                <div class="col-md py-2">
                                                    <p> Text text text here. Text here, here, here, here is the text. Text here, here, here, here is the text. </p>
                                                    <button class="btn btn-primary">More here</button>
                                                </div>
                                                <div class="col-md py-2">
                                                    <img class="d-block img-fluid" src="//placehold.it/900x500" alt="First slide">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <p> Text text text here. Text here, here, here, here is the text. Text here, here, here, here is the text. </p>
                                                    <button class="btn btn-primary">More...</button>
                                                </div>
                                                <div class="col">
                                                    <img class="d-block img-fluid" src="//placehold.it/900x500/990033" alt="2nd slide">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <p> Text text text here. Text here, here, here, here is the text. Text here, here, here, here is the text. </p>
                                                    <button class="btn btn-primary">More...</button>
                                                </div>
                                                <div class="col">
                                                    <img class="d-block img-fluid" src="//placehold.it/900x500/ffcc00" alt="3rd slide">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a class="h1" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span>&gt;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                */ ?>
                <?php /*
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-3 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <img src="{{asset('images/logo/logo-gurindam.png')}}" class="img-fluid" alt="" style="width:100%">
                        </div>
                        <div class="col-lg-9 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                            <h3>Gurindam - Gapura Pembelajaran Individu Aktif Mandiri Sebagai Pusat Pembelajaran ASN.</h3>
                            <p class="fst-italic" style="text-align:justify">
                                Gapura Pembelajaran Individu Aktif Mandiri Sebagai Pusat Pembelajaran Aparatur Sipil Negara (Gurindam) 
                                Merupakan Aplikasi yang dikembangkan oleh Badan Kepegawaian Negara Kantor Region XII Pekanbaru, 
                                yang dapat digunakan oleh Seluruh Pengunjung terkhususnya untuk seluruh Aparatur Sipil Negara 
                                untuk melakukan pembelajaran secara mandiri dengan membaca atau melihat materi yang tersedia pada aplikasi Gurindam.
                            </p>
                        </div>
                    </div>
                </div>
                */?>
            </section> 
            <!-- End About Section -->
            <?php
            /*
            ?>
            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>
            </section><!-- End Clients Section -->

            <!-- ======= Features Section ======= -->
            <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="row">
                <div class="image col-lg-6" style='background-image: url("assets/img/features.jpg");' data-aos="fade-right"></div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                    <i class="bx bx-receipt"></i>
                    <h4>Est labore ad</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Harum esse qui</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                    <i class="bx bx-images"></i>
                    <h4>Aut occaecati</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                    <i class="bx bx-shield"></i>
                    <h4>Beatae veritatis</h4>
                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                    </div>
                </div>
                </div>

            </div>
            </section><!-- End Features Section -->
            <?php
            */
            ?>
            <?php
            /*
            ?>
            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Services</h2>
                <p>Check our Services</p>
                </div>

                <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="">Lorem Ipsum</a></h4>
                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="">Sed ut perspiciatis</a></h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4><a href="">Magni Dolores</a></h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4><a href="">Nemo Enim</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-slideshow"></i></div>
                    <h4><a href="">Dele cardo</a></h4>
                    <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-arch"></i></div>
                    <h4><a href="">Divera don</a></h4>
                    <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                    </div>
                </div>

                </div>

            </div>
            </section><!-- End Services Section -->

            <!-- ======= Cta Section ======= -->
            <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="text-center">
                <h3>Call To Action</h3>
                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a class="cta-btn" href="#">Call To Action</a>
                </div>

            </div>
            </section><!-- End Cta Section -->
            <?php
            */
            ?>
            <?php
            /*
            ?>
            <!-- ======= Portfolio Section ======= -->
            <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Portfolio</h2>
                <p>Check our Portfolio</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 1</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 2</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 2</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>App 3</h4>
                        <p>App</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Web 3</h4>
                        <p>Web</p>
                        <div class="portfolio-links">
                        <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                    </div>
                </div>

                </div>

            </div>
            </section><!-- End Portfolio Section -->
            <?php
            */
            ?>
            <?php
            /*
            ?>
            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row no-gutters">
                <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100"></div>
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="100">
                    <div class="content d-flex flex-column justify-content-center">
                    <h3>Voluptatem dignissimos provident quasi</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                    <div class="row">
                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="2" class="purecounter"></span>
                            <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                        </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="2" class="purecounter"></span>
                            <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
                        </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-clock"></i>
                            <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="4" class="purecounter"></span>
                            <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
                        </div>
                        </div>

                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="4" class="purecounter"></span>
                            <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                        </div>
                        </div>
                    </div>
                    </div><!-- End .content-->
                </div>
                </div>

            </div>
            </section><!-- End Counts Section -->
            <?php
            */
            ?>
            <?php
            /*
            ?>
            <!-- ======= Testimonials Section ======= -->
            <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
                </div>

            </div>
            </section><!-- End Testimonials Section -->
            <?php
            */
            ?>
            <!-- ======= Team Section ======= -->
            <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Materi</h2>
                <p>Daftar Materi Pembelajaran <?php #print_r($data_pengetahuan) ?></p>
                </div>

                <div class="row">
                    <style>
                        a.btn_dtl{
                            color:#C78400;
                        }
                        a.btn_dtl:hover{
                            color:#7d6026;
                        .social a:hover{
                            
                        }
                        .team .member .social a{
                            background:red !important;
                        }
                    </style>
                    
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data_pengetahuan['data']);  ?>
                    </pre> */ ?>
                    <?php #for($x=1;$x<=12;$x++){?>
                        @foreach($data_pengetahuan['data'] as $pgkey=>$pgval)
                        @php
                        $content_type = Modules\Front\Http\Controllers\FrontController::get_typecontent($pgval->pgId);
                        $comments     = Modules\Front\Http\Controllers\FrontController::get_count($pgval->pgId);
                        $star         = Modules\Front\Http\Controllers\MateriController::get_star($pgval->pgId);
                        @endphp
                    <?php $number=$pgkey+1; if($number>4){ $number=1;} ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100" style="background-color:#ccc">
                            <div class="member-img">
                                <img src="{{asset('storage/images/assets_pengetahuan/'.$pgval->pgImage)}}" class="img-fluid" alt="">
                                
                                <div class="social" style="display:block; width:100%; background-color:#ccc; padding:5px 0px;">
                                    <a class="btn_dtl" title="Tambahkan ke Daftar Baca" onClick="addItemToCart('{{$pgval->pgPermalink}}','read_later')"><i class="fa-solid fa-list"></i></a>
                                    <?php /*<a style="<?php #{{$pgval->pnId ? 'background:red; color:white' : ''}} ?>" class="btn_dtl done_already" title="Tandai Materi ini" onClick="addItemToCart('{{$pgval->pgPermalink}}','pin')"><i class="fa-solid fa-thumbtack"></i></a>*/ ?>
                                    <a style="<?php /*{{$pgval->lkId ? 'background:red; color:white' : ''}}*/ ?>" class="btn_dtl" title="Sukai Materi ini" onClick="addItemToCart('{{$pgval->pgPermalink}}','like')"><i class="fa-solid fa-heart"></i></a>
                                </div> 
                            </div>
                            <div class="" style="font-size:12px; padding:5px;background-color:#C53A54;height:26px;">
                                <div style="float:left">
                                    <span style="color:#000; background-color:#E6CB90; margin-right:10px; padding:6px 10px ; margin-left:-5px;"><strong>{{$pgval->pgType}}</strong></span>
                                    <span style="color:#fff;margin-left:-5px;"><i class="fa-solid fa-clock"></i> : {{$pgval->pgEstimation}} menit</span>
                                </div>
                                <div style="float:right">    
                                    <a style="color:#FFD584"><i class="fa-regular fa-comment"></i> {{$comments}}</a>
                                    <a style="color:#FFD584"><i class="fa-regular fa-star"></i> {{$star}}</a>
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
                                <span style="margin-top:0px;" class="font-italic">
                                    {{$pgval->catName}}
                                    <?php /*<a href="{{url("front/materi/?cari_filter[]=".$pgval->catPermalink)}}" style="color:#C53A54">{{$pgval->catName}}</a>*/ ?>
                                </span>
                            </div>
                            <div class="member-info" style="margin-top:0px; padding: 0px 10px 15px 15px;text-align:justify; font-size:15px; font-weight:bold">
                                <a href="{{url("front/materi/".$pgval->pgPermalink)}}" style="color:#1A3773;">{{$pgval->pgTitle}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <?php #} ?>
                </div>
            </div>
            </section><!-- End Team Section -->

            <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Materi</h2>
                <p>Materi Terpopuler <?php #print_r($data_pengetahuan) ?></p>
                </div>

                <div class="row">
                    <style>
                        a.btn_dtl{
                            color:#C78400;
                        }
                        a.btn_dtl:hover{
                            color:#7d6026;
                    </style>
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data_pengetahuan['data']); exit; ?>
                    </pre> */ ?>
                    <?php #for($x=1;$x<=12;$x++){?>
                    @foreach($data_pengetahuan['populer'] as $pgkey=>$pgval)
                        @php
                        $content_type = Modules\Front\Http\Controllers\FrontController::get_typecontent($pgval->pgId);
                        $comments     = Modules\Front\Http\Controllers\FrontController::get_count($pgval->pgId);
                        $star         = Modules\Front\Http\Controllers\MateriController::get_star($pgval->pgId);
                        @endphp
                    <?php $number=$pgkey+1; if($number>4){ $number=1;} ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100" style="background-color:#ccc">
                            <div class="member-img">
                                <img src="{{asset('storage/images/assets_pengetahuan/'.$pgval->pgImage)}}" class="img-fluid" alt="">
                                
                                <div class="social" style="display:block; width:100%; background-color:#ccc; padding:5px 0px;">
                                    <a class="btn_dtl" title="Tambahkan ke Daftar Baca" onClick="addItemToCart('{{$pgval->pgPermalink}}','read_later')"><i class="fa-solid fa-list"></i></a>
                                    <?php /*<a class="btn_dtl" title="Tandai Materi ini" onClick="addItemToCart('{{$pgval->pgPermalink}}','pin')"><i class="fa-solid fa-thumbtack"></i></a>*/ ?>
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
                                    <a style="color:#FFD584"><i class="fa-regular fa-star"></i> {{$star}}</a>
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
                                <span style="margin-top:0px;" class="font-italic">
                                    {{$pgval->catName}}
                                    <?php /*<a href="{{url("front/materi/?cari_filter[]=".$pgval->catPermalink)}}" style="color:#C53A54">{{$pgval->catName}}</a>*/ ?>
                                </span>
                            </div>
                            <div class="member-info" style="margin-top:0px; padding: 0px 10px 15px 15px;text-align:justify; font-size:15px; font-weight:bold">
                                <a href="{{url("front/materi/".$pgval->pgPermalink)}}" style="color:#1A3773;">{{$pgval->pgTitle}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <?php #} ?>
                </div>
            </div>
            </section><!-- End Team Section -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact" style="background-color:#fff">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
                </div>

                <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1102.1339560411532!2d101.5049299747293!3d0.5052204168698763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac3cc08a0afd%3A0xb0f41ee0c2210293!2sBKN%20Kantor%20Regional%20XII!5e1!3m2!1sen!2sid!4v1692779050461!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Alamat:</h4>
                        <p>Jl. Hang Tuah Ujung No. 148 Kel. Sialang Sakti Kec. Tenayan Raya Pekanbaru, Riau 28285 </p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p><a style="color:#484848" href="mailto:kanreg12.pekanbaru@bkn.go.id">kanreg12.pekanbaru@bkn.go.id</a></p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Telp:</h4>
                        <p>0761 787 0006</p>
                    </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="{{route('contactus.store')}}" method="post" role="form" class="php-email-form"  style="text-align:right">
                    @csrf
                        <div class="row" style="margin-bottom:15px;">
                            <div class="col-md-6 form-group">
                                <input type="text" name="cnname" class="form-control" id="cnname" placeholder="Nama Anda" required>
                            </div>

                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="cnemail" id="email" placeholder="Email Anda" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="cnhp" class="form-control" id="name" placeholder="NO HP / WA" required>
                            </div>

                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <select class="form-control" name="cntype" style="height:44px;">
                                    <option value="">Pilih Jenis</option>
                                    <option value="Kritik">Kritik</option>
                                    <option value="Saran">Saran</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="cntitle" id="subject" placeholder="Judul" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="cnmessage" rows="5" placeholder="isi Pesan" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            {!! htmlFormSnippet() !!} 
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div><button type="submit">Kirim Kritik / Saran</button></div>
                    </form>

                </div>

                </div>

            </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->
    
@endsection
