@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
       
         </div>
     </div>

    <div class="card-header py-3">
      <div class="row">
          <div class="col-md-4">
              <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách phí ship</h4>
          </div>
      
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
              <a href="{{ route('admin.add.shipping') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"><i
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
              <th>Tên </th>
              <th>Giá </th>
              <th>Tình trạng</th>
              <th>Hoạt động</th>
            </tr>
          </thead>
       
          <tbody>
            @foreach($shippings as $key => $item)  
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->title}}</td>
              <td>
                {{number_format($item->price).''.'VNĐ'}}
              </td>
              <td>
                @if($item->status=='1')
                        <span class="badge badge-success">Hoạt động</span>
                        @else
                        <span class="badge badge-warning">Không hoạt động</span>
                        @endif
              </td>
              <td>
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.shipping',['id'=> $item->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                href="{{route('admin.delete.shipping',['id'=> $item->id])}}" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
        
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

