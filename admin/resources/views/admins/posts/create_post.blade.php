@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Tạo bài viết
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
                <div class="col-md-12 detail-course-finish">
                    @if (session('success'))
                        <div class="bg-success p-4">
                            <p class="text-light m-0">{{ session('success') }}</p>
                        </div>
                    @elseif(session('fails'))
                        <div class="bg-danger p-4">
                            <p class="text-light m-0">{{ session('fails') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Table --}}
    <form action="{{ route("admin.storagePost") }}" id="storagePost" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" value="" id="title" name="title" />
                        </div>
                        <div class="form-group">
                            <label for="ckeditor-content">Nội dung</label>
                            <textarea name="content" id="ckeditor-content" cols="30" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Thuộc tính trang</h6>
                        <hr>
                        <div class="form-group">
                            <label for="hidden">Hiển thị công khai</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="hidden" name="hidden" value="1" checked />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select-category">Danh mục</label>
                            <select name="category_id" id="select-category" class="form-control">
                                <option value="" disabled selected>Chọn doanh mục bài viết</option>
                                @foreach($listCategory as $category)
                                    @php
                                        $selected = '';
                                        if (!empty( old('category_id') )) {
                                            if ($category->id == old('category_id')) {
                                                $selected = 'selected';
                                            }
                                        }
                                    @endphp
                                    <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stt">Số thứ tự</label>
                            <input type="number" class="form-control" value="20" id="stt" name="stt" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Tạo bài viết" id="post-submit" class="btn btn-primary float-end" />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="post-avatar">Ảnh đại diện</label>
                            <div class="post-avatar-img mb-2"></div>
                            <input type="hidden" name="post-avatar"  id="post-avatar" value="">
                            <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-post-avatar">
                                <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="select-tab">Thẻ</label>
                            <select name="tabs[]" class="select2 form-control" id="select-tab" multiple>
                                @foreach($listTab as $tab)
                                    <option value="{{$tab->id}}">{{$tab->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
@endsection
@section('scripts')
    <script src="{{ url('libraries/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/admin/post_blog_write.js') }}?token={{ time() }}"></script>
@endsection
