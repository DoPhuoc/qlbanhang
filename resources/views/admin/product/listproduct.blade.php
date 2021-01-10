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
                    <th>Mã sản phẩm</th>
                    <th width="15%">Tên sản phẩm </th>
                    <th width="15%">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th> Tình trạng</th>
                    <th width="10%">Trạng thái</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="20%">Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th width="5%">ID</th>
                    <th>Mã sản phẩm</th>
                    <th width="5%">Tên sản phẩm </th>
                    <th width="5%">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th>Tình trạng</th>
                    <th width="10%">Trạng thái</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="20%">Hành động</th>
                </tr>
            </tfoot>
            <tr>
                <td>1</td>
                <td>FN-LCD-N</td>
                <td>ĐẦU BÁO NHIỆT ATJ-EA</td>
                <td>
                    <img src="./img/product01.png"></img>
                </td>
                <td>100.000VNĐ</td>
                <td>10</td>
                <td>10%</td>
                <td>Mặc định</td>
                <td>Hoạt động</td>
                <td>Sản phẩm hãn abcxyz</td>
                <td>
                  <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.product',['slug','id'])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
                  <button class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
          
                </td>
           
        </table>
       
    </div>

</div>

@endsection
