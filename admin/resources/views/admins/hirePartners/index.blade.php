@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lí nhóm cày thuê
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nhóm cày thuê</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <a href="{{ route('admin.hire.create') }}" class="btn btn-primary px-5"><i
                            class="bx bx-user mr-1"></i>Tạo
                        mới</a>
                </div>

                <div class="col-md-9">
                    <input type="text" id="searchInput" name="searchInput" class="form-control"
                        placeholder="Tìm kiếm...">
                </div>
            </div>

            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Tên nhóm</th>
                        <th scope="col">Chiết khấu</th>
                        <th scope="col">Mã giới thiệu</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modal-page" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" id="hire-form" name="hire-form" class="form-horizontal">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="hire-id" value="">

                        <div class="form-group">
                            <label for="multiple-select-field" class="col-form-label">Người dùng </label>
                            <select class="form-select" id="select-user-ids" data-placeholder="Vui lòng chọn người dùng"
                                multiple name="user_ids[]">
                                @if (!empty($users))
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id ?? null }}">
                                            {{ $user->first_name . ' ' . $user->last_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <p hidden id="error-kol-user-id" class="mt-2 form-label text-danger font-weight-normal"></p>
                        </div>
                        <div id="temp-form"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                        {{-- <button type="button" class="btn btn-primary" id="btn-submit">Xác nhận</button> --}}
                        <button type="submit" class="btn btn-danger" id="btn-submit-hire" data-bs-dismiss="modal">Hoàn
                            thành</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/hirePartner.js') }}"></script>
@endsection
