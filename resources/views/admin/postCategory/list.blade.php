@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
 
    <div class="card-header py-3">
      <div class="row">
      <div class="col-md-4">
      <h6 class="m-0 font-weight-bold text-primary float-left">Danh mục  Bài viết </h6>
      </div>
      <div class="col-md-4">
        <form  action="{{route('admin.search.postCategory')}}" method="get">
          <div class="input-group">
            <input type="search" name="search" class="form-control">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary" ><i class="fas fa-search"></i></button>
            </span>
            </div>
        </form>

    </div>
    <div class="col-md-4">
      <a href="{{route('admin.add.postCategory')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm bài viết</a>
    </div>
    </div>
  </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th >Tên danh mục</th>
              <th>Mô tả</th>
              <th>Tình trạng</th>
              <th>Hành động</th>
            </tr>
          </thead>
        
          <tbody>
          @foreach($postCategory as $key => $item) 
          <tr>
          <td>{{$item->id}}</td>
          <td>   
              {{ $item->title }}
          </td>
          <td>
              {!! $item->description !!}
          </td>
          <td>
              @if($item->status=='1')
              <span class="badge badge-success">Hoạt động</span>
              @else
              <span class="badge badge-warning">Không hoạt động</span>
              @endif
          </td>
          <td>
              <a class="btn btn-primary btn-sm float-left mr-1" 
              style="height:30px; width:30px;border-radius:50%" 
              data-toggle="tooltip" title="edit"
              href="{{route('admin.edit.postCategory',['slug' => $item->slug,'id' => $item->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
          
              <a class="btn btn-danger btn-sm" href="{{route('admin.delete.postCategory',['id'=>$item->id])}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
          </td>
          @endforeach
          </tbody>
        </table>
        <span style="float:right"></span>
       
      </div>
    </div>
</div>
@endsection

