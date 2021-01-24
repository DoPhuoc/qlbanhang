@extends('admin.admin-layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-4">
                <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách đặt hàng</h4>
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
                <a href="{{route('admin.add.product')}}"
                    class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                    data-placement="bottom" title="Add User"><i
                    class="fas fa-plus-circle fa-sm text-white-50"></i>  Thêm đặt hàng</a>
            </div>
        </div>
    </div>
    <!--table-->
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã đặt hàng</th>
                    <th width="10%">Tên khách hàng </th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Tổng Tiền</th>
                    <th width="10%">Ghi chú</th>
                    <th>Phí ship</th>
                    <th width="10%">Phương thức thanh toán</th>
                    <th width="15%">Hành động</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Mã đặt hàng</th>
                    <th width="10%">Tên khách hàng </th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Tổng Tiền</th>
                    <th width="10%">Ghi chú</th>
                    <th>Phí ship</th>
                    <th width="10%">Phương thức thanh toán</th>
                    <th width="10%">Trạng thái</th>
                    <th  width="15%">Hành động</th>
                </tr>
            </tfoot>
            @forelse($orders as $order)
                @php
                    $cart = $order->cart;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $cart->user->name }}</td>
                    <td>{{ $cart->user->email }}</td>
                    <td>{{ $cart->user->phone }}</td>
                    <td>{{ $cart->totalMoney() }} VND</td>
                    <td></td>
                    <td>0 VND</td>
                    <td>Thanh toán Khi nhận hàng</td>
                    <td>{!! $order->status_label !!}</td>
                    <td >
                        <a class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" href="" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                    </td>
            @empty
                Không tồn tại đơn đặt hàng
            @endforelse
        </table>

    </div>

</div>

@endsection
