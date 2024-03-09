@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Quản lý thẻ
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
@endsection
@section('content')
    <div class="title">
        <div class="title-body">
            <div class="row">
                <!-- button tạo -->
                <div class="col-md-4">
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
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
            </div>
        </div>
    </div>
    {{-- Table --}}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row ms-2 ms-2">
                <div class="col-md-4 border rounded p-3">
                    <h5>Thêm thẻ</h5>
                    <div id="notication-form"></div>
                    <div class="form-group">
                        <label for="inp-tab-name">Tên</label>
                        <input type="text" class="form-control" id="inp-tab-name" value="" placeholder="Tên" />
                        <p id="name-description">Tên là nó xuất hiện trên trang web của bạn.</p>
                    </div>
                    <div class="form-group">
                        <label for="inp-tab-description">Mô tả</label>
                        <textarea class="form-control" id="inp-tab-description" placeholder="Mô tả"></textarea>
                        <p id="name-description">Theo mặc định, mô tả không nổi bật; tuy nhiên, một số chủ đề có thể hiển thị nó.</p>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-primary" id="add-tab" data-action="create">Thêm thẻ</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <table class="table table-hover table-bordered table-responsive">
                            <thead class="primary">
                            <tr>
                                <th width="40%">Tên</th>
                                <th width="40%">Mô tả</th>
                                <th width="20%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
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
                <div class="modal-body">
                    <div id="notication"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btn-submit">Xác nhận</button>
                    <button type="button" class="btn btn-danger" id="btn-finish" data-bs-dismiss="modal">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ./MODAL --}}
    <div class="load-form"></div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/admin/post_tab.js') }}?token={{ time() }}"></script>
@endsection
