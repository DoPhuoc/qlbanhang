@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa mã giảm giá</h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.edit.coupon',['id' => $coupons->id])}}">
        @csrf
        <div class="form-group">
          <label for="code" class="col-form-label"> Tên mã code<span class="text-danger">*</span></label>
          <input id="code" type="text" name="code" placeholder="Enter title"  value="{{$coupons->code}}" class="form-control">
       
        </div>        
        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">Hoạt đông</option>
              <option value="0">Không hoạt động</option>
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