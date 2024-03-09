@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Thêm feedback
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Nhóm feedback</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.feedback.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Đơn hàng
                        <span class="text-danger">*</span>
                    </label>
                    <select name ="order_id" class="form-select" id="order-select-clear-field" data-placeholder="Vui lòng chọn 1 đơn hàng" required>
                        <option></option>
                        @foreach ($orders as $key => $orderName)
                            <option 
                                value="{{ $key ?? null }}"
                                {{ (collect(old('order_id'))->contains($key)) ? 'selected':'' }}
                            >
                                {{ $orderName }}
                            </option>
                        @endforeach
                    </select>
                    <div class="text-danger mt-1">
                        <b>⁕Lưu ý:</b> Hãy chắc chắn rằng bạn đã có 1 đơn hàng!
                    </div>
                    @error('order_id')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('order_id') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">
                        Nội dung
                        <span class="text-danger">*</span>
                    </label>
                    <textarea 
                        type="text" 
                        class="form-control @error('content') font-weight-normal border border-danger @enderror" 
                        placeholder="Vui lòng nhập nội dung" 
                        name="content"
                        required
                    ></textarea>
                    @error('content')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('content') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="admin_note" class="form-label">
                        Lưu ý của Admin
                    </label>
                    <textarea 
                        type="text" 
                        class="form-control @error('admin_note') font-weight-normal border border-danger @enderror" 
                        placeholder="Vui lòng nhập lưu ý" 
                        name="admin_note"
                    ></textarea>
                    @error('admin_note')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('admin_note') }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stars" class="form-label">
                        Đánh giá
                    </label>
                    <select name ="stars" class="form-select" id="star-select-clear-field" data-placeholder="Vui lòng chọn đánh giá">
                        <option></option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option 
                                value="{{ $i }}"
                                {{ (collect(old('stars'))->contains($i)) ? 'selected':'' }}
                            >
                                {{ $i }} sao
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Trạng thái
                        <span class="text-danger">*</span>
                    </label>
                    <select name ="status" class="form-select" id="status-select-clear-field" data-placeholder="Vui lòng chọn trạng thái" required>
                        <option></option>
                        @foreach (\App\Enums\FeedbackStatus::FEEDBACK_STATUS as $feedbackStatus => $feedbackName)
                            <option 
                                value="{{ $feedbackStatus }}"
                                {{ (collect(old('status'))->contains($feedbackStatus)) ? 'selected':'' }}
                            >
                                {{ $feedbackName }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="mt-2 form-label text-danger font-weight-normal">{{ $errors->first('status') }}</p>
                    @enderror
                </div>

                <div class="mb-3 form-group row">
                    <label class="form-label">Hình ảnh minh họa</label>
                    <div class="col-sm-6">
                        <div class="website-logo-container mb-2">
                            <h6 class="text-danger">Chưa có hình ảnh cho đánh giá này.</h6>
                        </div>
                        <input type="hidden" name="library_id" id="library_id" placeholder="Hình ảnh minh họa" class="form-control" value="">
                        <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-feedbac-image"><i class="bx bx-cloud-upload mr-1"></i> Chọn hình ảnh</button>
                    </div>
                </div>

                <button class="btn btn-primary px-5 mt-2" type="submit">
                    <i class="bx bx-plus mr-1"></i>
                    Tạo mới
                </button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/feedback.js') }}"></script>
@endsection
