@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa danh mục </h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.edit.category',['id' => $categories->id])}}">
        @csrf
        <div class="form-group">
      
          <label for="nameCate" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="nameCate" type="text" name="nameCate"   value="{{$categories->name}}" placeholder="Enter title"  value="" class="form-control">
          @error('nameCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="descCate" class="col-form-label">Mô tả</label>
          <textarea class="form-control"  type="text" name="descCate">
            {!! $categories->description !!}
          </textarea>
          @error('descCate')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

     
        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{$categories->status == 1 ? 'selected' : ''}}>Hoạt động</option>
            <option value="0" {{$categories->status == 0 ? 'selected' : ''}}>Không hoạt động</option>
          </select>
     
        </div>
        <input type="hidden" name="hddId" value="{{$categories->id}}"/>
      
           <button class="btn btn-success" type="submit">Cập nhật</button>
    
      </form>
    </div>
</div>

@endsection
