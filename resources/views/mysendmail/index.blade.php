<?php
/*
@extends('layouts.app')

@section('content')
hai ini cobay a
@endsection
*/?>
<!doctype html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <title></title>
  <style type="text/css">
 	body {
		width: 100%;
		margin: 0;
		padding: 0;
		-webkit-font-smoothing: antialiased;
	}
	@media only screen and (max-width: 600px) {
		table[class="table-row"] {
			float: none !important;
			width: 98% !important;
			padding-left: 20px !important;
			padding-right: 20px !important;
		}
		table[class="table-row-fixed"] {
			float: none !important;
			width: 98% !important;
		}
		table[class="table-col"], table[class="table-col-border"] {
			float: none !important;
			width: 100% !important;
			padding-left: 0 !important;
			padding-right: 0 !important;
			table-layout: fixed;
		}
		td[class="table-col-td"] {
			width: 100% !important;
		}
		table[class="table-col-border"] + table[class="table-col-border"] {
			padding-top: 12px;
			margin-top: 12px;
			border-top: 1px solid #E8E8E8;
		}
		table[class="table-col"] + table[class="table-col"] {
			margin-top: 15px;
		}
		td[class="table-row-td"] {
			padding-left: 0 !important;
			padding-right: 0 !important;
		}
		table[class="navbar-row"] , td[class="navbar-row-td"] {
			width: 100% !important;
		}
		img {
			max-width: 100% !important;
			display: inline !important;
		}
		img[class="pull-right"] {
			float: right;
			margin-left: 11px;
            max-width: 125px !important;
			padding-bottom: 0 !important;
		}
		img[class="pull-left"] {
			float: left;
			margin-right: 11px;
			max-width: 125px !important;
			padding-bottom: 0 !important;
		}
		table[class="table-space"], table[class="header-row"] {
			float: none !important;
			width: 98% !important;
		}
		td[class="header-row-td"] {
			width: 100% !important;
		}
	}
	@media only screen and (max-width: 480px) {
		table[class="table-row"] {
			padding-left: 16px !important;
			padding-right: 16px !important;
		}
	}
	@media only screen and (max-width: 320px) {
		table[class="table-row"] {
			padding-left: 12px !important;
			padding-right: 12px !important;
		}
	}
	@media only screen and (max-width: 608px) {
		td[class="table-td-wrap"] {
			width: 100% !important;
		}
	}
  </style>
 </head>
 <body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
 	<table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
 		<tr>
        	<td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
				<table>
                	<tr>
                    	<td class="table-td-wrap" align="center" width="608">
                        	<?php /*
                            <div style="font-family: Arial, sans-serif; line-height: 32px; color: #444444; font-size: 13px;">
  								Tidak bisa membaca email ini ???
 		 						<a href="http://127.0.0.1:8000" style="color: #478fca; text-decoration: none; font-size: 14px; background-color: transparent;">
     								Gurindam &rarr;
  								</a>
							</div>*/ ?>

							<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;
										</td>
									</tr>
								</tbody>
							</table>
							
                            @if(isset($details['img']))
							<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
											<table class="table-col" align="left" width="552" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
												<tbody>
													<tr>
														<td class="table-col-td" width="552" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">	
															<div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
																<img width="550px" src="{{$details['img']}}" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;" hspace="0" vspace="0" border="0">
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							@endif
							
							<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
											<table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
												<tbody>
													<tr>
														<td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
															<table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
																<tbody>
																	<tr>
																		<td class="header-row-td" width="528" style="font-size: 28px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 25px; color: #478fca; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left">
																			{{ $details['title'] }}
																		</td>
																	</tr>
																</tbody>
															</table>
                                                            <?php /*
															<table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
																<tbody>
																	<tr>
																		<td class="header-row-td" width="528" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #444444; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">
																			Materi untuk Kategori Promosi yang terdiri dari Sub Materi yang lebih dari satu
																		</td>
																	</tr>
																</tbody>
															</table>*/ ?>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							
							<table class="table-space" height="32" style="height: 32px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-space-td" valign="middle" height="32" style="height: 32px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="center">
											&nbsp;
											<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr>
														<td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;
															
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
											<table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
												<tbody>
													<tr>
														<td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;text-align:justify" valign="top" align="left">
                                                            {{$details['body']}}
                                                            @if(isset($details['read_more']))
                                                            <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: right;margin-top:30px;">
                                                                <a href="{{$details['read_more']}}" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #6fb3e0;">
                                                                Baca lebih lengkap &raquo;
                                                                </a>
                                                            </div>
                                                            @endif
															<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																		<td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;
																			
																		</td>
																	</tr>
																</tbody>
															</table>
															
															<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																		<td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;
																			
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
											<table class="table-col" align="left" width="273" style="padding-right: 18px; table-layout: fixed;" cellspacing="0" cellpadding="0" border="0">
												<tbody>
													<tr>
														<td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
															<table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
																<tbody>
																	<tr>
																		<td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">
																			Sosial Media BKN Kanreg XII
																		</td>
																	</tr>
																</tbody>
															</table>
															
															<div style="font-family: Arial, sans-serif; line-height: 36px; color: #444444; font-size: 13px;">
																<a href="https://twitter.com/kanreg12bkn" target="_blank" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 14px; line-height: 19px; background-color: #6fb3e0;">
																	Twitter
																</a>
																<a href="https://www.facebook.com/kanreg12bkn/" target="_blank" style="color: #6688a6; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #8aafce; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">
																	Facebook
																</a>
																<a href="https://www.instagram.com/kanreg12bkn/" target="_blank" style="color: #b7837a; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #d7a59d; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">
																	Instagram
																</a>
																<br>
																<a href="https://www.youtube.com/@kanreg12bkn" target="_blank" style="color: #6688a6; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #8aafce; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;width:125px">
																	Youtube
																</a>
																<a href="https://www.tiktok.com/@kanreg12bkn" target="_blank" style="color: #b7837a; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #d7a59d; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;width:125px !important">
																	Tiktok
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
											
											<table class="table-col" align="left" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
												<tbody>
													<tr>
														<td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
															<table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
																<tbody>
																	<tr>
																		<td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #478fca; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">
																			Kontak Info
																		</td>
																	</tr>
																</tbody>
															</table>
															
															Phone: 0761 787 0006
															<br>
															Email: kanreg12.pekanbaru@bkn.go.id
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;
											
										</td>
									</tr>
								</tbody>
							</table>
							
							<table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
											<table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;">
												<tbody>
													<tr>
														<td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
															<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																		<td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;
																			
																		</td>
																	</tr>
																</tbody>
															</table>
															
															<div style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px; text-align: center;">
																&copy; 2023 - Gurindam BKN Kanreg XII Pekanbaru
															</div>
															
															<table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																		<td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;
																			
																		</td>
																	</tr>
																</tbody>
															</table>
															
															<div style="font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
																<a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">
																	Berhenti Berlangganan
																</a>
															</div>
															
															<table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																		<td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;
																			
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
								<tbody>
									<tr>
										<td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;
											
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>
 </body>
 </html>