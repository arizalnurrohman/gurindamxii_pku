                   
                    <style type="text/css">
                        navigate{
                            background:#00bbbb;
                            height:100%;
                            width:100%;
                            overflow:hidden;
                            -webkit-transition:width .2s linear;
                            transition:width .2s linear;
                        }
                        /*
                        .scrollbar a {
                            position:relative;
                            text-decoration:none;
                            font-size: 13px;
                            display:table;
                            width:100%;
                            border-top:1px solid #03A2A2;
                            color:#EF5350;
                        }
                        .scrollbar a.active {
                            background-color:#EF5350;
                            color:white;
                        }
                        .scrollbar .fa {
                            position: relative;
                            width: 70px;
                            height: 36px;
                            text-align: center;
                            top:12px; 
                            font-size:20px;
                        }
                        navigate .navigate-text  {
                            position:relative;
                            top:12px;
                        }
                        
                        .scrollbar a:hover{
                            color:#fff;
                            background-color:#D7AA4F; 
                        }
                        .label{
                            height:30px; 
                            float:left;
                            width:100%;
                            transition:all 0.5s ease;
                            font-family: 'Tangerine', serif;
                            text-align:center;
                            padding-top:10px;
                        }
                        .mid-block{
                            background-color:#076868;
                            text-transform:capitalize;
                            box-shadow:inset 0px 5px 5px -4px rgba(50, 50, 50, 0.55), inset 0px -4px 5px -4px rgba(50, 50, 50, 0.55);;
                        }
                        .scrollbar{
                            width: 100%;
                        }
                        
                        #style-1::-webkit-scrollbar-track{
                            border-radius: 2px;
                        }
                        
                        #style-1::-webkit-scrollbar{
                            width: 5px;
                            background-color: #F7F7F7;
                        }
                        
                        #style-1::-webkit-scrollbar-thumb{
                            border-radius: 10px;
                            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                            background-color: #BFBFBF;
                        }
                        .scrollbar:hover{
                        width: 100%;
                        }
                        */
                        /* THIS IS FOR UL LI MENU*/
                        .scrollbar ul li{
                            display:block;
                            width:100%;
                            padding:8px 5px 8px 5px;
                            background-color:#545151;
                            border-top:1px solid #FFCD6B;
                            color:#FFD700;
                        }
                        .scrollbar ul li a{
                            color:#FFD700;
                        }
                        .scrollbar ul li:hover,.scrollbar ul li a:hover{
                            cursor: pointer;
                            background-color:#ead6af;
                            color:#000 !important;
                        }
                    </style>
                    <div style="width:100%; margin-bottom:10px; text-align:center">
                        <img src="{{asset('storage/profile/356a192b7913b04c54574d18c28d46e6395428ab.jpg')}}" style="width:100%;"> 
                        {{session()->get('USER_LOGIN.NAME')}}<br>
                        {{session()->get('USER_LOGIN.NIP')}}<strong>19900213 202321 1 1016</strong><br>      	
                    </div>
                    <navigate>
                        <div class="scrollbar" id="style-1" style="background: #545151 !important;">
                        <?php /*    
                            <div class="mid-block">
                                <a href=" " style="color:white"><i class="fa fa-home fa-lg"></i><span class="navigate-text">Dashboard</span></a>
                            </div>*/ ?>
                            <?php
                            /* for($x=1;$x<5;$x++){?>
                            <a href="" <?php class="active"  ?>><i class="fa fa-list fa-lg"></i><span class="navigate-text">{{$x}}</span></a>    
                            <?php			
                                }*/
                            ?>
                            <ul style="margin-left:0px;">
                                <li><a href="{{url('/front/dashboard')}}"><i class="fa fa-home fa-lg"></i> Dashboard</a></li>
                                <li><a><i class="fa fa-list fa-lg"></i> Daftarku</a></li>
                                    <ul>
                                        <li><a href="{{url('/front/daftarku/disukai/199002132023211016')}}"><i class="fa fa-heart fa-lg"></i> Disukai (1)</a></li>
                                        <li><a href="{{url('/front/daftarku/ditandai/199002132023211016')}}"><i class="fa fa-thumbtack fa-lg"></i> Ditandai (5)</a></li>
                                        <li><a href="{{url('/front/daftarku/daftar_baca/199002132023211016')}}"><i class="fa fa-list fa-lg"></i> Daftar Baca (10)</a></li>
                                    </ul>
                                <li><a href="{{url('/front/riwayat_baca')}}"><i class="fa fa-newspaper-o fa-lg"></i> Riwayat Baca</a></li>
                                <li><a href="{{url('/front/hubungi_admin')}}"><i class="fa fa-comments-o fa-lg"></i> Hubungi Admin</a></li>
                                <li><a href="{{url('/front/pengaturan')}}"><i class="fa fa-gear fa-lg"></i> Pengaturan</a></li>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-key fa-lg"></i> Logout</a></li>
                            </ul>
                        </div> 
                    </navigate>
                 