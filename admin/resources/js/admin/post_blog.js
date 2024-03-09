$(document).ready(function() {

    listPost();
    function listPost() {
        var q = $('#q').val();
        var sl = $('#sl').val();
        var category_id = $('#category_id').val();

        $.ajax({
            url: '/admin/bai-viet/getPost',
            data: {q: q, sl: sl, category_id: category_id},
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
        $.each(data.data, function (index , post) {
            html += '<tr>';
            // avatar
            html += '<td class="text-center">';
            if (post.is_avatar)
            {
                html += '<img src="' + post.avatar + '" alt="'+ post.title +'" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
            }
            html += '</td>';
            // // Nội dung
            html += '<td><a href="/admin/bai-viet/chinh-sua-bai-viet/' + post.id + '">';
            if ( post.title.length ) {
                html += post.title;
            } else {
                html += '(Không có tiêu đề)';
            }
            html += '</a></td>';
            html += '<td>' + post.category_name + '</td>';
            html += '<td class="td-status">';
            if ( post.hidden === 0 ) {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ post.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ẩn chuyên mục bài viết" checked></div>';
            } else {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ post.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết"></div>';
            }
            html += '</td>';
            html += '<td>Lần sửa gần nhất <br />' + post.text_time + '</td>';
            html += '<td>' + post.text_author + '</td>';
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
            html += '<a href="/admin/bai-viet/chinh-sua-bai-viet/' + post.id + '" type="button" class="btn btn-sm btn-warning text-light me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></a>';
            html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="'+ post.title +'" data-id="'+ post.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa bài viết"><i class="bx bx-trash-alt me-0"></i></button>';
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

    $(document).on('clic', '.pagination a', function () {
        var q = $('#q').val();
        var sl = $('#sl').val();
        var category_id = $('#category_id').val();
        var page = $(this).attr('data-page');

        $.ajax({
            url: '/admin/bai-viet/getPost',
            data: {q: q, sl: sl, category_id: category_id, page: page},
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
                        $('tbody').html('<td colspan="15" class="text-center text-danger">Không có bài viết trong dữ liệu</td>');
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
    });

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
            url: '/admin/post/actionPost',
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
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ẩn bài viết" /></div>');
                    }
                    else {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật bài viết" checked /></div>');
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

    $(document).on('click', '.action_event', function () {
        var action = $(this).attr('data-action');
        // console.log(action)
        switch (action) {
            case 'delete':
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');
                $('#modal-page').modal('show');
                $('#modal-page .modal-title').text('Xóa chuyên mục bài viết');
                $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
                $('#btn-finish').fadeOut();

                var html = '<div class="text-center">Bạn có muốn xóa bài viết <strong class="text-danger">';
                if (name.length)
                {
                    html += name;
                }
                else
                {
                    html += '(Không có tiêu đề)';
                }
                html += '</strong> này không?</div>';

                $('#notication').html(html);

                break;
            default:
                alert("Hành động không có trong dữ liệu");
                break;
        }
    });


    $('#btn-submit').on('click', function () {
        var id = $(this).attr('data-id');
        var _token = $('meta[name="csrf-token"]').attr('content');
        var action = $(this).attr('data-action');

        $.ajax({
            url: '/admin/post/actionPost',
            type: 'post',
            data: {id: id, action: action, _token: _token},
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
                    listPost();
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

});
