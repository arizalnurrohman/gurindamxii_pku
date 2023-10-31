@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Unverified</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <!-- <div style="display:block; float:left;width:100%">
                    <ol>
                        <li><a href="{{url("/front")}}">Home</a></li>
                        <li>Materi</li>
                    </ol>
                </div> -->
                <h2 style="font-weight:bold">Unverified</h2>
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
                .isDisabled {
                    color: currentColor;
                    cursor: not-allowed;
                    opacity: 0.5;
                    text-decoration: none;
                }
            </style>
            <div class="row gy-4">
            <?php 
                /*DIBUANG<div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div>*/ ?>
                <div class="col-lg-12" style="height:900px; padding-top:40px;">
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <?php #---------------------------------------------------------------------------------------------?>
                    
                    <?php ##-------------------------------------------------------------------------------------------------------------?>
                    <div class="alert alert-danger">
                        <strong>
                            <i class="ace-icon fa fa-times"></i>
                            Oh snap!
                        </strong>
                        <br>

                        Silahkan Lakukan Verifikasi menggunakan kode Verifikasi  yang telah kami kirimkan ke email anda..
                        <br>
                        Belum Memiliki Kode Verifikasi ?? <br>
                        <a href="{{route('verifikasi.resend_code')}}" class="resend_code"><strong>Kirim Ulang Kode Verifikasi</strong></a>
                        <br>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@section('script')
$('.resend_code').click(function(event){
    event.preventDefault();
    var target_addr=$(this).attr('href');
    $( '.resend_code' ).addClass( "isDisabled" );
    $.get(target_addr,function(data){
        if($.isEmptyObject(data.error)){
            $( '.resend_code' ).removeClass( "isDisabled" );
            swal({ 
                    type: 'success',
                    title: 'Success',
                    text: 'Anda Berhasil Mengirimkan Kode Verifikasi Email, silahkan verifikasi akun anda melalui kode verifikasi yang terkirim ke email anda' 
            });
        }else{
            $( '.resend_code' ).removeClass( "isDisabled" );
            swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text:'<span style="font-size:14px">'+ data.error +'</span>',
            });
        }
    })
        
    
});
@endsection