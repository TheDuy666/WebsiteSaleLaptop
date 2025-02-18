@extends('layout.customerApp')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h3>Lịch sử đơn hàng</h3>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending"
                            aria-selected="true">Đơn của bạn
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-confirmed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-confirmed" type="button" role="tab" aria-controls="pills-confirmed"
                            aria-selected="false">Đã xác nhận
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-shipping-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-shipping" type="button" role="tab" aria-controls="pills-shipping"
                            aria-selected="false">Đang giao
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed"
                            aria-selected="false">Đã giao
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-canceled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-canceled" type="button" role="tab" aria-controls="pills-canceled"
                            aria-selected="false">Đã hủy
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-received -tab" data-bs-toggle="pill"
                            data-bs-target="#pills-received " type="button" role="tab" aria-controls="pills-received"
                            aria-selected="false">Đã nhận hàng
                    </button>
                </li>

            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-pending" role="tabpanel">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Ngày đặt</th>
                                    <th class="text-center fw-bold">Mã vận đơn</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pendingOrders as $order)
                                    <tr>

                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>
                                        <td class="text-center">{{$order-> order_date}}</td>

                                        <td class="text-center">butt{{$order-> landing_code}}</td>
                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{--//đã xác nhận--}}
            <div class="tab-pane fade" id="pills-confirmed" role="tabpanel" aria-labelledby="pills-confirmed">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Ngày đặt</th>
                                    <th class="text-center fw-bold">Mã vận đơn</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($confirmedOrders as $order)
                                    <tr>

                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>
                                        <td class="text-center">{{$order-> order_date}}</td>

                                        <td class="text-center">butt{{$order-> landing_code}}</td>
                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        //Đang giao--}}
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-shipping" role="tabpanel" aria-labelledby="pills-shipping-tab">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Ngày đặt</th>
                                    <th class="text-center fw-bold">Mã vận đơn</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shippingOrders as $order)
                                    <tr>

                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>
                                        <td class="text-center">{{$order-> order_date}}</td>

                                        <td class="text-center">butt{{$order-> landing_code}}</td>
                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Đã giao--}}
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Ngày đặt</th>
                                    <th class="text-center fw-bold">Mã vận đơn</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($completedOrders  as $order)
                                    <tr>

                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>
                                        <td class="text-center">{{$order-> order_date}}</td>

                                        <td class="text-center">butt{{$order-> landing_code}}</td>
                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }} VNĐ</td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--đã hủy--}}
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade" id="pills-canceled" role="tabpanel" aria-labelledby="pills-canceled-tab">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Ngày đặt</th>
                                    <th class="text-center fw-bold">Mã vận đơn</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($canceledOrders as $order)
                                    <tr>

                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>
                                        <td class="text-center">{{$order-> order_date}}</td>

                                        <td class="text-center">butt{{$order-> landing_code}}</td>
                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }}
                                            VNĐ
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show" id="pills-received" role="tabpanel" aria-labelledby="pills-received-tab">
                <div class="col-lg-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <table id="orders_table5" data-page-length='10'
                                   class="table table-sm " style="width: 100%">
                                <thead>
                                <tr>
                                    <th class="text-center fw-bold">ID</th>
                                    <th class="text-center fw-bold">Tên</th>
                                    <th class="text-center fw-bold">Số điện thoại</th>
                                    <th class="text-center fw-bold">Email</th>
                                    <th class="text-center fw-bold">Địa chỉ</th>
                                    <th class="text-center fw-bold">Trạng thái</th>
                                    <th class="text-center fw-bold">Tổng giá</th>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($receivedOrders as $order)
                                    <tr>
                                        <td class="text-center">{{$order-> id}}</td>
                                        <td class="text-center">{{$order-> name}}</td>
                                        <td class="text-center">{{$order-> phone}}</td>
                                        <td class="text-center">{{$order-> email}}</td>
                                        <td class="text-center">{{$order-> address}}</td>
                                        <td class="text-center">
                                            <button
                                                class="badge bg {{ app('App\Http\Controllers\OrderController')->getOrderStatusClass($order->status) }}">{{ $order->status }}</button>
                                        </td>

                                        <td class="text-center">{{ number_format($order->total, 0, ',', '.') }}
                                            VNĐ
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('customer.order-detail', $order->id) }}"
                                               class="btn btn-primary btn-sm">
                                                Xem Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
