@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Thêm phí ship</h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.add.shipping')}}">
        @csrf
        <div class="form-group">
          <label for="title" class="col-form-label">Tên <span class="text-danger">*</span></label>
          <input id="title" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
       
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Giá</label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
     
        </div>

     
        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">Hoạt động</option>
              <option value="0">Không hoạt động</option>
          </select>
     
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Quay lại</button>
           <button class="btn btn-success" type="submit">Cập nhập </button>
        </div>
      </form>
    </div>
</div>

@endsection

