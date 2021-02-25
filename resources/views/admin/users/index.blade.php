@extends('admin.admin-layout')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">

        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách
                Người dùng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="user-dataTable"
                       width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ảnh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="#"/></td>
                        <td>06/02/2000</td>
                        <td>Nữ</td>
                        <td>Hoạt động</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <span style="float:right">

                </span>
            </div>
        </div>
    </div>
@endsection
