$(document).ready(function() {

    listCategory();
    function listCategory() {
        var q = $('#q').val();
        var sl = $('#sl').val();

        $.ajax({
            url: '/admin/post/getGroupPost',
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
                        $('tbody').html('<td colspan="15" class="text-center text-danger">Không có chuyên mục trong dữ liệu</td>');
                    }
                } else {
                    $('tbody').html('<td colspan="15" class="text-center text-danger">' + data.message + '</td>');
                }
            },
            error: function (e) {
                console.log(e);
                $('tbody').html('<td colspan="15" class="text-center text-danger">Truy vấn thất bại!</td>');
            }
        });

    }

    function screen_list(data) {
        // console.log(data.role);
        var html = '';
        $.each(data.data, function (index , category) {
            html += '<tr>';
            // avatar
            html += '<td>';
            if (category.is_avatar)
            {
                html += '<img src="' + category.avatar + '" alt="'+ category.name +'" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
            }
            html += '</td>';
            // // Nội dung
            html += '<td>' + category.name + '</td>';
            html += '<td>' + category.qtt_post + '</td>';
            html += '<td class="td-status">';
            if ( category.hidden === 0 ) {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ category.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ẩn chuyên mục bài viết" checked></div>';
            } else {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ category.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết"></div>';
            }
            html += '</td>';
            // html += '<td>' + event.qtt_used + '</td>';
            // html += '<td>';
            // if ( event.status ) {
            //     html += '<span class="text-success">Đã kích hoạt</span>';
            // }
            // else {
            //     html += '<span class="text-danger">Chưa kích hoạt</span>';
            // }
            // html += '</td>';
            // // hành động
            html += '<td class="button-action">';
            html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="'+ category.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
            html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="'+ category.name +'" data-id="'+ category.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
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
        $('#qttVpsSearch').html(
            "<span class='text-primary'>Tổng cộng: " + total + "</span>"
        );
        var html_page = Pagination( total, per_page, current_page, '');
        $('tfoot').html(html_page);
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    $('#createGroup').on('click', function () {
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Thêm chuyên mục bài viết');
        $('#btn-submit').fadeIn().text('Tạo chuyên mục').attr('data-action', 'create');
        $('#btn-finish').fadeOut();
        var html = `
            <div class="message-error"></div>
            <div class="form-group">
                <label for="category-title">Tiêu đề</label>
                <input type="text" class="form-control" id="category-title" value="" placeholder="Tiêu đề chuyên mục">
            </div>
            <div class="form-group">
                <label for="category-description">Ghi chú</label>
                <textarea class="form-control" id="category-description" placeholder="Ghi chú"></textarea>
            </div>
            <div class="form-group">
                <label for="category-stt">Số thứ tự</label>
                <input type="text" class="form-control" id="category-stt" placeholder="Số thứ tự"></input>
            </div>
            <div class="form-group">
                <label for="category-status">Trạng thái</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="category-status" value="1" checked>
                </div>
            </div>
            <div class="form-group">
                <label for="category-avatar">Ảnh đại diện</label>
                <div class="category-avatar-img mb-2"></div>
                <input type="hidden"  id="category-avatar" class="form-control" value="">
                <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-category-avatar">
                    <i class="bx bx-cloud-upload mr-1"></i> Chọn ảnh đại diện
                </button>
            </div>
        `;

        $('#notication').html(html);
    });

    $(document).on('click', '.action_event', function () {
        var action = $(this).attr('data-action');
        // console.log(action)
        switch (action) {
            case 'edit':
                var id = $(this).attr('data-id');
                $('#modal-page').modal('show');
                $('#modal-page .modal-title').text('Chỉnh sửa chuyên mục bài viết');
                $('#btn-submit').fadeIn().text('Cập nhật').attr('data-action', 'edit').attr('data-id', id);
                $('#btn-finish').fadeOut();

                $.ajax({
                    url: '/admin/post/getDetailGroupPost',
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
                                    <label for="category-title">Tiêu đề</label>
                                    <input type="text" class="form-control" id="category-title" value="${data.category.name}" placeholder="Tiêu đề chuyên mục" />
                                </div>
                                <div class="form-group">
                                    <label for="category-description">Ghi chú</label>
                                    <textarea class="form-control" id="category-description" placeholder="Ghi chú">${data.category.description}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category-stt">Số thứ tự</label>
                                    <input type="text" class="form-control" id="category-stt" placeholder="Số thứ tự" value="${data.category.stt}" />
                                </div>
                                <div class="form-group">
                                    <label for="category-status">Trạng thái</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="category-status" value="1" ${data.category.hidden === 0 ? "checked" : ""}>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category-avatar">Ảnh đại diện</label>
                                    <div class="category-avatar-img mb-2">
                                       ${data.category.is_avatar ? '<img class="config-image" src="'+ data.category.avatar +'" alt="Logo" width="160" height="160">' : ""}
                                    </div>
                                    <input type="hidden"  id="category-avatar" class="form-control" value="${data.category.library_id}">
                                    <button type="button" class="btn btn-outline-dark btn-sm btn-open-library btn-category-avatar">
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
                $('#modal-page .modal-title').text('Xóa chuyên mục bài viết');
                $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
                $('#btn-finish').fadeOut();

                $('#notication').html('<div class="text-center">Bạn có muốn xóa chuyên mục bài viết <strong class="text-danger">'+ name +'</strong> này không?</div>');

                break;
            default:
                alert("Hành động không có trong dữ liệu");
                break;
        }
    });

    $(document).on('click', '.btn-category-avatar', function () {
        $('#modal-library .modal-title').text('Chọn ảnh đại diện cho danh mục');
    });

    $('#btn-confirm').on('click', function () {
        //var type = $(this).attr('data-type');
        var link = $('#libraryImage').attr('data-link');
        var id = $('#libraryImage').val();

        $('#category-avatar').val(id);
        $('.category-avatar-img').html('<img class="config-image" src="'+ link +'" alt="Logo" width="160" height="160">');
        $('#modal-library').modal('hide');
    });

    $('#btn-submit').on('click', function () {
        var title = $('#category-title').val();
        var description = $('#category-description').val();
        var avatar = $('#category-avatar').val();
        var stt = $('#category-stt').val();
        var status = $('#category-status').val();
        var action = $(this).attr('data-action');
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
            url: '/admin/post/actionGroupPost',
            type: 'post',
            data: {id: id, title: title, description: description, avatar: avatar, action: action, stt: stt, status: status, _token: _token},
            dataType: 'json',
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#btn-submit').attr('disabled', true);
                $('#notication').html(html);
            },
            success: function (data) {
                // console.log(data);
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
                console.log(e);
                $('#notication-send-mail').html('');
                $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
                $('#btn-submit').fadeOut();
                $('#btn-submit').attr('disabled', false);
                $('#btn-finish').fadeIn();
            }
        });

    });

    function validate() {

        var title = $('#category-title').val();
        var description = $('#category-description').val();

        if (!title.length)
        {
            $('.message-error').html('<span class="text-danger">Tiêu đề chuyên mục không được để trống</span>');
            return false;
        }
        else if (title.length < 2 || title.length > 255)
        {
            $('.message-error').html('<span class="text-danger">Tiêu đề chuyên mục không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
            return false;
        }

        if (description.length > 255)
        {
            $('.message-error').html('<span class="text-danger">Tiêu đề chuyên mục không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
            return false;
        }

        return true;
    }

    $(document).on('change', '.tbody-category-status', function () {
        var id = $(this).attr('data-id');
        var type = 0;
        if (this.checked)
        {
            type = 1;
        }
        var action = 'change-status';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $(this).closest('tr').addClass('change-status');

        $.ajax({
            url: '/admin/post/actionGroupPost',
            type: 'post',
            data: {id: id, type: type, action: action, _token: _token},
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                if (data.error === 0) {
                    alertifyNote(0, data.message);
                } else {
                    alertifyNote(1, data.message);

                    if (type)
                    {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ẩn chuyên mục bài viết" /></div>');
                    }
                    else {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết" checked /></div>');
                    }
                }
                $('tr').removeClass('change-status');
            },
            error: function (e) {
                console.log(e);
                alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
            }
        });

    });

});
