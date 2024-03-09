@extends('layouts.admins.admin.app')
@section('style')
@endsection
@section('title')
    Chỉnh sửa danh mục sản phẩm
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="bx bx-home-alt"></i> Trang chủ</a></li>
    <li aria-current="page" class="breadcrumb-item active">Chỉnh sửa danh mục sản phẩm</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">Tên danh mục <span class="text-danger">*</span></label>
                    <input class="form-control" id="name" name="name" type="text" required value="{{ $category->name }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="name">Thể loại cha</label>
                    <select class="form-select" id="select-parent-id" data-placeholder="Vui lòng chọn thể loại" name="parent_id">
                        <option></option>
                        @if (!empty($categories))
                            @foreach ($categories as $categoriesId => $categoryName) 
                                <option 
                                    value="{{ $categoriesId ?? null }}"
                                    {{ (collect(old('parent_id'))->contains($categoriesId)) ? 'selected':'' }}
                                >
                                    {{ $categoryName }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="name">URI</label>
                    <input class="form-control" id="uri" name="uri" type="text" value="{{ $category->uri }}">
                    @error('uri')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Mô tả <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description" type="text" rows="5" required>{!! $category->description !!}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Trạng thái</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status"
                            name="status"
                            {{ old('status') || $category->status == 1 ? 'checked' : '' }}
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="category-avatar">Ảnh đại diện</label>
                    <div class="category-avatar-img mb-2">
                        @if ( !empty($category->library->link) )
                            <img class="config-image" style="max-height: 300px; max-width: 300px; margin-left: 10px;" src="{{ asset($category->library->link)  }}" alt="{{ !empty($category->library->title) ? $category->library->title : null }}">
                        @else
                            <h6 class="text-danger">Chưa có Logo cho mã giảm giá.</h6>
                        @endif
                    </div>

                    <input type="hidden" id="category-avatar" name="library_id" class="form-control" value="{{ old('library_id', $category->library_id) }}">
                    <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-category-avatar">
                        <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                    </button>
                </div>
                <button class="btn btn-primary px-5 mt-2" type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/category.js') }}"></script>
    <script>
        var parentId = {!! $category->parent_id !!};
    </script>
@endsection
