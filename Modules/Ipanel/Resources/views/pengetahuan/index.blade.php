@extends('ipanel::layouts.master')

@section('content')
    <div class="page-header">
        <h1>Pengetahuan
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i> isi dari page desctiption 
            </small>
        </h1>
    </div>
    
    <div style="text-align:left; margin-bottom:20px;">
        <a href="{{route('pengetahuan.create')}}" class="btn btn-primary">Tambah Pengetahuan</a>
    </div>
    <div class="widget-box">
        <div class="widget-header widget-header-small">
            <h5 class="widget-title lighter">Search Form</h5>
        </div>
    
        <div class="widget-body">
            <div class="widget-main">
                <form class="form-search" action="<?php #print baseurl()."ipanel/".$this->uri->segment(2)."/" ?>" method="get">
                    <div class="row">
                        
                        <div class="box col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-check"></i>
                                </span>
    
                                <input type="text" class="form-control search-query" placeholder="Ketik Pencarian" name="search" value="<?php print isset($_GET['search']) ? $_GET['search'] : ''; ?>">
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
    </div>

    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="center" style="width:35px;">#</th>
                <th style="width:80px" class="hidden-480">Gambar</th>
                <th>Pengetahuan</th>
                <th style="width:20px;"><i class="fa fa-eye bigger-120"></i></th>
                <th style="width:20px;"><i class="fa fa-comments bigger-120"></i></th>
                <th style="max-width:80px">&nbsp</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            #for($x=1;$x<5;$x++){?>
            @foreach($data['data'] as $catkey=>$catpem)
            @php
                $comments   = Modules\Ipanel\Http\Controllers\PengetahuanController::get_count($catpem->pgId);
            @endphp
            <tr>
                <td class="center">{{($data['data']->currentPage() - 1) * $data['data']->perPage() + $loop->iteration}}</td>
                <td class="hidden-480">
                    @if($catpem->pgImage)
                        <?php #<a href="{{url($data_category['assets_storage']).'/'.$catpem->catImage}}" rel="facebox"> ?>   
                        <a href="{{asset('storage/images/assets_pengetahuan/'.$catpem->pgImage)}}" rel="facebox">    
                            <?php /*<img src="{{asset('storage/images/assets_pengetahuan/'.$catpem->pgImage)}}" width="75">*/ ?>
                            <?php /*<img src="{{route('pengetahuan.displayImage', $catpem->pgPermalink)}}" alt ="abc" title ="acb" width="75"> */ ?>
                            <?php /*<img src="/storage/images/assets_pengetahuan/{{$catpem->pgImage}}" alt="..." width="75">*/ ?>
                            <?php /*<img src='{{storage_path("/public/images/assets_pengetahuan/$catpem->pgImage")}}' width='75'>
                            <br>*/ ?>
                            <?php /*<img src="{{asset('storage/images/assets_pengetahuan/'.$catpem->pgImage)}}" width="75">*/ ?>
                            <img src="{{url('/storage/images/assets_pengetahuan/'.$catpem->pgImage)}}" alt="{{$catpem->pgTitle}}" width="75">
                            <br>
                        </a>
                    @endif
                </td>
                <td>
                    <a href="{{route('pengetahuan.show',$catpem->pgPermalink)}}"><strong>{{$catpem->pgTitle}}</strong></a><br>
                    <em><strong>{{date("d M Y",strtotime($catpem->pgTimePost))}}</strong></em><br>
                    <em>{!!$catpem->pgDescription!!}</em><br>
                    <?php
                        /*
                        print_r(scandir(storage_path()));
                        print "<hr>";
                        print_r(scandir(storage_path("app")));
                        */
                        ?>
                </td>
                <td>{{$catpem->pgViewed}}</td>
                <td>{{$comments}}</td>
                <td>
                    <div class="hidden-sm hidden-xs btn-group">
                        <a href="{{route('pengetahuan.edit',$catpem->pgPermalink)}}" title="Edit Pengetahuan">
                            <button class="btn btn-mini btn-info">
                            <i class="fa fa-pencil bigger-120"></i>
                            </button>
                        </a>
                        <?php /*
                        <form action="{{route('pengetahuan.destroy',$catpem->catPermalink)}}" class="deletes" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                        </form>*/?>
                        <?php /*
                        <a href="{{route('pengetahuan.destroy',$catpem->catPermalink)}}" title="Data Pengetahuan Kategori" class="deletes">
                            <button class="btn btn-mini btn-danger">
                            <i class="fa fa-trash bigger-120"></i>
                            </button>
                        </a>
                        */ ?>
                        <form method="POST" class="delete-form" data-route="{{route('pengetahuan.destroy',$catpem->pgPermalink)}}" style="display:inline" onCLick="return confirm('Apakah anda yakin akan menghapus data ??')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-mini btn-danger"><i class="fa fa-trash bigger-120"></i></button>
                        </form>
                        <a href="{{route('pengetahuan.show',$catpem->pgPermalink)}}" title="Data Detail Pengetahuan">
                            <button class="btn btn-mini btn-warning" style="width:59px;margin-top:4px;">
                            <i class="fa fa-list bigger-120"></i>
                            </button>
                        </a>

                        <a href="{{route('pengetahuan.add_newsletter',$catpem->pgPermalink)}}" title="Data Detail Pengetahuan" class="addnewsletter">
                            <button class="btn btn-mini" style="width:59px;margin-top:4px;">
                                <i class="fa fa-plus bigger-120"></i>
                                <i class="fa fa-newspaper-o bigger-120"></i>
                            </button>
                        </a>
                    </div>
                    <div class="hidden-md hidden-lg">
                        <div class="inline pos-rel">
                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                <i class="ace-icon fa fa-cog icon-only bigger-120"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                    <a href="{{route('pengetahuan.edit',$catpem->pgPermalink)}}" class="tooltip-info" data-rel="tooltip" title="Edit">
                                        <span class="blue">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Hapus">
                                        <span class="green">
                                            <i class="ace-icon fa fa-trash bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('pengetahuan.show',$catpem->pgPermalink)}}" class="tooltip-error" data-rel="tooltip" title="Data Detail Pengetahuan">
                                        <span class="red">
                                            <i class="ace-icon fa fa-list bigger-120"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('pengetahuan.add_newsletter',$catpem->pgPermalink)}}" class="tooltip-error addnewsletter" data-rel="tooltip" title="Tambahkan kedalam News Letter">
                                        <span class="red">
                                            <i class="ace-icon fa fa-newspaper-o bigger-120"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </td>
            </tr>
            <?php
            #} ?>
            @endforeach
        </tbody>
    </table>
    {{$data['data']->links()}}
@endsection
