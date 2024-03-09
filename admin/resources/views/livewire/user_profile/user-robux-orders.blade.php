<div>
    <div class="card">
        <div class="card-header">
            <h4>Lịch sử mua Robux</h4>
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
                    @if ($robux_orders->count() > 0)
                        @foreach ($robux_orders as $robux_order)
                            <tr>
                                <td></td>
                                <td>{{ $robux_order->product->name }}</td>
                                <td>{{ $robux_order->unit_price }}</td>
                                <td>{{ $robux_order->quantity }}</td>
                                <td>{{ $robux_order->total }}</td>
                                <td>{{ $robux_order->created_at }}</td>
                                <td>{{ $robux_order->status }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center">No Robux orders found</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            <div style="float: right;">
                                {{ $robux_orders->appends(request()->input())->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
