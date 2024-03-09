<div>
    <div class="card">
        <div class="card-header">
            <h4>Lịch sử chuyển khoản</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mệnh giá</th>
                        <th>Thực nhận</th>
                        <th>Banking_code</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($bank_transactions->count() > 0)
                        @foreach ($bank_transactions as $bank_transaction)
                            <tr>
                                <td>{{ $bank_transaction->amount }}</td>
                                <td>{{ $bank_transaction->total_received }}</td>
                                <td>{{ $bank_transaction->banking_code }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center">No bank_transaction found</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div style="float: right;">
                                {{ $bank_transactions->appends(request()->input())->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
