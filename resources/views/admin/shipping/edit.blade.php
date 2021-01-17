@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa phí ship </h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.edit.shipping',['id' => $shipping->id])}}">
 
        @csrf
        <div class="form-group">
          <label for="title" class="col-form-label">Tên <span class="text-danger">*</span></label>
          <input id="title" type="text" name="title" placeholder="Enter title"  value="{{$shipping->title}}" class="form-control">
       
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Giá</label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{$shipping->price}}" class="form-control">
     
        </div>

     
        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{$shipping->status == 1 ? 'selected' : ''}}>Hoạt động</option>
              <option value="0" {{$shipping->status == 0 ? 'selected' : ''}}>Không hoạt động</option>
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

