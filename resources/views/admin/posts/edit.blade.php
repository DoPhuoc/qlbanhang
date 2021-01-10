@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa bài viết</h5>
    <div class="card-body">
      <form method="post" action="">
 
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tiêu đề <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="" class="form-control">
       
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Tên danh mục</label>
          <select name="danhmuc" class="form-control">
            <option> danh mục 1 </option>
            </select>
        </div>
        <div class="form-group">
          <label for="tagz" class="col-form-label">Tag</label>
          <select name="status" class="form-control">
            <option>tag 1 </option>
            </select>
        </div>
        <div class="form-group">
    
            <label for="description" class="col-form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        
          </div>
     
          <div class="form-group">
      
            <label for="imageProducts">Ảnh sản phẩm<span class="text-danger">*</span></label>
            <div class="input-images" type="text" name="imageProducts" id="imageProducts"></div>
        </div>
     
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Hoạt động</option>
              <option value="inactive">Không hoạt động</option>
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
@push('stylesheets')
<link rel="stylesheet" href="{{asset('backend/summernote-0.8.18-dist/summernote.min.css')}}">
@endpush
@push('javascripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote-0.8.18-dist/summernote.min.js')}}"></script>
<script>
    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 120
      });
    });
    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    $('.input-images').imageUploader();
</script>


@endpush