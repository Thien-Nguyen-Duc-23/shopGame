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

    listPage();
    function listPage() {
        $.ajax({
            url: '/admin/khach-hang/get-list-user',
            // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('tbody').html(html);
            },
            success: function (data) {
                // console.log(data);
                var html = '';
                if (!data.error) {
                    screen_list(data);
                } else {
                    html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
                    $('tbody').html(html);
                }
            },
            error: function (e) {
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('tbody').html(html);
            }
        });
    }

    function screen_list(data) {
        // console.log(data.role);
        var html = '';
        $.each(data.data.data, function (index , user) {
            html += '<tr>';
            // user
            html += '<td>' + user.last_name + ' ' + user.first_name  + '</td>';
            html += '<td>' + user.email + '</td>';
            html += '<td>' + user.name_group + '</td>';
            html += '<td>' + user.credits.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) + '</td>';
            html += '<td>' + user.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) + '</td>';
            html += '<td>' + user.socical_account + '</td>';
            html += '<td>' + user.text_last_login + '</td>';
            html += '<td>' + user.text_created_at + '</td>';
            // hành động
            html += '<td class="button-action">';
            html += '<button type="button" class="detail-user btn btn-sm btn-primary text-light edit_event m-1" data-action="edit" data-id="'+ user.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Chi tiết"><i class="fadeIn animated bx bx-show" style="margin-left: 5px;"></i></button>';
            html += '<button type="button" class="edit-user btn btn-sm btn-warning text-light edit_event m-1" data-action="edit" data-id="'+ user.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit" style="margin-left: 5px;"></i></button>';
            html += '<button type="button" class="delete-user btn btn-sm btn-danger action_event m-1" data-action="delete" data-name="'+ user.full_name +'" data-id="'+ user.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Xóa sự kiện"><i class="bx bx-trash" style="margin-left: 5px;"></i></button>';
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
        $('[data-toggle="tooltip"]').tooltip();

        $('.delete-user').on('click', function(e){
            e.preventDefault();
            var userId = $(this).attr('data-id');
            var fullName = $(this).attr('data-name');

            $('#btn-finish-delete').fadeOut();
            $('#btn-submit-delete').fadeIn().attr('disabled', false);;
            $('#modal-delete-user').modal('show');
            $('#modal-delete-user .modal-title').text('Xóa khách hàng');
            $('#btn-submit-delete').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', userId);

            $('#delete-user').html('<div class="text-center">Bạn có muốn xóa khách hàng: <strong class="text-danger">'+ fullName +'</strong> này không?</div>');
        });
    }

    $(document).on('click', '.copy-user-affiliate', async function (e) {
        e.preventDefault();
        var copyText = $(this).attr('data-token');
        await parent.navigator.clipboard.writeText(copyText);

        alertifyNote(0, "Sao chép thành công");
    });

    $(document).on('click', '.edit-user', function (e) {
        e.preventDefault();
        var userId = $(this).attr('data-id');
        location.href = 'khach-hang/'+userId+'/edit';
    });

    $(document).on('click', '.detail-user', function (e) {
        e.preventDefault();
        var userId = $(this).attr('data-id');
        location.href = 'khach-hang/'+userId+'/chi-tiet';
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('data-page');

        $.ajax({
            url: '/admin/khach-hang/get-list-user',
            data: { page: page },
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('tbody').html(html);
            },
            success: function (data) {
                var html = '';
                if (data.data != '') {
                    screen_list(data);
                } else {
                    html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
                    $('tbody').html(html);
                }
            },
            error: function (e) {
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('tbody').html(html);
            }
        });
    });

    $('#btn-submit-delete').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/admin/khach-hang/"+ id,
            type: 'delete',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#delete-user').html(html)
                $('#btn-submit-delete').attr('disabled', true);
            },
            success: function (data) {
                $('#btn-submit-delete').fadeOut();
                if (data.error === 0) {
                    $('#delete-user').html('<div class="text-center text-success">' + data.message + '</div>');
                    listPage();
                } else {
                    $('#delete-user').html('<div class="text-center text-danger">' + data.message + '</div>');
                }
                $('#btn-finish-delete').fadeIn().attr('disabled', false);
            },
            error: function (data) {
                $('#delete-user').html('<div class="text-center"><span class="text-center text-danger">Truy vấn thất bại!</span><div>');
                $('#btn-submit-delete').fadeOut().attr('disabled', false);
                $('#btn-finish-delete').fadeIn();
            }
        });
    });

    $("#role-select-clear-field").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    if(typeof(userRole) != "undefined" && userRole) {
        $("#role-select-clear-field").val(userRole).trigger('change')
    }

    $("#gender-select-clear-field").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    if(typeof(gender) != "undefined" && gender) {
        $("#gender-select-clear-field").val(gender).trigger('change')
    }

    $('.btn-user-logo').on('click', function () {
        $('#btn-confirm').attr("data-type", 'logo').text('Xác nhận');
        $('#modal-library .modal-title').text('Thiết lập ảnh đại diện');
    });
    
    $('#btn-confirm').on('click', function () {
        var link = $('#libraryImage').attr('data-link');
        var id = $('#libraryImage').val();
        if (typeof(link) !== 'undefined')
        {
            $('.website-logo-container').html('<img class="config-image" src="'+ link +'" alt="Logo" style="max-height: 300px; max-width: 300px; margin-left: 10px;">');
            $('#library_id').val(link);
            $('#modal-library').modal('hide');
        } else {
            alert("Vui lòng chọn hình ảnh trước khi xác nhận");
        }
    });

    $("#date-birthday").flatpickr({
        enableTime: false,
        dateFormat: "d-m-Y",
    });

    $(document).on('change', '.tbody-user-status', function () {
        var id = $(this).attr('data-id');
        var type = 0;
        if (this.checked) {
            type = 1;
        }
        var action = 'change-status';
        var _token = $('meta[name="csrf-token"]').attr('content');
        $(this).closest('tr').addClass('change-status');

        $.ajax({
            url: '/admin/khach-hang/update-status',
            type: 'post',
            data: {id: id, status: type, action: action, _token: _token},
            dataType: 'json',
            success: function (data) {
                if (data.error === 0) {
                    alertifyNote(0, data.message);
                } else {
                    alertifyNote(1, data.message);

                    if (type)
                    {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật mã giảm giá" /></div>');
                    }
                    else {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật mã giảm giá" checked /></div>');
                    }
                }
                $('tr').removeClass('change-status');
            },
            error: function (e) {
                alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
            }
        });

    });

    $('#is-change-password').change(function() {
        if(this.checked) {
            $('#change-password').removeAttr('hidden');
        } else {
            $('#change-password').attr("hidden", true);
        }
    });

    $(document).on('keyup', '#searchInput', function () {
        var searchInput = $(this).val();

        $.ajax({
            type: "get",
            url: "/admin/khach-hang/search",
            data: {
                q: searchInput,
            },
            dataType: "json",
            success: function (data) {
                if (data.error === 0) {
                    // Render lại bảng dữ liệu hoặc thực hiện các thao tác khác
                    screen_list(data);
                } else {
                    // Hiển thị thông báo lỗi nếu có
                    alert(data.message);
                }
            },
            error: function (error) {
            }
        });
    });
});
