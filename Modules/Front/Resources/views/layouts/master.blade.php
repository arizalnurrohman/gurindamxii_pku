<?php 
/*
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Front</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-front', 'Resources//assets/sass/app.scss') }} --}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-front', 'Resources//assets/js/app.js') }} --}}
    </body>
</html>

*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gurindam - Gapura Pembelajaran Individu Aktif Mandiri Sebagai Pusat Pembelajaran ASN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicons -->
  <link href="{{asset('images/logo/favicon.png')}}" rel="icon">
  <link href="{{asset('images/logo/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8c4aa2e648.js" crossorigin="anonymous"></script>

  <!-- =======================================================
  * Template Name: Gp
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{url('/front/')}}"><img src="{{asset('images/logo/logo-gurindam.png')}}">&nbsp;Gurindam<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="{{url('/front/')}}">Home</a></li>
          <?php /*<li><a class="nav-link scrollto" href="{{url('/front/#about')}}">About</a></li>*/ ?>
          <?php /*<li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> */ ?>
          <li><a class="nav-link scrollto {{Request::segment(2)=='materi' ? 'active':''}}<?php /*active*/ ?>" href="{{url('/front/materi/')}}">Materi</a></li>
          <li><a class="nav-link scrollto" href="{{url('/front/#contact')}}">Contact</a></li>
          @auth
            @if (\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user')
            <li class="dropdown"><a href="#" style="color:#fcc353"><span>{{ Session::get('USER_LOGIN.NAME') }}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{url('/front/dashboard/')}}"><i class="fa fa-home fa-lg"></i>Dashboard</a></li>
                <li class="dropdown"><a href="#"><i class="fa fa-list fa-lg"></i><span>Daftarku</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="{{url('/front/daftarku/disukai/sukai')}}"><i class="fa fa-heart fa-lg"></i>Disukai<?php /*(2)*/ ?></a></li>
                    <?php /*<li><a href="{{url('/front/daftarku/ditandai/tandai')}}"><i class="fa fa-thumbtack fa-lg"></i>Ditandai</a></li>*/ ?>
                    <li><a href="{{url('/front/daftarku/daftar_baca/baca')}}"><i class="fa fa-list fa-lg"></i>Daftar Baca</a></li>
                  </ul>
                </li>
                <li><a href="{{url('/front/riwayat_baca')}}"><i class="fa fa-newspaper-o fa-lg"></i>Riwayat Baca</a></li>
                <li><a href="{{url('/front/hubungi_admin')}}"><i class="fa fa-comments-o fa-lg"></i>Hubungi Admin</a></li>
                <li><a href="{{url('/front/pengaturan')}}"><i class="fa fa-gear fa-lg"></i>Pengaturan</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-key fa-lg"></i>Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form> 
                </li>
              </ul>
            </li>
            @endif
          @endauth
          @guest
            <li style="margin-left:20px;" class="login_buttons">
              <a class="nav-link scrollto" href="{{url('/login')}}" style="">Login</a>
            </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      @guest
        <a href="<?php print url('/login'); ?>" class="get-started-btn scrollto login_buttonsx" style="display:none">Login</a>
      @endguest
      
    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="footer-info">
              <h3>Gurindam<span>.</span></h3>
              <p> Jl. Hang Tuah Ujung No. 148 Kel. Sialang Sakti Kec. Tenayan Raya Pekanbaru, Riau 28285 <br><br>
                <strong>Phone:</strong> 0761 787 0006<br>
                <strong>Email:</strong> <a href="mailto:kanreg12.pekanbaru@bkn.go.id">kanreg12.pekanbaru@bkn.go.id</a><br>
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/kanreg12bkn" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/kanreg12bkn/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/kanreg12bkn/" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="https://www.youtube.com/@kanreg12bkn" target="_blank" class="youtube"><i class="bx bxl-youtube"></i></a>
                <a href="https://www.tiktok.com/@kanreg12bkn" target="_blank" class="tiktok"><i class="bx bxl-tiktok"></i></a>
              </div>
            </div>
          </div>

          
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://bkn.go.id/" target="_blank">BKN Pusat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.menpan.go.id/site/" target="_blank">KemenpanRB</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://jdih.bkn.go.id/" target="_blank">JDIH BKN</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://siasn.bkn.go.id/" target="_blank">SIASN</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.bkn.go.id/ppid-bkn/" target="_blank">PPID</a></li>
            </ul>
          </div>
          <?php /*
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> */ ?>

          <div class="col-lg-5 col-md-6 footer-newsletter">
            <h4>Dapatkan Info terbaru</h4>
            <p>Daftarkan Email anda untuk mendapatkan informasi Materi yang baru ditambahkan</p>
            <form action="{{route('post_ajax.post_newsletter')}}" method="post" id="post_newsletter">
              @csrf
              <input type="email" name="email" placeholder="Masukkan Email Anda" class="post_newsletter">
              <input type="submit" value="Daftarkan Email">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Kanreg XII BKN Pekanbaru</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="/assetsi/js/jquery-2.1.4.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <link rel="stylesheet" href="/assetsi/plugins/facebox/facebox.css" />
	<script src="/assetsi/plugins/facebox/facebox.js"></script>

  <link rel="stylesheet" href="/assetsi/css/jquery.gritter.min.css" />
  <script src="/assetsi/js/jquery.gritter.min.js"></script>
  
  <link rel="stylesheet" href="/assetsi/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
  <link rel="stylesheet" href="/assetsi/css/ace-skins.min.css" />
	<link rel="stylesheet" href="/assetsi/css/ace-rtl.min.css" />
  <script src="/assetsi/js/ace-extra.min.js"></script>
  <script src="/assetsi/js/ace-elements.min.js"></script>
	<script src="/assetsi/js/ace.min.js"></script>

  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->

  <link rel="stylesheet" type="text/css" href="/assets/css/jquery.gritter.css" />
  <script type="text/javascript" src="/assets/js/jquery.gritter.js"></script>

  <link rel="stylesheet" href="/assetsi/css/chosen.min.css" />
  <script src="/assetsi/js/chosen.jquery.min.js"></script>
  

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script type="text/javascript">
		jQuery(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '<?php print url('/') ;?>/assetsi/plugins/facebox/loading.gif',
        closeImage   : '<?php print url('/') ;?>/assetsi/plugins/facebox/closelabel.png'
      });
      @yield('script')
      $('#post_newsletter').submit(function(e){
						e.preventDefault(); 
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              success: function(data){
                if($.isEmptyObject(data.errors)){
                  $(".post_newsletter").val('');
                  swal({ 
                    html:true,
                    type: 'success',
                    title: 'Berhasil',
                    text:'<span style="font-size:14px">Grats</span>',
                    text: 'Anda Berhasil mendaftarkan email anda sebagai Berlangganan Informasi Gurindam',
                  });
                }else{
                  swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text:'<span style="font-size:14px">'+ data.errors +'</span>',
                    text: data.errors,
                  });
                }
              },
              error: function(err, exception) {
                swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text: '<span style="font-size:14px">Gagal menambahkan data!</span>',
                  });
              },
            });
					});
      <?php
				if(isset($data['summernote'])){?>
					@foreach($data['summernote'] as $smkey=>$smval)
					$("<?php print $smval['class'] ?>").summernote({
						height: <?php print $smval['height'] ?>
					});
					@endforeach
			<?php } ?>
      <?php
				if(isset($data['new_ajax'])){?>
					<?php print $data['new_ajax']; ?>
				<?php } ?>
      <?php
				if(isset($data['form_ajax_update'])){?>
          $('<?php print $data['form_ajax_update']['theid'] ?>').submit(function(e){
              event.preventDefault();
              var target_addr=$(this).closest('form').attr('action');
              swal({
                title: "Apakah Anda Yakin akan Mengubah Data ?",
                text: "Anda tidak akan dapat mengembalikan Data Setelah diubah!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya, Setujui Ini!",
                cancelButtonText: "Tidak, Tolong Batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm) {
                if (isConfirm) {
                  alert(target_addr);
                  $.ajax({
                    url:target_addr,
                    type:"post",
                    data:new FormData(this), 
                    processData:false,
                    contentType:false,
                    dataType: "json",
                    cache:false,
                    async:false,
                    success: function(data){
                      if($.isEmptyObject(data.errors)){
                        swal({ 
                          type: 'success',
                          title: 'Success',
                          text: 'Anda Berhasil Mengubah Data' + data.success
                        },
                        function(){
                          window.location = data.success;
                        });
                      }else{
                        swal({ 
                          html:true,
                          type: 'error',
                          title: 'Error',
                          text:'<span style="font-size:14px">'+ data.errors +'</span>',
                        });
                      }
                    },
                    error: function(err, exception) {
                      swal({ 
                          html:true,
                          type: 'error',
                          title: 'Error',
                          text: '<span style="font-size:14px">Gagal menambahkan data!</span>',
                        });
                    },
                  });
                } else {
                    swal("Cancelled", "Anda Membatalkan Mengubah data :)", "error");
                }
              });
          });
      <?php }?>  
      <?php
				if(isset($data['form_ajax_upload'])){?>
					$('<?php print $data['form_ajax_upload']['theid'] ?>').submit(function(e){
						e.preventDefault(); 
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              success: function(data){
                if($.isEmptyObject(data.errors)){
                  swal({ 
                    type: 'success',
                    title: 'Success',
                    text: 'Anda Berhasil'
                  },
                  function(){
                    window.location.href = data.success;
                  });
                  // window.location.href = data.success;
                  //window.location = data.success;
                }else{
                  swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text:'<span style="font-size:14px">'+ data.errors +'</span>',
                    text: data.errors,
                  });
                }
              },
              error: function(err, exception) {
                swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text: '<span style="font-size:14px">Gagal menambahkan data!</span>',
                  });
              },
            });
					});
			<?php }?>
        $('.delete-form').on('submit', function(e) {
					e.preventDefault();
					$.ajax({
						type: 'post',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: $(this).data('route'),
						data: {
							'_method': 'delete'
						},
						success: function (response, textStatus, xhr) {
							//alert(response)
							if($.isEmptyObject(response.errors)){
                window.location.href=response.success;
              }else{
                swal({ 
                    html:true,
                    type: 'error',
                    title: 'Error',
                    text: '<span style="font-size:14px">'+response.errors+'</span>',
                  });
              }
						}
					});
				})
        $('#gritter-center').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a centered notification',
						text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});

        if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

    });
    function load_more(haloid){
      var params = new window.URLSearchParams(window.location.search);
      console.log(params);

      data = {
        "cari_filter":params.get('cari_filter[]'),
        "page": params.get('page'),
        "cari_materi":params.get('cari_materi'),
        "_token":$('meta[name="csrf-token"]').attr('content'),
      }
      jQuery.ajax({
          type: 'GET',
          url: "{{url('/front/materi/load_more')}}/"+haloid,
          data: data,
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) { 
            if($.isEmptyObject(data.errors)){
              if(data.count==data.count_all || data.count==0){
                $('.load_more_button').hide();
              }else{
                $('.load_more_button').show();
              }
              
              window.history.pushState('', '', data.return_url);
              $.each( data.success, function( key, value ) {
                var link_materis       ="'"+value.plink+"'";
                var link_materis_list  ="'read_later'";
                var link_materis_love  ="'like'";
                var dt_appmateri='<div class="col-lg-3 col-md-6 d-flex align-items-stretch">'
                        +'<div class="member aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="background-color:#ccc">'
                            +'<div class="member-img">'
                              +'<img src="'+value.img+'" class="img-fluid" alt="">'
                              +'<div class="social" style="display:block; width:100%; background-color:#ccc; padding:5px 0px;">'
                              +'<a class="btn_dtl" title="Tambahkan ke Daftar Baca" onclick="addItemToCart('+link_materis+','+link_materis_list+')"><i class="fa-solid fa-list"></i></a>'
                              +'<a class="btn_dtl" title="Sukai Materi ini" onclick="addItemToCart('+link_materis+','+link_materis_love+')"><i class="fa-solid fa-heart"></i></a>'
                              +'</div>'                            
                            +'</div>'
                                +'<div class="" style="font-size:12px; padding:5px;background-color:#C53A54;height:26px;">'
                                +'<div style="float:left">'
                                  +'<span style="color:#000; background-color:#E6CB90; margin-right:10px; padding:6px 10px ; margin-left:-5px;"><strong>'+value.type+'</strong></span>'
                                  +'<span style="color:#fff;margin-left:-5px;"><i class="fa-solid fa-clock"></i> : '+value.estimate+' menit</span>'
                                +'</div>'
                                +'<div style="float:right">'  
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-comment"></i> '+value.comments+'</a>'
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-star"></i> '+value.star+'</a>'
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-eye"></i> '+value.view+'</a>'
                                +'</div>'    
                            +'</div>'
                            +'<div class="" style="font-size:20px; padding:5px;text-align:right">'
                              +'<i class="fa-solid fa-video"></i>&nbsp;'
                            +'</div>'
                            +'<div class="" style="font-size:15px; padding:5px 0px 0px 15px;margin-top:-20px;">'
                              +'<span style="margin-top:0px;font-weight:bold">'
                                +''+value.cat+''
                              +'</span>'
                            +'</div>'
                            +'<div class="member-info" style="margin-top:0px; padding: 0px 10px 15px 15px;text-align:justify; font-size:13px; font-weight:bold">'
                              +'<a href="'+value.url+'" style="color:#1A3773;">'+value.title+'</a>'
                            +'</div>'
                        +'</div>'
                      +'</div>';
                  $('.data_materi').append(dt_appmateri);    
              });
              
            }else{
              $.gritter.add({
                text: '<div style="text-align:center">Error Guys Didalem</div>',
              });
            }
              
          },
          error: function(err, exception) {
            $.gritter.add({
              text: '<div style="text-align:center">Error Guys</div>',
            });
          },
      });
    }
    function filterCategory(haloid){
      var params = new window.URLSearchParams(window.location.search);
      //alert(params.get('cari_materi'));
      data = {
            "id": haloid,
            "cari_materi":params.get('cari_materi'),
            "_token":$('meta[name="csrf-token"]').attr('content'),
      }
      jQuery.ajax({
          type: 'GET',
          url: "{{url('/front/materi/filter_category')}}/"+haloid,
          data: data,
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) { 
            //alert(data);
            if($.isEmptyObject(data.errors)){
              window.history.pushState('', '', data.return_url);
              $('.data_materi').empty();
              //console.log(data.success);
              // var obj = {
              //   "flammable": "inflammable",
              //   "duh": "no duh"
              // };
              //alert(obj);
              
              $.each( data.success, function( key, value ) {
                //alert( key + ": " + value );
                if(data.count==data.count_all){
                  $('.load_more_button').hide();
                }else{
                  $('.load_more_button').show();
                }
                var link_materis       ="'"+value.plink+"'";
                var link_materis_list  ="'read_later'";
                var link_materis_love  ="'like'";
                
                var dt_appmateri='<div class="col-lg-3 col-md-6 d-flex align-items-stretch">'
                        +'<div class="member aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="background-color:#ccc">'
                            +'<div class="member-img">'
                              +'<img src="'+value.img+'" class="img-fluid" alt="">'
                              +'<div class="social" style="display:block; width:100%; background-color:#ccc; padding:5px 0px;">'
                              +'<a class="btn_dtl" title="Tambahkan ke Daftar Baca" onclick="addItemToCart('+link_materis+','+link_materis_list+')"><i class="fa-solid fa-list"></i></a>'
                              +'<a class="btn_dtl" title="Sukai Materi ini" onclick="addItemToCart('+link_materis+','+link_materis_love+')"><i class="fa-solid fa-heart"></i></a>'
                              +'</div>'                            
                            +'</div>'
                                +'<div class="" style="font-size:12px; padding:5px;background-color:#C53A54;height:26px;">'
                                +'<div style="float:left">'
                                  +'<span style="color:#000; background-color:#E6CB90; margin-right:10px; padding:6px 10px ; margin-left:-5px;"><strong>'+value.type+'</strong></span>'
                                  +'<span style="color:#fff;margin-left:-5px;"><i class="fa-solid fa-clock"></i> : '+value.estimate+' menit</span>'
                                +'</div>'
                                +'<div style="float:right">'  
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-comment"></i> '+value.comments+'</a>'
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-star"></i> '+value.star+'</a>'
                                  +'<a style="color:#FFD584"><i class="fa-regular fa-eye"></i> '+value.view+'</a>'
                                +'</div>'    
                            +'</div>'
                            +'<div class="" style="font-size:20px; padding:5px;text-align:right">'
                              +'<i class="fa-solid fa-video"></i>&nbsp;'
                            +'</div>'
                            +'<div class="" style="font-size:15px; padding:5px 0px 0px 15px;margin-top:-20px;">'
                              +'<span style="margin-top:0px;font-weight:bold">'
                                +''+value.cat+''
                              +'</span>'
                            +'</div>'
                            +'<div class="member-info" style="margin-top:0px; padding: 0px 10px 15px 15px;text-align:justify; font-size:13px; font-weight:bold">'
                              +'<a href="'+value.url+'" style="color:#1A3773;">'+value.title+'</a>'
                            +'</div>'
                        +'</div>'
                      +'</div>';
                  $('.data_materi').append(dt_appmateri);    
              });
              $(".btn_category").removeClass("btn-warning");
              $("#btn_"+data.idx).addClass('btn-warning');
              
            }else{
              $.gritter.add({
                text: '<div style="text-align:center">Error Guys Didalem</div>',
              });
            }
              
          },
          error: function(err, exception) {
            $.gritter.add({
              text: '<div style="text-align:center">Error Guys</div>',
            });
          },
      });
    }
    function addItemToCart(variant_id, type_option) {
      data = {
        "id": variant_id,
        "type_options": type_option
      }
      jQuery.ajax({
        type: 'POST',
        url: "{{url('/front/post_ajax/')}}",
        data: data,
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) { 
          //$(this).css("background", "yellow");
          $.gritter.add({
            text: '<div style="text-align:center"><img src="'+data.ICON+'" width="50px"></div><div style="text-align:justify">Anda ' + data.success + ' Menambahkan <strong style="color:#FFC451">' + data.TITLE + '</strong>  ' + data.NOTE + '.</div>',
          });
        }
      });
    }
    function addRating(obj,id) {
      $.ajax({
        url : "{{url('/front/post_ajax/post_rating/rate_this')}}",
        type : 'POST',
        data : {
            'numberOfWords' : 10
        },
        dataType:'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(data) {              
          $.gritter.add({
            text: '<div style="text-align:center"><img src="/assets/images/check.png" width="50px"></div><div style="text-align:justify">Anda berhasil Memberikan Penilaian Rating dengan Penilaian <strong>Bintang '+obj.value+'</stRong> Untuk Materi <strong>JUDUL_MATERINYA</stRong> test '+id+'.</div>',
          });
          //$('.ratelist').hide();
          $('.count_star').empty();
          $('.count_star').append('4.7 (<i class="fa-solid fa-star" style="color:red;"></i>)');
          //$(".reratelist").css("display", "block");
          $('#rate').focus();   
          
        },
        error : function(request,error)
        {
            alert("Request: "+JSON.stringify(request));
        }
      });
      
      
    }

    //ACCORDION###############################
    var accordion = (function(){
  
    var $accordion = $('.js-accordion');
    var $accordion_header = $accordion.find('.js-accordion-header');
    var $accordion_item = $('.js-accordion-item');
  
    // default settings 
    var settings = {
      // animation speed
      speed: 400,
      
      // close all other accordion items if true
      oneOpen: false
    };
      
    return {
      // pass configurable object literal
      init: function($settings) {
        $accordion_header.on('click', function() {
          accordion.toggle($(this));
        });
        
        $.extend(settings, $settings); 
        
        // ensure only one accordion is active if oneOpen is true
        if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
          $('.js-accordion-item.active:not(:first)').removeClass('active');
        }
        
        // reveal the active accordion bodies
        $('.js-accordion-item.active').find('> .js-accordion-body').show();
      },
      toggle: function($this) {
              
        if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
          $this.closest('.js-accordion')
                .find('> .js-accordion-item') 
                .removeClass('active')
                .find('.js-accordion-body')
                .slideUp()
        }
        
        // show/hide the clicked accordion item
        $this.closest('.js-accordion-item').toggleClass('active');
        $this.next().stop().slideToggle(settings.speed);
      }
    }
  })();

      $(document).ready(function(){
        accordion.init({ speed: 300, oneOpen: true });
      });

      const filterButton = document.getElementById('filterButton');
      const modal = document.getElementById('myModal');
      
      filterButton.addEventListener('click', function () {
          modal.style.display = 'block';
          // Menambahkan class 'modal-open' ke elemen 'body' untuk mencegah scroll
          document.body.classList.add('modal-open');
      });

      // Tutup modal saat tombol "Tutup" di dalam modal diklik
      const closeModalButtons = document.querySelectorAll('#closeModal');

      closeModalButtons.forEach(button => {
          button.addEventListener('click', function () {
              modal.style.display = 'none';
              // Menghapus class 'modal-open' dari elemen 'body' untuk mengaktifkan scroll kembali
              document.body.classList.remove('modal-open');
          });
      });

      // Tutup modal saat mengklik di luar modal
      window.addEventListener('click', function (event) {
          if (event.target === modal) {
              modal.style.display = 'none';
              // Menghapus class 'modal-open' dari elemen 'body' untuk mengaktifkan scroll kembali
              document.body.classList.remove('modal-open');
          }
      });
	</script>

</body>

</html>