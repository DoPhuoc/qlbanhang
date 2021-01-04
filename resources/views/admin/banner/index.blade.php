@extends('admin.admin-layout')
@section('content')
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
         
        </div>
    </div>
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary float-left">Banners List</h6>
     <a href="{{route('admin.add.banner')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Banner</a>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>STT</th>
             <th>Title</th>
             <th width="50%">Photo</th>
             <th>Status</th>
             <th>Action</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>STT</th>
             <th>Title</th>
             <th>Photo</th>
             <th>Status</th>
             <th>Action</th>
             </tr>
         </tfoot>
         <tbody>
          @foreach($banners as $banner)   
                <tr>
                    <td>{{$banner->id}}</td>
                    <td>{{$banner->title}}</td>
                    <td>
                        <img class="img-fluid zoom img-thumbnail w-25" style="max-width:100%" src="{{asset('uploads/images/banners')}}/{{$banner->photo}}">
                    </td>
                    <td>
                        @if($banner->status=='active')
                            <span class="badge badge-success">{{$banner->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$banner->status}}</span>
                        @endif
                    </td>
                    <td>
                      <a href="{{route('admin.edit.banner',['slug' => $banner->slug, 'id' => $banner->id])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                      <form method="POST" action="{{route('admin.delete.banner',[$banner->id])}}">
                        @csrf 
                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$banner->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      </form>
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

@push('javascripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript" src="{{ asset('backend/js/admin-banners.js') }}"></script>
@endpush