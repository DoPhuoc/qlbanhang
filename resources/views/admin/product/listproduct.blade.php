@extends('admin.admin-layout')
@section('content')
<div class="card shadow mb-4">
   

    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-4">
                <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách sản phẩm</h4>
            </div>

            <div class="col-md-4">
                <form>
                    <div class="input-group">

                        <input type="text" class="form-control bg-light border small js-keyword-brand"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="">
                        <div class="input-group-append">
                            <button class="btn btn-primary js-search-brand" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4 ">
                <a href="{{route('admin.add.product')}}"
                    class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                    data-placement="bottom" title="Add User"><i
                    class="fas fa-plus-circle fa-sm text-white-50"></i>  Thêm sản phẩm</a>
            </div>
        </div>
    </div>
    <!--table-->
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="5%">Tên sản phẩm </th>
                    <th width="50%">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th width="10%">Trạng thái</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="20%">Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm </th>
                    <th width="5">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th width="10%">Trạng thái</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="20%">Hành động</th>
                </tr>
            </tfoot>
           
                @foreach($products as $product) 
                <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name_product}}</td>
                <td>
                    <img class="img-fluid zoom " 
                    style="max-width:100%" 
                    src="{{asset('uploads/images/products')}}/{{$product->image}}">
                </td>
                <td>
                    {{$product->quantity}}
                </td>
                <td>{{number_format($product->price).''.'VNĐ'}}</td>
                <td>{{$product->sale_off}}</td>
                <td>
                    @if($product->status=='1')
                    <span class="badge badge-success">Hoạt động</span>
                    @else
                    <span class="badge badge-warning">Không hoạt động</span>
                    @endif
                </td>
                <td>{{$product->description}}</td>
                <td>
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.product',['id' => $product->id])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
          
                </td>
            </tr>
            @endforeach
        </table>
       
    </div>

</div>

@endsection
@push('stylesheets')
  <style>

    .zoom {
      transition: transform .2s; /* Animation */
    }

    .zoom:hover {
      transform: scale(3.2);
    }
  </style>
@endpush
