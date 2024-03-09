@extends('layouts.admins.admin.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('libraries/select2/css/select2.min.css') }}">
@endsection
@section('title')
    Thiết lập hệ thống
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thiết lập hệ thống</li>
@endsection
@section('content')
    <div class="col-md-12 detail-course-finish">
        @if (session('success'))
            <div class="bg-success p-4">
                <p class="text-light">{{ session('success') }}</p>
            </div>
        @elseif(session('fails'))
            <div class="bg-danger p-4">
                <p class="text-light">{{ session('fails') }}</p>
            </div>
        @endif
    </div>
    <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
            <div class="col-md-12">
                <div class="fillter_log mt-4 mb-4">
                    <!-- <button type="button" class="btn btn-primary btn_filter" name="button"><i class="fas fa-clipboard-list"></i> Lọc</button> -->
                </div>
                <div class="card card-default">
                    <div class="card-header p-2">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#system" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i></div>
                                        <div class="tab-title">Home</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#email" role="tab" aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-mail-send font-18 me-1"></i></div>
                                        <div class="tab-title">Mail</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#telegram" role="tab" aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-notification font-18 me-1"></i></div>
                                        <div class="tab-title">Telegram</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('admin.system.saveChange') }}" class="form-horizontal" method="POST" id="form_select">
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="system" class="tab-pane active">
                                    @include('admins.config_systems.includes.system', compact('systemConfig'))
                                </div>
                                <div id="email" class="tab-pane">
                                    @include('admins.config_systems.includes.email', compact('configSmtpMail'))
                                </div>
                                <div id="payment" class="tab-pane">
                                    @include('admins.config_systems.includes.payment', compact('configPayment'))
                                </div>
                                <div id="telegram" class="tab-pane">
                                    @include('admins.config_systems.includes.telegram', compact('configTelegram'))
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            @csrf
                            <input type="submit" value="Lưu thay đổi" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal xoa order --}}
    <div class="modal fade" id="delete-order">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0">Xóa đơn đặt hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="notication-order" class="text-center">

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="button-order">Thiết lập</button>
                    {{-- <button type="button" class="btn btn-danger" id="button-finish" data-dismiss="modal">Hoàn thành</button> --}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('scripts')
    <script src="{{ asset('libraries/select2/js/select2.full.min.js') }}" defer></script>
    <script src="{{ asset('/js/admin/config_system.js') }}?token={{ time() }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form_select').on('submit', function() {
                $('#btnFormSubmit').attr('disabled', true);
            });
        });
    </script>
@endsection
