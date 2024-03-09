@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chi tiết nhà đổi thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active"><a href="{{ route('admin.card-exchanger') }}">Trao đổi thẻ</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tên cổng đổi thẻ:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $cardExchanger->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ gửi:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $cardExchanger->send_url }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Địa chỉ lấy tỉ lệ:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $cardExchanger->get_rate_url }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mã đối tác:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $cardExchanger->partner_id }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Trạng thái:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <p class="mb-0">{{ $cardExchanger->status == 1 ? 'Public' : 'Private' }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="token" class="form-label">Tỉ giá đổi thẻ</label>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên nhà cung cấp</th>
                                    <th scope="col">Mệnh giá</th>
                                    <th scope="col">Chiết khấu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cardExchangerRates as $cardExchangerRate)
                                    <tr>
                                        <td>{{ $cardExchangerRate->id }}</td>
                                        <td>{{ !empty($cardExchangerRate->cardProvider->name) ? $cardExchangerRate->cardProvider->name : null }}</td>
                                        <td>{{ $cardExchangerRate->price ? number_format($cardExchangerRate->price,0,",",".") : 0 }} VND</td>
                                        <td>{{  $cardExchangerRate->rate }} %</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3 mr-3">
                            {!! $cardExchangerRates->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
