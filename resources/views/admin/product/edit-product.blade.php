@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa sản phẩm</h5>
    <div class="card-body">
      <form method="" action="">
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên sản phẩm  <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="" class="form-control">   
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Mã sản phẩm  <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="" class="form-control">   
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Tiêu đề<span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary"></textarea>
       
        </div>

        <div class="form-group">
    
          <label for="description" class="col-form-label">Mô tả</label>
          <textarea class="form-control" id="description" name="description"></textarea>
      
        </div>



        <div class="form-group">
          <label for="cat_id">Tên danh mục <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--Select any category--</option>
         
          </select>
        </div>

       {{--   <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">Sub Category</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--Select any category--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach 
          </select>
        </div> --}}

        <div class="form-group">
          <label for="price" class="col-form-label">Giá sản phẩm <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="" class="form-control">
   
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">Mã giảm giá(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="" class="form-control">
  
        </div>
        <div class="form-group">
          <label for="size">Size</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--Select any size--</option>
              <option value="S">Small (S)</option>
              <option value="M">Medium (M)</option>
              <option value="L">Large (L)</option>
              <option value="XL">Extra Large (XL)</option>
          </select>
        </div>

        <div class="form-group">
          <label for="brand_id">Tên Thương hiệu</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--Select Brand--</option>
          
          </select>
        </div>

        <div class="form-group">
          <label for="condition">Tình trạng</label>
          <select name="condition" class="form-control">
              <option value="">--Select Condition--</option>
              <option value="default">Default</option>
              <option value="new">New</option>
              <option value="hot">Hot</option>
          </select>
        </div>

        <div class="form-group">
          <label for="stock">Số lượng <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="" class="form-control">
 
        </div>
        <div class="form-group">
      
            <label for="imageProducts">Ảnh sản phẩm<span class="text-danger">*</span></label>
            <div class="input-images" type="text" name="imageProducts" id="imageProducts"></div>
        </div>
     
     

        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
         
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Quay lại</button>
           <button class="btn btn-success" type="submit">Cập nhập</button>
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