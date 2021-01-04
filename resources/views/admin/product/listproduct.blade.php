@extends('admin.admin-layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h2>Danh mục sản phẩm </h2>
            </div>
         
            <div class="col-md-4">
                <form>
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-2 text-right">
                <a href="" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                        class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm</a>
            </div>
        </div>
    </div>
    <!--table-->
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="15%">Tên sản phẩm </th>
                    <th width="15%">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th width="10%">Code</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="10%">Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th width="5%">ID</th>
                    <th width="5%">Tên sản phẩm </th>
                    <th width="5%">Ảnh sản phẩm</th>
                    <th width="10%">Số lượng</th>
                    <th width="10%">Giá sản phẩm</th>
                    <th width="10%">Giảm giá</th>
                    <th width="10%">Code</th>
                    <th width="10%">Mô tả</th>
                    <th colspan="2" width="10%">Hành động</th>
                </tr>
            </tfoot>
           
        </table>
       
    </div>

</div>

@endsection
