@extends('front::layouts.master')

@section('content')
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

    
@endsection
