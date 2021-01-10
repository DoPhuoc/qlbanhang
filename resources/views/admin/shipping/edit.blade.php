@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa phí ship </h5>
    <div class="card-body">
      <form method="post" action="">
 
        <div class="form-group">
          <label for="inputTitle" class="col-form-label"> Tên danh mục<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="" class="form-control">
       
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">giá</label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
     
        </div>

     
        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Hoạt đông</option>
              <option value="inactive">Không hoạt động</option>
          </select>
     
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Quay lại</button>
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection

