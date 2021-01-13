@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Thêm tag</h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.handle.add.tag')}}">
        @csrf
        <div class="form-group">
          <label for="titleTag" class="col-form-label"> Tên tag<span class="text-danger">*</span></label>
          <input id="titleTag" type="text" name="titleTag" placeholder="Enter title"  value="{{ old('titleTag') }}" class="form-control">
        @error('titleTag')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="descTag">Mô tả</label>
            <textarea class="form-control" id="descTag" value="{{ old('descTag') }}"name="descTag" rows="8"></textarea>
        </div>
        @error('descTag')
        <span class="text-danger">{{ $message }}</span>
        @enderror
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

