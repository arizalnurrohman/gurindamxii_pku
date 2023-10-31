<?php 
    $segment_=Request::segment(1);?>

@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>404</a></li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page" style="padding:0px">
        <div class="container" style="text-align:justify">
            <style type="text/css">
                a {
                    color: #851a8b;
                }
                a:hover{
                    color:#5e1362
                }
            </style>
            <div class="row gy-4">
            
                <div class="col-lg-12" style="height:700px; padding-top:40px; text-align:center">
                    <?php #---------------------------------------------------------------------------------------------?>
                    <img src="{{asset('assets/img/sad.svg')}}" alt="" style="width:300px">
                    <br>
                    <span style="font-size:100px;">500</span>
                    <?php ##-------------------------------------------------------------------------------------------------------------?>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection