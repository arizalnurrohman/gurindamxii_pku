@extends('front::layouts.master')

@section('content')
<main id="main">
    
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div style="display:block; float:left;width:100%">
                <ol>
                    <li><a href="{{url("/front")}}">Home</a></li>
                    <li><a>Pengaturan</a></li>
                </ol>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="float:left; text-align:justify">
                <!-- <div style="display:block; float:left;width:100%">
                    <ol>
                        <li><a href="{{url("/front")}}">Home</a></li>
                        <li>Materi</li>
                    </ol>
                </div> -->
                <h2 style="font-weight:bold">Pengaturan</h2>
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
            <?php 
                /*DIBUANG<div class="col-lg-2" style="border-right:1px solid #999; background-color:#fff">
                    @include('front::layouts.navigation')
                </div>*/ ?>
                <div class="col-lg-12">
                    <?php /*
                    <pre style="height:200px;">
                        <?php print_r($data['data']) ?>
                    </pre> */ ?>
                    <?php #---------------------------------------------------------------------------------------------?>
                    
                    <?php ##-------------------------------------------------------------------------------------------------------------?>
                    <div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-6">
                        <div class="widget-box widget-color-dark light-border ui-sortable-handle" id="widget-box-6">
                            <div class="widget-header">
                                <h5 class="widget-title smaller">Update Data Pribadi Anda</h5>

                                <div class="widget-toolbar">
                                    <span class="badge badge-danger" style="border-radius:0px;">
                                        <label class="pos-rel">
                                            <span class="lbl">&nbsp;</span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-6"> 
                                    <style type="text/css">
                                        .form-group label{
                                            font-weight:bold;
                                        }
                                        .form-group small{
                                            font-style: italic;
                                        }
                                    </style>
                                    <?php ######################## ?>
                                    <form class="form-block" action="{{route('pengaturan.store')}}" method="POST" id="post_pengaturan">
                                        @csrf
                                        <div class="form-group">
                                            <label for="forname">Nama:</label>
                                            <input name="prname" class="form-control" id="prname" aria-describedby="nameHelp" placeholder="Masukkan Nama" value="{{$data['data']->name}}">
                                        </div>
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="foremail">Email:</label>
                                            <input name="premail" type="email" class="form-control" id="premail" aria-describedby="emailHelp" placeholder="Masukkan email" value="{{$data['data']->email}}">
                                        </div>
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="foroldpassword">Password Lama:</label>
                                            <input name="oldpassword" type="password" class="form-control" id="oldpassword" placeholder="Password Lama">
                                            <small id="emailHelp" class="form-text text-muted">Kosongkan apabila tidak mengubah password.</small>
                                        </div>
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="forpassword">Password Baru:</label>
                                            <input name="prpassword" type="password" class="form-control" id="prpassword" placeholder="Password Baru">
                                            <small id="emailHelp" class="form-text text-muted">Kosongkan apabila tidak mengubah password.</small>
                                        </div>
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="forrepassword">Password (Ulang):</label>
                                            <input name="prrepassword" type="password" class="form-control" id="prrepassword" placeholder="Password Baru (Ulang)">
                                            <small id="emailHelp" class="form-text text-muted">Kosongkan apabila tidak mengubah password.</small>
                                        </div>
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="forrepassword">Berlangganan Buletin:</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="prberlangganan" value="y" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Saya bersedia Berlangganan Buletin Gurindam</label>
                                            </div>
                                            <small id="emailHelp" class="form-text text-muted">Anda akan menerima Buletin Materi Gurindam apabila Menyetujui.</small>
                                        </div>


                                        
                                        <div class="form-group" style="text-align:right">
                                            &nbsp;
                                            <button type="submit" class="btn btn-primary btn-submit">Update Data Anda</button>
                                        </div>
                                    </form>
                                    <?php ######################## ?>
                                    
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@section('script')
    $(".btn-submit").click(function(e){
        e.preventDefault();
        
        data_=$("#post_pengaturan").serialize();
        data_.replace("&", ",");
        data_.replace("=", ":");
        
        $.ajax({
            url: $(this).closest('form').attr('action'),
            type:$(this).closest('form').attr('method'),
            dataType: "json",
            data:data_ ,
            success: function(data) {
                // alert(data.success);
                //alert(data);
                if($.isEmptyObject(data.errors)){
                    $(".alert-danger").css('display','none');
                    swal({ 
                            html:true,
                            type: 'success',
                            title: 'Success',
                            text: '<span style="font-size:14px">'+ data.success +'</span>',
                    });
                }else{
                    swal({ 
                            html:true,
                            type: 'error',
                            title: 'Error',
                            text:'<span style="font-size:14px">'+ data.errors +'</span>',
                    });
                }
            }
        });
    });
@endsection