@extends('admin.admin-layout')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
       
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách Bài viết </h4>
                </div>

                <div class="col-md-4">
                    <form action="{{route('admin.search.post')}}" method="get">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary" ><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 ">
                    <a href="{{route('admin.add.post')}}"
                        class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                        data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm bài viết</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th with="20%">Tiêu đề</th>
                            <th with="20%">Tên danh mục</th>
                            <th with="20%">Tag</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th style="width:10%">Hành động</th>
                        </tr>
                    </thead>
              
                    <tbody>
                  
                            @foreach($posts as $key => $item) 
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                {{$item->post_tag_id}}
                            </td>
                            <td>{{$item->post_cat_id}}</td>
                            <td>
                                <img class="img-fluid zoom img-thumbnail w-20" style="max-width:100%" src="{{asset('uploads/images/posts')}}/{{$item->image}}">
                            </td>
                            <td>{{$item->description}}</td>
                            <td>   @if($item->status=='1')
                                <span class="badge badge-success">Hoạt động</span>
                                @else
                                <span class="badge badge-warning">Không hoạt động</span>
                                @endif</td>
                            <td>
                                <a class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    href="{{ route('admin.edit.post', ['slug'=> $item->slug, 'id'=> $item->id]) }}" data-placement="bottom"><i
                                        class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" href="{{route('admin.delete.post',['id'=>$item->id])}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                            @endforeach
                  
                    

                    </tbody>
                </table>
                <span style="float:right"></span>

            </div>
        </div>
    </div>
@endsection

@push('stylesheets')

  <style>
    div.dataTables_wrapper div.dataTables_paginate{
        display: none;
    }
    .zoom {
      transition: transform .2s; /* Animation */
    }

    .zoom:hover {
      transform: scale(3.2);
    }
  </style>
@endpush