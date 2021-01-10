@extends('admin.admin-layout')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
       
    </div>
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách Người dùng</h6>
     <a href="{{route('admin.add.users')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add User</a>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>STT</th>
             <th>Tên</th>
             <th>Email</th>
             <th>Ảnh</th>
             <th>Ngày sinh</th>
             <th>Giới tính</th>
             <th>Tình trạng</th>
             <th>Hành động</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Tình trạng</th>
            <th>Hành động</th>
             </tr>
         </tfoot>
         <tbody>
           <td>1</td>
           <td>ADMIN</td>
           <td>admin@gmail.com</td>
           <td><img src=""</td>
           <td>06/02/2000</td>
           <td>Nữ</td>
           <td>Hoạt động</td>
           <td>
            <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="{{route('admin.edit.users',['slug','id'])}}" data-placement="bottom"><i class="fas fa-edit"></i></a>
            <button class="btn btn-danger btn-sm dltBtn" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
           </td>
         </tbody>
       </table>
       <span style="float:right"</span>
     </div>
   </div>
</div>
@endsection