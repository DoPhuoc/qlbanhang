@extends('admin.admin-layout')

@section('content')
<div class="card cart-container shadow mb-4">
    <!-- Page Heading -->
    <div class="card-header mb-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa thương hiệu:{{ $infoBrand->name }}</h1>
        <a href="{{route('admin.brand')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Danh sách thương hiệu</a>
    </div>
    
    </div>
    <!-- Content Row -->
    <div class="card-body">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-md-12 mb-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(!empty($message))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif

            <form action="{{route('admin.update.brand')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nameBrand">Tên thương hiệu</label>
                    <input  class="form-control" 
                    value="{{$infoBrand->name}}"
                    type="text" 
                    id="nameBrand" 
                    name="nameBrand"/>
                </div>
                <div class="form-group">
                    <label for="descBrand">Mô tả</label>
                    <textarea class="form-control" id="descBrand" name="descBrand" rows="8">{!! $infoBrand->description !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{$infoBrand->status == 1 ? 'selected' : ''}}>Hoạt động</option>
                        <option value="0" {{$infoBrand->status == 0 ? 'selected' : ''}}>Không hoạt động</option>
                    </select>
                </div>
                <input type="hidden" name="hddIdBrand" value="{{$infoBrand->id}}"/>
                <button class="btn btn-primary" type="submit"> Submit </button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
