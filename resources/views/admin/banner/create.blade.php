@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thêm Banner</h5>



        @if (!empty($errLogo))
            <div class="alert alert-danger">
                <p>{{ $errLogo }}</p>
            </div>
        @endif
        <div class="card-body">
            <form method="post" action="{{ route('admin.handle.add.banner') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleBanner" class="col-form-label">Tên Banner (<span class="text-danger">*</span>)</label>
                    <input id="titleBanner" type="text" name="titleBanner" placeholder="Enter title"
                        value="{{ old('titleBanner') }}" class="form-control">
                    @error('titleBanner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="desBanner " class="col-form-label">Mô tả</label>
                    <textarea class="form-control" id="desBanner" name="desBanner"
                        value="{{ old('desBanner') }}"></textarea>
                    @error('desBanner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photoBanner">Ảnh Banner</label>
                    <input type="file" id="photoBanner" name="photoBanner" value="{{ old('photoBanner') }}"
                        class="form-control" />
                    @error('photoBanner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Hoạt động(<span class="text-danger">*</span>)</label>
                    <select name="status" class="form-control">
                        <option value="active">Hoạt động</option>
                        <option value="inactive">Không hoạt động</option>
                    </select>


                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>


        </div>
    </div>
@endsection
