<?php 
/*
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Ipanel</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-ipanel', 'Resources/<?php print url('/') ;?>/assetsi/sass/app.scss') }} --}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-ipanel', 'Resources/<?php print url('/') ;?>/assetsi/js/app.js') }} --}}
    </body>
</html>

*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php print url('/') ;?>/assetsi/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php print url('/') ;?>/assetsi/js/html5shiv.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="skin-2">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Ace Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="<?php print url('/') ;?>/assetsi/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php print url('/') ;?>/assetsi/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php print url('/') ;?>/assetsi/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php print url('/') ;?>/assetsi/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="<?php print url('/') ;?>/assetsi/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php print url('/') ;?>/assetsi/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php print url('/logout'); ?>"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php /*
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								UI &amp; Elements
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Layouts
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Top Menu
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<li class="">
								<a href="typography.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Typography
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Three Level Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item #1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											4th level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					*/ ?>
					<?php
						$arx['pgt'][]="pengetahuan";
						$arx['pgt'][]="pengetahuan_category";
						$arx['pgt'][]="pengetahuan_comments";
						$arx['pgt'][]="pengetahuan_rating";
						$arx['pgt'][]="pengetahuan_highlight";
					?>
					<li class="{{(in_array(Request::segment(2),$arx['pgt']))?'active open':''}}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Materi </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="{{Request::segment(2)=='pengetahuan'? 'active':''}}">
								<a href="{{url('/ipanel/pengetahuan')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{Request::segment(2)=='pengetahuan_category'? 'active':''}}">
								<a href="{{url('/ipanel/pengetahuan_category')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi - Kategori
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{Request::segment(2)=='pengetahuan_comments'? 'active':''}}">
								<a href="{{url('/ipanel/pengetahuan_comments')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi - Komentar
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{Request::segment(2)=='pengetahuan_rating'? 'active':''}}">
								<a href="{{url('/ipanel/pengetahuan_rating')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi - Rating
								</a>
								<b class="arrow"></b>
							</li>
							<li class="{{Request::segment(2)=='pengetahuan_highlight'? 'active':''}}">
								<a href="{{url('/ipanel/pengetahuan_highlight')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi - Highlight
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php
						$arx['nws']['link'][0]="newsletter";
						$arx['nws']['link'][1]="newsletter_subscriber";
						$arx['nws']['link'][2]="newsletter_queue";

						$arx['nws']['name'][0]="News Letter";
						$arx['nws']['name'][1]="News Letter Subscriber";
						$arx['nws']['name'][2]="News Letter Queue";

						$arx['nws']['icon'][0]="News Letter";
						$arx['nws']['icon'][1]="News Letter Subscriber";
						$arx['nws']['icon'][2]="News Letter Queue";
					?>
					<li class="{{(in_array(Request::segment(2),$arx['nws']['link']))?'active open':''}}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-newspaper-o"></i>
							<span class="menu-text"> News Letter </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<?php 
							foreach($arx['nws']['name'] as $key=>$vals){?>
							<li class="{{Request::segment(2)==$arx['nws']['link'][$key]? 'active':''}}">
								<a href="{{url('/ipanel/'.$arx['nws']['link'][$key])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									{{$vals}}
								</a>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php
						$arx['mbr']['link'][0]="member";
						$arx['mbr']['link'][1]="member_new";

						$arx['mbr']['name'][0]="Member";
						$arx['mbr']['name'][1]="Member Baru";

						$arx['mbr']['icon'][0]="Member";
						$arx['mbr']['icon'][1]="Member Baru";
					?>
					<li class="{{(in_array(Request::segment(2),$arx['mbr']['link']))?'active open':''}}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text"> Member </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<?php 
							foreach($arx['mbr']['name'] as $key=>$vals){?>
							<li class="{{Request::segment(2)==$arx['mbr']['link'][$key]? 'active':''}}">
								<a href="{{url('/ipanel/'.$arx['mbr']['link'][$key])}}">
									<i class="menu-icon fa fa-caret-right"></i>
									{{$vals}}
								</a>
								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					

                    <li class="{{Request::segment(2)=='hubungi_admins'? 'active':''}}">
						<a href="{{url('/ipanel/hubungi_admins')}}">
							<i class="menu-icon fa fa-comments-o"></i>
							<span class="menu-text"> Hubungi Admin </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="{{Request::segment(2)=='contact_us'? 'active':''}}">
						<a href="{{url('/ipanel/contact_us')}}">
							<i class="menu-icon fa fa-envelope-o"></i>
							<span class="menu-text"> Contact Us </span>
						</a>
						<b class="arrow"></b>
					</li>
					<!-- THIS IS MENU FOR REAL -->
                    <?php /*
					<li class="{{(Request::segment(2)=='categoripembelajaran' or Request::segment(2)=='mpembelajaran')?'active open':''}}">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Pembelajaran </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                            <li class="{{Request::segment(2)=='categoripembelajaran'? 'active':''}}">
								<a href="<?php print url('/ipanel/categoripembelajaran'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Kategori Materi Pembelajaran
								</a>

								<b class="arrow"></b>
							</li>

                            <li class="{{Request::segment(2)=='mpembelajaran'? 'active':''}}">
							<a href="<?php print url('/ipanel/mpembelajaran'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Materi Pembelajaran
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jqgrid.html">
									<i class="menu-icon fa fa-caret-right"></i>
									jqGrid plugin
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li> */ ?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Other Pages</a>
							</li>
							<li class="active">Blank Page</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                @yield('content')
								<!-- PAGE CONTENT ENDS -->
								<?php /*<div id="loader"></div>*/ ?>
								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php print url('/') ;?>/assetsi/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php print url('/') ;?>/assetsi/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php print url('/') ;?>/assetsi/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php print url('/') ;?>/assetsi/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php print url('/') ;?>/assetsi/js/ace-elements.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- summernote css/js -->
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

		<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  		<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />

		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/plugins/facebox/facebox.css" />
		<script src="<?php print url('/') ;?>/assetsi/plugins/facebox/facebox.js"></script>

		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/select2.min.css" />
		<script src="<?php print url('/') ;?>/assetsi/js/select2.min.js"></script>

		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/jquery.gritter.min.css" />
		<script src="<?php print url('/') ;?>/assetsi/js/jquery-ui.custom.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/jquery.ui.touch-punch.min.js"></script>

		<?php #DATE TIME PICKER ?>
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php print url('/') ;?>/assetsi/css/bootstrap-colorpicker.min.css" />
		
		<script src="<?php print url('/') ;?>/assetsi//js/bootstrap-datepicker.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/moment.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/daterangepicker.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php print url('/') ;?>/assetsi/js/bootstrap-colorpicker.min.js"></script>

		<script type="text/javascript">
			jQuery(function($) {
				$('a[rel*=facebox]').facebox({
					loadingImage : '<?php print url('/') ;?>/assetsi/plugins/facebox/loading.gif',
					closeImage   : '<?php print url('/') ;?>/assetsi/plugins/facebox/closelabel.png'
				});
				<?php
				if(isset($data['new_ajax'])){?>
					<?php print $data['new_ajax']; ?>
				<?php } ?>
				<?php
				if(isset($data['summernote'])){?>
					@foreach($data['summernote'] as $smkey=>$smval)
					$("<?php print $smval['class'] ?>").summernote({
						height: <?php print $smval['height'] ?>
					});
					@endforeach
				<?php } ?>
				<?php
				if(isset($data['select2combo'])){?>
					$('.<?php print $data['select2combo']?>').select2();
				<?php }?>
				<?php
				if(isset($data['form_ajax_upload'])){?>
					$('<?php print $data['form_ajax_upload']['theid'] ?>').submit(function(e){
						e.preventDefault(); 
						<?php /*
						var spinner = $('#loader');
						spinner.show(); */?>
						var btnx	=$('<?php print $data['form_ajax_upload']['thebutton'] ?>');
						$(btnx).attr("disabled", true);
						$(btnx).attr({type:'submit',value: 'Loading'});
						$.ajax({
							url:$(this).closest('form').attr('action'),
							type:"post",
							data:new FormData(this), //this is formData
							processData:false,
							contentType:false,
							dataType: "json",
							cache:false,
							async:false,
							success: function(data){
								// console.log(data);
								// alert(data);
								if($.isEmptyObject(data.errors)){
									window.location.href = data.success;
									//window.location = data.success;
								}else{
									<?php /*spinner.hide();*/ ?>
									$(btnx).removeAttr("disabled");
									$(btnx).attr({type:'submit',value: 'Simpan'});
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
								<?php /*spinner.hide();*/ ?>
								$(btnx).removeAttr("disabled");
								$(btnx).attr({type:'submit',value: 'Simpan'});
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
				<?php
				if(isset($data['file_upload_theme_two'])){?>
					$('.<?php print $data['file_upload_theme_two'] ?>').ace_file_input({
						style: 'well',
						btn_choose: 'Silahkan Klik untuk Memilih File Unggahan,',
						btn_change: null,
						no_icon: 'ace-icon fa fa-cloud-upload',
						droppable: false,
						thumbnail: 'small'//large | fit
						//,icon_remove:null//set null, to hide remove/reset button
						/**,before_change:function(files, dropped) {
							//Check an example below
							//or examples/file-upload.html
							return true;
						}*/
						/**,before_remove : function() {
							return true;
						}*/
						,
						preview_error : function(filename, error_code) {
							//name of the file that failed
							//error_code values
							//1 = 'FILE_LOAD_FAILED',
							//2 = 'IMAGE_LOAD_FAILED',
							//3 = 'THUMBNAIL_FAILED'
							//alert(error_code);
						}
				
					}).on('change', function(){
						//console.log($(this).data('ace_input_files'));
						//console.log($(this).data('ace_input_method'));
					});
				<?php }?>

				<?php
				if(isset($data['datetime_picker'])==TRUE){?>
					if(!ace.vars['old_ie']) $('.<?php print $data['datetime_picker'] ?>').datetimepicker({
						format: 'DD/MM/YYYY HH:mm:ss',//use this option to display seconds
						icons: {
							time: 'fa fa-clock-o',
							date: 'fa fa-calendar',
							up: 'fa fa-chevron-up',
							down: 'fa fa-chevron-down',
							previous: 'fa fa-chevron-left',
							next: 'fa fa-chevron-right',
							today: 'fa fa-arrows ',
							clear: 'fa fa-trash',
							close: 'fa fa-times'
						}
						}).next().on(ace.click_event, function(){
							$(this).prev().focus();
						});
				<?php }?>

				$('.deletes').click(function(event){
					event.preventDefault();
						var target_addr=$(this).attr('href');
						swal({
							title: "Apakah Anda Yakin akan Menghapus Data ?",
							text: "Anda tidak akan dapat mengembalikan Data Setelah Dihapus!",
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
								$.get(target_addr,function(data){
									if($.isEmptyObject(data.errors)){
										swal({ 
											type: 'success',
											title: 'Success',
											text: 'Anda Berhasil Menghapus Data' 
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
								})
							} else {
									swal("Cancelled", "Anda Membatalkan Menghapus data :)", "error");
							}
						});
				});

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
							window.location.href=response.success;
						}
					});
				})
			});
		</script>
	</body>
</html>