<div>
    <div class="card">
        <div class="card-header">
            <h4>Lịch sử mua Gamepass</h4>
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
                    @if ($gamepass_orders->count() > 0)
                        @foreach ($gamepass_orders as $gamepass_order)
                            <tr>
                                <td></td>
                                <td>{{ $gamepass_order->product->name }}</td>
                                <td>{{ $gamepass_order->unit_price }}</td>
                                <td>{{ $gamepass_order->quantity }}</td>
                                <td>{{ $gamepass_order->total }}</td>
                                <td>{{ $gamepass_order->created_at }}</td>
                                <td>{{ $gamepass_order->status }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center">No Gamepass orders found</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            <div style="float: right;">
                                {{ $gamepass_orders->appends(request()->input())->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
