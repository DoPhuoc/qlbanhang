@extends('admin.admin-layout')
@section('content')
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
         
        </div>
    </div>
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách  Banner</h6>
     <a href="{{route('admin.add.banner')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Banner</a>
   </div>
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
     <div class="table-responsive">
       <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>STT</th>
             <th>Tên </th>
             <th width="50%">Ảnh</th>
             <th>Tráng thái</th>
             <th width="20%">Hành động</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>STT</th>
             <th>Tên</th>
             <th>Ảnh</th>
             <th>Trạng thái</th>
             <th>Hoạt động</th>
             </tr>
         </tfoot>
         <tbody>
          @foreach($banners as $banner)   
                <tr>
                    <td>{{$banner->id}}</td>
                    <td>{{$banner->title}}</td>
                    <td>
                        <img class="img-fluid zoom img-thumbnail w-20" style="max-width:100%" src="{{asset('uploads/images/banners')}}/{{$banner->photo}}">
                    </td>
                    <td>
                        @if($banner->status=='active')
                            <span class="badge badge-success">Hoạt động</span>
                        @else
                            <span class="badge badge-warning">Không hoạt động</span>
                        @endif
                    </td>
                    <td>
                      <a href="{{route('admin.edit.banner',['slug' => $banner->slug, 'id' => $banner->id])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" href="{{route('admin.delete.banner',['id'=>$banner->id])}}" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>  
            @endforeach
         </tbody>
       </table>

     </div>
   </div>
</div>
@endsection

@push('stylesheets')
  <style>

    .zoom {
      transition: transform .2s; /* Animation */
    }

    .zoom:hover {
      transform: scale(3.2);
    }
  </style>
@endpush



@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('javascripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>

@endpush