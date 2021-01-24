@extends('admin.admin-layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Danh mục Thương hiệu</h4>
                </div>

                <div class="col-md-4">
                    <form action="{{route('admin.search.brand')}}" method="get">
                        <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary" ><i class="fas fa-search"></i></button>
                        </span>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 ">
                    <a href="{{ route('admin.add.brand') }}"
                        class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                        data-placement="bottom" title="Add User"><i
                        class="fas fa-plus-circle fa-sm text-white-50"></i>  Thêm thương hiệu</a>
             </div>
            </div>
        </div>
        <!--table-->


        @if(session('success'))
        <div class="alert alert-success alert-dismissable fade show">
               <button class="close" data-dismiss="alert" aria-label="Close">×</button>
               {{session('success')}}
           </div>
       @endif


       @if(session('error'))
           <div class="alert alert-danger alert-dismissable fade show">
               <button class="close" data-dismiss="alert" aria-label="Close">×</button>
               {{session('error')}}
           </div>
       @endif
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td width="5%">ID</td>
                        <th width="5%">Tên thương hiệu</th>
                        <th width="5%">Mô tả</th>
                        <th width="10%">Tình trạng</th>
                        <th colspan="2" width="10%">Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>ID</td>
                        <th> Tên thương hiệu</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th colspan="2" width="10%">Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($listBrands as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('admin.edit.brand', ['slug' => $item->slug, 'id' => $item->id]) }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>{!! $item->description !!}</td>
                            <td>
                               {{--   {{ $item->status == 1 ? 'Hoạt động' : 'Không hoạt động' }}  --}}

                                @if($item->status== 1)
                                <span class="badge badge-success">Hoat dong</span>
                                @else
                                <span class="badge badge-warning">khong hoat dong</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.edit.brand', ['slug' => $item->slug, 'id' => $item->id]) }}"
                                    class="btn btn-info"><i class="fas fa-user-edit fa-1x"></i></a>

                                @if ($item->status == 1)
                                    <button data-status="0" id="{{ $item->id }}" class="btn btn-danger js-delete-brand"><i
                                            class="fas fa-lock"></i> </button>
                                @else
                                    <button data-status="1" id="{{ $item->id }}" class="btn btn-primary js-delete-brand"><i
                                            class="fas fa-unlock-alt"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{-- Hien thi phan trang --}}
                {{ $listBrands->links() }}
            </div>

        </div>

    </div>
@endsection
@push('javascripts')
  <script type="text/javascript">
    var urlAjax = "{{ route('admin.delete.brand') }}";
   
</script>
    <script type="text/javascript" src="{{ asset('backend/js/admin-brands.js') }}"></script>

@endpush
