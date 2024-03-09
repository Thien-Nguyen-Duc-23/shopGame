@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
   Quản lí nhóm KOLs
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
     <li class="breadcrumb-item active" aria-current="page">Nhóm Kols</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="button-create-kol m-10">
                <button id="btn-create-kol" class="btn btn-primary px-5"><i class="bx bx-user mr-1"></i>Tạo mới</button>
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th width="15%" scope="col" class="text-center">Tên nhóm</th>
                        <th width="15%" scope="col" class="text-center">Chiết khấu</th>
                        <th width="15%" scope="col" class="text-center">Số lượng khách hàng</th>
                        <th width="40%" scope="col" class="text-center">Mã giới thiệu</th>
                        <th width="15%" scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modal-add-user-to-kol" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input hidden id="kol-id-parent" name="id" value="">
                    <div id="add-user-to-ko-modal">
                        <div class="form-group">
                            <label for="multiple-select-field" class="col-form-label">Người dùng </label>
                            <select class="form-select" id="select-user-id-box-add-user" data-placeholder="Vui lòng chọn người dùng" multiple name="user_ids[]">
                                @if (!empty($users))
                                    @foreach ($users as $key => $userName) 
                                        <option 
                                            value="{{ $key ?? null }}"
                                        >
                                            {{ $userName }}
                                            {{ (collect(old('user_ids'))->contains($key)) ? 'selected':'' }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <p hidden id="error-kol-user-id" class="mt-2 form-label text-danger font-weight-normal"></p>
                        </div>
                    </div>
                    <div id="temp-add-user-form"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-add-user">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish-add-user" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-create-kol" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="kol-form" name="kol-form" class="form-horizontal">
                    <div class="modal-body">
                        <div id="body-kol-form">
                            <input hidden id="kol-id" name="id" value="">
                            <div id="box-kol-name" class="form-group">
                                <label for="recipient-name" class="col-form-label">Tên kol <span class="text-danger">*</span></label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') font-weight-normal border border-danger @enderror" 
                                    id="kol-name"
                                    name="name"
                                    placeholder="Vui lòng nhập tên kol" 
                                    value="{{ old('name') }}" 
                                    required
                                >
                                <p hidden id="error-kol-name" class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('name') }}</p>
                            </div>
                            <div id="box-kol-rate" class="form-group">
                                <label for="message-text" class="col-form-label">Chiết khấu <span class="text-danger">*</span></label>
                                <input 
                                    class="form-control @error('rate') font-weight-normal border border-danger @enderror"
                                    id="kol-rate" 
                                    name="rate" 
                                    type="number" 
                                    value="{{ old('rate') }}" 
                                    required
                                    maxlength="100"
                                >
                                <p hidden id="error-kol-rate" class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('rate') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="multiple-select-field" class="col-form-label">Người dùng </label>
                                <select class="form-select" id="select-user-ids" data-placeholder="Vui lòng chọn người dùng" multiple name="user_ids[]">
                                    @if (!empty($users))
                                        @foreach ($users as $key => $userName) 
                                            <option 
                                                value="{{ $key ?? null }}"
                                            >
                                                {{ $userName }}
                                                {{ (collect(old('user_ids'))->contains($key)) ? 'selected':'' }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <p hidden id="error-kol-user-id" class="mt-2 form-label text-danger font-weight-normal"></p>
                            </div>
                        </div>
                        <div id="temp-form"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="btn-submit-kol">Lưu</button>
                        <button type="button" class="btn btn-danger" id="btn-finish" data-bs-dismiss="modal">Hoàn thành</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-delete-kol" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="delete-kol"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit-delete">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish-delete" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/kolPartner.js')  }}"></script>
@endsection
