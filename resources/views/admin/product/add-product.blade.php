{{--  @extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Thêm sản phẩm</h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.add.product')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="product_id" class="col-form-label">Mã sản phẩm <span class="text-danger">*</span></label>
          <input id="product_id" type="text" name="product_id" placeholder="Enter title"  value="" class="form-control">
          @error('product_id')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
   
        <div class="form-group">
          <label for="nameProduct" class="col-form-label">Tên sản phẩm  <span class="text-danger">*</span></label>
          <input id="nameProduct" type="text" name="nameProduct" placeholder="Enter title"  value="" class="form-control">
          @error('nameProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="desProduct" class="col-form-label">Mô tả</label>
          <textarea class="form-control" id="description" name="desProduct"></textarea>
          @error('desProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="categoryProduct">Tên danh mục <span class="text-danger">*</span></label>
          <select name="categoryProduct" id="categoryProduct" class="form-control">
              <option value="">--Select any category--</option>
              @foreach($categories as $key => $item)
              <option value="{{$item->id}}"> {{$item->name}} </option>
              @endforeach
          </select>
          @error('categoryProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="priceProduct" class="col-form-label">Giá sản phẩm <span class="text-danger">*</span></label>
          <input id="priceProduct" type="number" name="priceProduct" placeholder="Enter price"  value="" class="form-control">
          @error('priceProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="saleOffProduct" class="col-form-label">Mã giảm giá(%)</label>
          <input id="saleOffProduct" type="number" name="saleOffProduct" min="0" max="100" placeholder="Enter sale"  value="" class="form-control">
          @error('saleOffProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="brandProduct">Tên Thương hiệu</label>
          <select name="brandProduct" class="form-control">
              <option value="">--Select Brand--</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="hotProduct">Tình trạng (*)</label>
          <select class="form-control" name="hotProduct" id="hotProduct">
              <option value="0"> No </option>
              <option value="1"> Yes </option>
          </select>
      </div>
        <div class="form-group">
          <label for="qtyProduct">Số lượng <span class="text-danger">*</span></label>
          <input id="qtyProduct" type="number" name="qtyProduct" min="0" placeholder="Enter quantity"  value="" class="form-control">
          @error('qtyProduct')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        {{-- <div class="imput-field">
            <label for="images"></label>
            <div class="input-images" type="file" name="images" id="images"></div>
        </div>
        @error('images')
        <span class="text-danger">{{ $message }}</span>
        @enderror
         --}}
 {{--         <div class="row border p-2">
          <div class="col">
              <div class="input-field">
                  <label for="imageProducts">Ảnh sản phẩm<span class="text-danger">*</span></label>
                  <div class="input-images"
                  type="file"
                  name="imageProducts"
                  id="imageProducts"></div>
              </div>
          </div>
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


@endpush  --}}
  --}}