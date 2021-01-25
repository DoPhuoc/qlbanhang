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
            <form method="post" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên Banner (<span class="text-danger">*</span>)</label>
                    <input id="title" type="text" name="title" placeholder="Enter title"
                        value="{{ old('title') }}" class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description " class="col-form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description"
                        value="{{ old('description') }}"></textarea>
                    @error('description')
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
                        @foreach(\App\Model\Banner::STATUS as $key => $banner)
                            <option value="{{ $key }}"
                                    @if(old('status', \App\Model\Banner::ACTIVE) == $key) selected @endif>
                                {{ $banner }}
                            </option>
                        @endforeach
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
