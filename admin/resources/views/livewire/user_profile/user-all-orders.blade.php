<div>
    <div class="card">
        <div class="card-header">
            <h4>Lịch sử toàn bộ đơn hàng</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã hoá đơn</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày mua</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($all_orders->count() > 0)
                        @foreach ($all_orders as $all_order)
                            <tr>
                                <td></td>
                                <td>{{ $all_order->product->name }}</td>
                                <td>{{ $all_order->unit_price }}</td>
                                <td>{{ $all_order->quantity }}</td>
                                <td>{{ $all_order->total }}</td>
                                <td>{{ $all_order->created_at }}</td>
                                <td>{{ $all_order->status }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center">No all orders found</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div style="float: right;">
                                {{ $all_orders->appends(request()->input())->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
