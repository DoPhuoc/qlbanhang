@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">

         </div>
     </div>
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary float-left">Danh mục sản phẩm</h4>
      <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>

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
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hoạt động</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hoạt động</th>
              <th>Hành động</th>
            </tr>
          </tfoot>
          <tbody>

              @foreach($categories as $category)
              <tr>
              <td>{{$category->id}}</td>
              <td>  <a href="{{ route('admin.category.edit', ['slug' =>  $category->slug, 'id' =>  $category->id]) }}">
                {{ $category->name }}
                    </a>
              </td>
              <td>
                {!! $category->description !!}
              </td>
              <td>
                @if($category->status=='1')
                <span class="badge badge-success">Hoạt động</span>
                @else
                <span class="badge badge-warning">Không hoạt động</span>
                @endif
              </td>
              <td>
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.category.edit',['slug' =>  $category->slug, 'id' =>  $category->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                  <form
                      action="{{route('admin.category.destroy',$category->id)}}"
                      method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-sm"
                              style="height:30px; width:30px;border-radius:50%"
                              type="submit"
                              data-toggle="tooltip"
                              data-placement="bottom"
                              title="Delete"><i
                              class="fas fa-trash-alt"></i>
                      </button>
                  </form>

              </td>
            </tr>
              @endforeach

          </tbody>
        </table>
        <span style="float:right"></span>
               {{-- Hien thi phan trang --}}
               {{ $categories->links() }}
      </div>
    </div>
</div>
@endsection
