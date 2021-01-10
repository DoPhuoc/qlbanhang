@extends('admin.admin-layout')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách Bài viết </h4>
                </div>

                <div class="col-md-4">
                    <form>
                        <div class="input-group">

                            <input type="text" class="form-control bg-light border small js-keyword-brand"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary js-search-brand" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 ">
                    <a href="{{ route('admin.add.post') }}"
                        class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                        data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Thêm bài viết</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tên danh mục</th>
                            <th>Tagz</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th style="width:10%">Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tên danh mục</th>
                            <th>Tagz</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Tình trạng</th>
                            <th>Hành động
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phòng cháy chữa cháy</td>
                            <td>
                                Báo và chữa cháy HOCHIKI
                            </td>
                            <td>PCCC</td>
                            <td>
                                <img src="/img/product01.png">
                            </td>
                            <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam quos nesciunt quam
                                commodi dicta mollitia vitae ratione nobis minus totam debitis, quis eaque sed nisi
                                laboriosam enim dolores aliquid est.</td>
                            <td>Hoạt động</td>
                            <td>
                                <a class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    href="{{ route('admin.edit.post', ['slug', 'id']) }}" data-placement="bottom"><i
                                        class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm dltBtn"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                    data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>

                            </td>
                        </tr>

                    </tbody>
                </table>
                <span style="float:right"></span>

            </div>
        </div>
    </div>
@endsection
