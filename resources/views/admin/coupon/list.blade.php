@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
       
         </div>
     </div>
    <div class="card-header py-3">
      <h4 class="m-0 font-weight-bold text-primary float-left">Danh mục Mã giảm giá</h4>
      <a href="" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã code</th>
              <th>Tình trạng</th>
              <th>Hành động</th>
            </tr>
          </thead>
     
          <tbody>
          
              @foreach($coupons as $key => $item) 
          </>
              <td>{{$item->id}}</td>
              <td>{{$item->code}}</td>
              <td>
                @if($item->status=='1')
                <span class="badge badge-success">Hoạt động</span>
                @else
                <span class="badge badge-warning">Không hoạt động</span>
                @endif
              </td>
              <td>
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.coupon',['id' => $item->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="{{route('admin.delete.coupon',['id'=>$item->id])}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
        
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
