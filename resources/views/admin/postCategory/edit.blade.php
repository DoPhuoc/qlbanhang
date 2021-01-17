@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa danh mục </h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.edit.postCategory',['id' => $postCategory->id])}}">
        @csrf
        <div class="form-group">
          <label for="nameCate" class="col-form-label">Tên danh mục<span class="text-danger">*</span></label>
          <input id="nameCate" type="text" name="nameCate"   value="{{$postCategory->title}}" placeholder="Enter title"  value="" class="form-control">
          @error('nameCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="descCate" class="col-form-label">Mô tả</label>
          <textarea class="form-control" type="text" value="" name="descCate">
            {!! $postCategory->description !!}</textarea> 
          @error('descCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>   
        <div class="form-group">
          <label for="status" class="col-form-label">Trạng thái<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{$postCategory->status == 1 ? 'selected' : ''}}>Hoạt động</option>
            <option value="0" {{$postCategory->status == 0 ? 'selected' : ''}}>Không hoạt động</option>
          </select>
        </div>
          <input type="hidden" name="hddIDCategory" value="{{$postCategory->id}}"/>
           <button class="btn btn-success" type="submit">Cập nhập </button>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 120
      });
    });
</script>


@endpush
