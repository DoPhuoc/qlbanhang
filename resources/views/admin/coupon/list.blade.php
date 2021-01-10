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
      <a href="{{route('admin.add.category')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hoạt động</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>STT</th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hoạt động</th>    
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>1</td>
              <td>Báo và chữa cháy HOCHIKI</td>
              <td>
                  Bán các loại sản phẩm hochiki 
              </td>
              <td>
                <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.category',['slug','id'])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <button class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
        
              </td>
          </tr>  
           
          </tbody>
        </table>
        <span style="float:right"></span>
       
      </div>
    </div>
</div>
@endsection
