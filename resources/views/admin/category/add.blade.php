@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Thêm danh mục</h5>
    <div class="card-body">
      <form method="post" action="{{ route('admin.handle.add.category')}}">
        @csrf
        <div class="form-group">
          <label for="nameCate" class="col-form-label">Tên danh mục <span class="text-danger">*</span></label>
          <input id="nameCate" type="text" name="nameCate"   value="{{ old('nameCate') }}" placeholder="Enter title"  value="" class="form-control">
          @error('nameCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="descCate" class="col-form-label">Mô tả</label>
          <textarea class="form-control" type="text" value="{{ old('descCate') }}" name="descCate"></textarea> 
          @error('descCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
     
        
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái<span class="text-danger">*</span></label>
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
