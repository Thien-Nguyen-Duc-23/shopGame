$(document).ready(function() {

    function Pagination(total, per_page, current_page, addClass) {
        // console.log(total, per_page, current_page, addClass);
        total = parseInt(total);
        per_page = parseInt(per_page);
        current_page = parseInt(current_page);
        var html_page = '';
        var page = 0;
        if (total > per_page) {
            if (total % per_page) {
                page = parseInt(total / per_page) + 1;
            } else {
                page = parseInt(total / per_page);
            }
            // console.log('====================================');
            // console.log(total % per_page, total, per_page, total/per_page, page);
            // console.log('====================================');
            if (page > 11) {
                html_page += '<tr>';
                html_page += '<td colspan="15" class="text-center link-right">';
                html_page += '<nav>';
                html_page += '<ul class="pagination ' + addClass + ' ">';
                // prev
                if (current_page != 1) {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" data-page="' + (current_page - 1) + '" class="page-link">&laquo</a></li>';
                } else {
                    html_page += '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">&laquo</a></li>';
                }
                // số trang
                if (current_page < 7) {
                    for (var i = 1; i < 9; i++) {
                        var active = '';
                        if (i == current_page) {
                            active = 'active';
                        }
                        if (active == 'active') {
                            html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        } else {
                            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        }
                    }
                    html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                    for (var i = page - 1; i <= page; i++) {
                        html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                    }
                } else if (current_page >= page - 5) {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1" >1</a></li>';
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="2" >2</a></li>';
                    html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                    for (var i = page - 5; i <= page; i++) {
                        var active = '';
                        if (i == current_page) {
                            active = 'active';
                        }
                        if (active == 'active') {
                            html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        } else {
                            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        }
                    }
                } else {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1" >1</a></li>';
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="2" >2</a></li>';
                    html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                    for (var i = current_page - 3; i <= current_page + 3; i++) {
                        var active = '';
                        if (i == current_page) {
                            active = 'active';
                        }
                        if (active == 'active') {
                            html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        } else {
                            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                        }
                    }
                    html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
                    for (var i = page - 1; i <= page; i++) {
                        html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                    }
                }
                // next
                if (current_page != page) {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + current_page + '">&raquo;</a></li>';
                } else {
                    html_page += '<li  class="page-item disabled"><a href="javascript:void(0)" class="page-link">&raquo;</a></li>';
                }
                html_page += '</ul>';
                html_page += '</nav>';
                html_page += '</td>';
                html_page += '</tr>';
            } else {
                html_page += '<tr>';
                html_page += '<td colspan="15" class="text-center link-right">';
                html_page += '<nav>';
                html_page += '<ul class="pagination ' + addClass + '">';
                if (current_page != 1) {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" data-page="' + (current_page - 1) + '" class="page-link">&laquo</a></li>';
                } else {
                    html_page += '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">&laquo</a></li>';
                }
                for (var i = 1; i <= page; i++) {
                    var active = '';
                    if (i == current_page) {
                        active = 'active';
                    }
                    if (active == 'active') {
                        html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                    } else {
                        html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
                    }

                }
                if (current_page != page) {
                    html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + current_page + '">&raquo;</a></li>';
                } else {
                    html_page += '<li  class="page-item disabled"><a href="javascript:void(0)" class="page-link">&raquo;</a></li>';
                }
                html_page += '</ul>';
                html_page += '</nav>';
                html_page += '</td>';
                html_page += '</tr>';
            }
        }
        return html_page;
    };

    listCategory();
    function listCategory() {
        var q = $('#q').val();
        var sl = $('#sl').val();

        $.ajax({
            url: '/admin/slider-search',
            data: {q: q, sl: sl},
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="15" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('tbody').html(html);
            },
            success: function (data) {
                if (data.error === 0) {
                    if (data.data.length)
                    {
                        screen_list(data);
                    }
                    else {
                        $('tbody').html('<td colspan="15" class="text-center text-danger">Không có slider trong dữ liệu</td>');
                    }
                } else {
                    $('tbody').html('<td colspan="15" class="text-center text-danger">' + data.message + '</td>');
                }
            },
            error: function (e) {
                $('tbody').html('<td colspan="15" class="text-center text-danger">Truy vấn thất bại!</td>');
            }
        });

    }

    function screen_list(data) {
        var html = '';
        $.each(data.data, function (index , slider) {
            html += '<tr>';
            // avatar
            html += '<td>';
            if (slider.is_avatar)
            {
                html += '<img src="' + slider.avatar + '" alt="'+ slider.name +'" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
            }
            html += '</td>';
            html += '<td>' + slider.name + '</td>';
            html += '<td>';
            if (parseInt(slider.is_preview) == 1) {
                html += '<button type="button" class="btn btn-sm btn-info text-light me-1 mb-1 action-preview-slider" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem trước"><i class="fadeIn animated bx bx-slideshow" style="margin-left: 5px;"></i></button>';
            }
            html += '</td>';
            html += '<td class="td-status">';
            if (parseInt(slider.status) == 1) {
                html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-slider-status" type="checkbox" role="switch" data-id="'+ slider.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt slider" checked></div>';
            } else {
                html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-slider-status" type="checkbox" role="switch" data-id="'+ slider.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật slider"></div>';
            }
            html += '</td>';
            // // hành động
            html += '<td class="button-action">';
            html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="'+ slider.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
            html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="'+ slider.name +'" data-id="'+ slider.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
            html += '</td>';
            html += '</tr>';
        });
        $('tbody').html(html);
        // phân trang cho vps
        $('.first-item').text(data.firstItem);
        $('.last-item').text(data.lastItem);
        $('.total-item').text(data.total);
        var total = data.total;
        var per_page = data.perPage;
        var current_page = data.current_page;
        var html_page = Pagination( total, per_page, current_page, '');
        $('tfoot').html(html_page);
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    $(document).on('click', '.action-preview-slider', function (e) {
        e.preventDefault();
        location.href = 'slider/preview';
    });

    $('#createSlider').on('click', function () {
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Thêm slider');
        $('#btn-submit').fadeIn().text('Tạo slider').attr('data-action', 'create');
        $('#btn-finish').fadeOut();
        var html = `
            <div class="message-error"></div>
            <div class="form-group">
                <label class="col-form-label" for="slider-name">Tiêu đề<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="slider-name" value="" placeholder="Tiêu đề slider">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="slider-description">Nội dung<span class="text-danger">*</span></label>
                <textarea class="form-control" id="slider-description" placeholder="Nội dung slider" rows="7"></textarea>
            </div>

            <div class="form-group">
                <label class="col-form-label" for="slider-description">Số thứ tự</label>
                <input type="number" min=0 class="form-control" id="slider-sort-number" placeholder="Số thứ tự" value=""></input>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="slider-description">Vị trí</label>
                <select class="form-select" id="slider-select-position" data-placeholder="Vui lòng chọn người dùng" name="user_ids">
                    <option value="" selected> Vui lòng chọn vị trí </option>
                    <option value="1"> Trái </option>
                    <option value="2"> Phải </option>
                    <option value="3"> Giữa </option>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="slider-name">URL</label>
                <input type="text" class="form-control" name="url" id="slider-url" value="" placeholder="URL">
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="" id="slider-is-preview">
                <label class="form-check-label" for="flexCheckDefault">
                    Xem trước
                </label>
            </div>
            <div class="form-group form-check form-switch">
                <label class="form-check-label" for="flexSwitchCheckDefault1">Trạng thái</label>
                <input 
                    class="form-check-input" 
                    type="checkbox" 
                    role="switch" 
                    id="slider-status"
                    name="status" 
                >
            </div>
            <div class="form-group">
                <label class="col-form-label" for="slider-avatar">Ảnh đại diện<span class="text-danger">*</span></label>
                <div class="slider-avatar-img mb-2"></div>
                <input type="hidden" id="slider-avatar" class="form-control" value="">
                <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-slider-avatar">
                    <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                </button>
            </div>
        `;

        $('#notication').html(html);
    });

    $(document).on('click', '.action_event', function () {
        var action = $(this).attr('data-action');
        switch (action) {
            case 'edit':
                var id = $(this).attr('data-id');
                $('#modal-page').modal('show');
                $('#modal-page .modal-title').text('Chỉnh sửa slider');
                $('#btn-submit').fadeIn().text('Cập nhật').attr('data-action', 'edit').attr('data-id', id);
                $('#btn-finish').fadeOut();

                $.ajax({
                    url: '/admin/slider/detail',
                    data: { id: id },
                    dataType: 'json',
                    beforeSend: function(){
                        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                        $('#btn-submit').attr('disabled', true);
                        $('#notication').html(html);
                    },
                    success: function (data) {
                        if (data.error === 0) {
                            var html = `
                                <div class="message-error"></div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-name">Tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slider-name" value="${data.slider.name}" placeholder="Tiêu đề slider" />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-description">Nội dung<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="slider-description" placeholder="Nội dung" rows="7">${data.slider.description}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-description">Số thứ tự</label>
                                    <input type="number" min=0 class="form-control" id="slider-sort-number" placeholder="Số thứ tự" value="${data.slider.sort_number ?? null }"></input>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-description">Vị trí</label>
                                    <select class="form-select" id="slider-select-position" data-placeholder="Vui lòng chọn người dùng" name="user_ids">
                                        <option value="" ${!data.slider.position ? "selected" : "" }> Vui lòng chọn vị trí </option>
                                        <option value="1" ${data.slider.position == 1 ? "selected" : "" }> Trái </option>
                                        <option value="2" ${data.slider.position == 2 ? "selected" : "" }> Phải </option>
                                        <option value="3" ${data.slider.position == 3 ? "selected" : "" }> Giữa </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-name">URL</label>
                                    <input type="text" class="form-control" id="slider-url" value="${data.slider.url}" placeholder="URL" />
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="slider-is-preview" 
                                    ${data.slider.is_preview == 1 ? 'checked' : ''} >
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Xem trước
                                    </label>
                                </div>
                                <div class="form-group form-check form-switch">
                                    <label class="form-check-label" for="flexSwitchCheckDefault1">Trạng thái</label>
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        role="switch" 
                                        id="slider-status"
                                        name="status" 
                                        ${data.slider.status == 1 ? 'checked' : ''}
                                    >
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="slider-avatar">Ảnh đại diện<span class="text-danger">*</span></label>
                                    <div class="slider-avatar-img mb-2">
                                       ${data.slider.is_avatar ? '<img class="config-image" src="'+ data.slider.avatar +'" alt="Logo" width="160" height="160">' : ""}
                                    </div>
                                    <input type="hidden" id="slider-avatar" class="form-control" value="${data.slider.library_id}">
                                    <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-slider-avatar">
                                        <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                                    </button>
                                </div>
                            `;
                            $('#notication').html(html);
                        } else {
                            $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
                            $('#btn-submit').fadeOut().attr('disabled', false);
                            $('#btn-finish').fadeIn();
                        }
                        $('#btn-submit').attr('disabled', false);
                    },
                    error: function (e) {
                        $('#notication-send-mail').html('');
                        $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
                        $('#btn-submit').fadeOut().attr('disabled', false);
                        $('#btn-finish').fadeIn();
                    }
                });

                break;
            case 'delete':
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                $('#modal-page').modal('show');
                $('#modal-page .modal-title').text('Xóa slider');
                $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
                $('#btn-finish').fadeOut();

                $('#notication').html('<div class="text-center">Bạn có muốn xóa slider <strong class="text-danger">'+ name +'</strong> này không?</div>');

                break;
            default:
                alert("Hành động không có trong dữ liệu");
                break;
        }
    });

    $(".slider-select-position").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    });

    $(document).on('click', '.btn-slider-avatar', function () {
        $('#modal-library .modal-title').text('Chọn ảnh đại diện cho nhóm sản phẩm');
    });

    $('#btn-confirm').on('click', function () {
        var link = $('#libraryImage').attr('data-link');
        var id = $('#libraryImage').val();

        $('#slider-avatar').val(id);
        $('.slider-avatar-img').html('<img class="config-image" src="'+ link +'" alt="Logo" width="160" height="160">');
        $('#modal-library').modal('hide');
    });

    $('#btn-submit').on('click', function () {
        var title = $('#slider-name').val();
        var description = $('#slider-description').val();
        var sortNumber = $('#slider-sort-number').val();
        var position = $('#slider-select-position').val();
        var avatar = $('#slider-avatar').val();
        var action = $(this).attr('data-action');
        var status = 0;
        if ($('#slider-status').is(':checked')) {
            status = 1;
        }
        var isPreview = 0;
        if ($('#slider-is-preview').is(':checked')) {
            isPreview = 1;
        }
        var url = $('#slider-url').val();
        var id = 0;
        if (action === 'delete' || action === 'edit') id = $(this).attr('data-id');
        var _token = $('meta[name="csrf-token"]').attr('content');
        if (action === 'create' || action === 'edit')
        {
            if (!validate())
            {
                return false;
            }
        }

        $.ajax({
            url: '/admin/slider/action',
            type: 'post',
            data: {id: id, name: title, description: description, library_id: avatar, status: status, url: url, sort_number: sortNumber, position: position, is_preview: isPreview, action: action, _token: _token},
            dataType: 'json',
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#btn-submit').attr('disabled', true);
                $('#notication').html(html);
            },
            success: function (data) {
                if (data.error === 0) {
                    $('#notication').html('<div class="text-center text-success">' + data.message + '</div>');
                    listCategory();
                } else {
                    $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
                }
                $('#btn-submit').fadeOut();
                $('#btn-submit').attr('disabled', false);
                $('#btn-finish').fadeIn();
            },
            error: function (e) {
                $('#notication-send-mail').html('');
                $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
                $('#btn-submit').fadeOut();
                $('#btn-submit').attr('disabled', false);
                $('#btn-finish').fadeIn();
            }
        });
    });

    function validate() {
        var title = $('#slider-name').val();
        var description = $('#slider-description').val();
        var avatar = $('#slider-avatar').val();

        if (!title.length) {
            $('.message-error').html('<span class="text-danger">Tiêu đề slider không được để trống</span>');
            return false;
        } else if (title.length < 2 || title.length > 255) {
            $('.message-error').html('<span class="text-danger">Tiêu đề slider không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
            return false;
        }

        if (!description.length) {
            $('.message-error').html('<span class="text-danger">Nội dung slider phẩm không được để trống</span>');
            return false;
        }

        if (!avatar.length) {
            $('.message-error').html('<span class="text-danger">Ảnh đại diện slider không được để trống</span>');
            return false;
        }

        return true;
    }

    $(document).on('change', '.tbody-slider-status', function () {
        var id = $(this).attr('data-id');
        var type = 0;
        if (this.checked) {
            type = 1;
        }
        var action = 'change-status';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $(this).closest('tr').addClass('change-status');

        $.ajax({
            url: '/admin/slider/update-status',
            type: 'post',
            data: {id: id, status: type, action: action, _token: _token},
            dataType: 'json',
            success: function (data) {
                if (data.error === 0) {
                    alertifyNote(0, data.message);
                } else {
                    alertifyNote(1, data.message);

                    if (type) {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt slider" /></div>');
                    } else {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật slider" checked /></div>');
                    }
                }
                $('tr').removeClass('change-status');
            },
            error: function (e) {
                alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
            }
        });
    });

    $(document).on('click', '.copy-slider-url', async function (e) {
        e.preventDefault();
        var copyText = $(this).attr('data-slider-url');
        await parent.navigator.clipboard.writeText(copyText);

        alertifyNote(0, "Sao chép thành công");
    });

    $('.carousel').slick({
        arrows: true,
        dots: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 1000,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });      
});
