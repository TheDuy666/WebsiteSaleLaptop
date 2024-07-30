<div class="tab-pane fade" id="pills-confirmed" role="tabpanel" aria-labelledby="pills-confirmed-tab">
    <div class="col-lg-12">
        <div class="card card-table">
            <div class="card-body">
                <table id="orders_table2" data-page-length='10'
                       class="table table-sm">
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
                    @foreach ($confirmedOrders as $order)
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
                                <a href="{{ route('admin.order-detail', $order->id) }}"
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
<script>
let table = new DataTable('#orders_table2');
</script>
