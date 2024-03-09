<div>
    <div class="card">
        <div class="card-header">
            <h4>Lịch sử nạp thẻ cào</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Loại thẻ</th>
                        <th>Serial</th>
                        <th>Mã thẻ</th>
                        <th>Mệnh giá</th>
                        <th>Thực nhận</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($card_transactions as $card_transaction)
                        <tr>
                            <td>{{ $card_transaction->card_provider->name }}</td>
                            <td>{{ $card_transaction->serial }}</td>
                            <td>{{ $card_transaction->code }}</td>
                            <td>{{ $card_transaction->real_value }}</td>
                            <td>{{ $card_transaction->real_cash }}</td>
                            <td>{{ $card_transaction->status }}</td>
                        </tr>
                    @endforeach --}}

                    @if ($card_transactions->count() > 0)
                        @foreach ($card_transactions as $card_transaction)
                            <tr>
                                <td>{{ $card_transaction->card_provider->name }}</td>
                                <td>{{ $card_transaction->serial }}</td>
                                <td>{{ $card_transaction->code }}</td>
                                <td>{{ $card_transaction->real_value }}</td>
                                <td>{{ $card_transaction->real_cash }}</td>
                                <td>{{ $card_transaction->status }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center">No Card_transaction found</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div style="float: right;">
                                {{ $card_transactions->appends(request()->input())->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
