@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
          @if(session('success'))
          <div class="alert alert-success alert-dismissable fade show">
                 <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                 {{session('success')}}
             </div>
         @endif
       
       
         @if(session('error'))
             <div class="alert alert-danger alert-dismissable fade show">
                 <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                 {{session('error')}}
             </div>
         @endif
         </div>
     </div>

    <div class="card-header py-3">
      <div class="row">
          <div class="col-md-4">
              <h4 class="m-0 font-weight-bold text-primary float-left">Tag</h4>
          </div>
      
          <div class="col-md-4">
              <form action="{{route('admin.search.tag')}}" method="get">
                  <div class="input-group">
                      <input type="search" name="search" class="form-control">
                      <span class="input-group-prepend">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </span>
                  </div>
              </form>
          </div>
          <div class="col-md-4">
              <a href="{{ route('admin.add.tag') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"><i
                      class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm</a>
          </div>
      </div>
  </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên tag</th>
              <th>Mô tả </th>
              <th>Tình trạng</th>
              <th>Hoạt động</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>

              @foreach($tags as $key => $item) 
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
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.tag',['slug' => $item->slug, 'id' => $item->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="{{route('admin.delete.tag',['id'=>$item->id])}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
              @endforeach

          </tr>  
           
          </tbody>
        </table>
        <span style="float:right">
          {{ $tags->appends(request()->query())->links() }}
        </span>
       
      </div>
    </div>
</div>
@endsection

