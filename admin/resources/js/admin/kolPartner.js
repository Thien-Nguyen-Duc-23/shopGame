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
            url: '/admin/kol/get-list-kol',
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
        $.each(data.data['data'], function (index , kolPartner) {
            html += '<tr>';
            // user
            html += '<td class="text-center"> <a href="kol/user-of-kol/'+ kolPartner.id +'" >'+ kolPartner.name +' </a></td>';
            html += '<td class="text-center">'+ kolPartner.number_user +'</td>';
            // // Nội dung
            html += '<td class="text-center">' + kolPartner.number_user + '</td>';
            if (kolPartner.token) {
                var urlToken = window.location.href + '?token=' + kolPartner.token;
                var urlTokenSortLink = window.location.href + '?token=' + kolPartner.token.substr(0,16)+'...  ';
                html += '<td data-toggle="tooltip" data-placement="top" title="'+ urlToken +'">' + urlTokenSortLink + ' <button type="button" class="btn-clipboard copy-kol-token" title="" data-bs-original-title="Copy to clipboard" data-token="'+ urlToken +'"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M19 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2V4a2 2 0 0 1 2-2zm-4 6H5v12h10zm-5 7a1 1 0 1 1 0 2H8a1 1 0 1 1 0-2zm9-11H9v2h6a2 2 0 0 1 2 2v8h2zm-7 7a1 1 0 0 1 .117 1.993L12 13H8a1 1 0 0 1-.117-1.993L8 11z"/></g></svg></button></td>';
            } else {
                html += '<td></td>';
            }
            // hành động
            html += '<td class="text-center button-action">';
            html += '<button type="button" class="text-center btn btn-sm btn-primary text-light add-user-to-kol m-1" data-name="'+ kolPartner.name +'" data-id="'+ kolPartner.id +'" data-user_ids="'+ kolPartner.user_ids +'" data-rate="'+ kolPartner.rate +'" data-toggle="tooltip" data-placement="top" title="Thêm khách hàng vào kol"><i class="bx bx-user-plus" style="margin-right: -2px;"></i></button>';
            html += '<button type="button" class="text-center editClick btn btn-sm btn-warning text-light edit_event m-1" data-action="edit" data-name="'+ kolPartner.name +'" data-id="'+ kolPartner.id +'" data-user_ids="'+ kolPartner.user_ids +'" data-rate="'+ kolPartner.rate +'" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit" style="margin-right: -2px;"></i></button>';
            html += '<button type="button" class="text-center deleteKolBtn btn btn-sm btn-danger action_event m-1" data-action="delete" data-name="'+ kolPartner.name +'" data-id="'+ kolPartner.id +'" data-user_ids="'+ kolPartner.user_ids +'" data-rate="'+ kolPartner.rate +'" data-toggle="tooltip" data-placement="top" data-original-title="Xóa sự kiện"><i class="bx bx-trash" style="margin-right: -2px;"></i></button>';
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

        $('.deleteKolBtn').on('click', function(e){
            e.preventDefault();
            var kolPartnerId = $(this).attr('data-id');
            var name = $(this).attr('data-name');

            $('#btn-finish-delete').fadeOut();
            $('#btn-submit-delete').fadeIn().attr('disabled', false);;
            $('#modal-delete-kol').modal('show');
            $('#modal-delete-kol .modal-title').text('Xóa kol');
            $('#btn-submit-delete').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', kolPartnerId);

            $('#delete-kol').html('<div class="text-center">Bạn có muốn xóa kol <strong class="text-danger">'+ name +'</strong> này không?</div>');
        });
    }

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
    $('#btn-finish').fadeOut();

    $(document).on('click', '.editClick', function (e) {
        e.preventDefault();
        $('#btn-finish').fadeOut();
        $('#body-kol-form').removeAttr('hidden');
        $('#temp-form').attr("hidden", true);
    
        $('#btn-submit-kol').fadeIn().attr('disabled', false);
        var kolPartnerId = $(this).attr('data-id');
        var kolPartnerName = $(this).attr('data-name');
        var kolPartnerRate = $(this).attr('data-rate');
        var kolPartnerUserIds = $(this).attr('data-user_ids');

        if (kolPartnerUserIds) {
            kolPartnerUserIds = JSON.parse("[" + kolPartnerUserIds + "]");

            if(typeof(kolPartnerUserIds) != "undefined" && kolPartnerUserIds) {
                $("#select-user-ids").val(kolPartnerUserIds).trigger('change')
            }
        }

        $('#kol-id').val(kolPartnerId);
        $('#kol-rate').val(kolPartnerRate);
        $('#kol-name').val(kolPartnerName);

        clearErrorKolName();
        clearErrorKolRate();
        $('#modal-create-kol .modal-title').text('Chỉnh sửa kol');
        $('#modal-create-kol').modal('show');
    });

    $(document).on('click', '.add-user-to-kol', function (e) {
        e.preventDefault();
        var kolPartnerUserIds = $(this).attr('data-user_ids');
        var kolPartnerId = $(this).attr('data-id');
        var kolPartnerName = $(this).attr('data-name');

        if (kolPartnerUserIds) {
            kolPartnerUserIds = JSON.parse("[" + kolPartnerUserIds + "]");

            if(typeof(kolPartnerUserIds) != "undefined" && kolPartnerUserIds) {
                $("#select-user-id-box-add-user").val(kolPartnerUserIds).trigger('change')
            }
        }
        $('#temp-add-user-form').html('')
        $('#btn-finish-add-user').fadeOut();
        $('#btn-submit-add-user').fadeIn().attr('disabled', false);;
        $('#add-user-to-ko-modal').removeAttr("hidden", true);
        $('#modal-add-user-to-kol').modal('show');
        $('#modal-add-user-to-kol .modal-title').text('Thêm người dùng cho ' + kolPartnerName);
        $('#kol-id-parent').val(kolPartnerId);
    })

    $('#btn-submit-add-user').click(function (e) {
        e.preventDefault();
        var id = $('#kol-id-parent').val();
        var userIds = $("#select-user-id-box-add-user").val()
        $.ajax({
            data: {id: id, user_ids: userIds},
            url: "/admin/kol/create-or-update",
            type: 'post',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#add-user-to-ko-modal').attr("hidden", true);
                $('#temp-add-user-form').html(html)
                $('#btn-submit-add-user').attr('disabled', true);
            },
            success: function (data) {
                $('#btn-submit-add-user').fadeOut();
                if (data.error === 0) {
                    $('#temp-add-user-form').html('<div class="text-center text-success">' + data.message + '</div>');
                    listPage();
                } else {
                    $('#temp-add-user-form').html('<div class="text-center text-danger">' + data.message + '</div>');
                }
                $('#btn-finish-add-user').fadeIn().attr('disabled', false);
            },
            error: function (data) {
                var message = data.responseJSON.message ? data.responseJSON.message : 'Truy vấn thất bại!';
                $('#temp-add-user-form').html('<div class="text-center"><span class="text-center text-danger">'+ message +'</span><div>');
                $('#btn-submit-add-user').fadeOut().attr('disabled', false);
                $('#btn-finish-add-user').fadeIn();
            }
        });
    });
    
    $(document).on('click', '.copy-kol-token', async function (e) {
        e.preventDefault();
        var copyText = $(this).attr('data-token');
        await parent.navigator.clipboard.writeText(copyText);

        alertifyNote(0, "Sao chép thành công");
    });

    $('#btn-submit-delete').click(function (e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $.ajax({
            data: $('#kol-form').serialize(),
            url: "/admin/kol/delete/"+ id,
            type: 'delete',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#delete-kol').html(html)
                $('#btn-submit-delete').attr('disabled', true);
            },
            success: function (data) {
                $('#btn-submit-delete').fadeOut();
                if (data.error === 0) {
                    $('#delete-kol').html('<div class="text-center text-success">' + data.message + '</div>');
                    listPage();
                } else {
                    $('#delete-kol').html('<div class="text-center text-danger">' + data.message + '</div>');
                }
                $('#btn-finish-delete').fadeIn().attr('disabled', false);
            },
            error: function (data) {
                var message = data.responseJSON.message ? data.responseJSON.message : 'Truy vấn thất bại!';
                $('#delete-kol').html('<div class="text-center"><span class="text-center text-danger">'+ message +'</span><div>');
                $('#btn-submit-delete').fadeOut().attr('disabled', false);
                $('#btn-finish-delete').fadeIn();
            }
        });
    });

    $("#select-user-ids").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    });

    $("#select-user-id-box-add-user").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    });

    $('#btn-create-kol').on('click', async function () {
        $('#body-kol-form').removeAttr('hidden');
        $('#temp-form').attr("hidden", true);
        clearErrorKolName();
        clearErrorKolRate();
        $("#select-user-ids").val([]).trigger('change')
        $('#kol-rate').val(null);
        $('#kol-name').val(null);
        $('#btn-finish').fadeOut();
        $('#btn-submit-kol').fadeIn().attr('disabled', false);
        $('#modal-create-kol .modal-title').text('Tạo kol');
        $('#modal-create-kol').modal('show');
    });

    function clearErrorKolName()
    {
        $('#error-kol-name').attr("hidden", true);
        $('#error-kol-name').text('');
        $('#kol-name').removeClass('font-weight-normal border border-danger')
    }

    function clearErrorKolRate()
    {
        $('#error-kol-rate').attr("hidden", true);
        $('#error-kol-rate').text('');
        $('#kol-rate').removeClass('font-weight-normal border border-danger')
    }

    $('#btn-submit-kol').click(function (e) {
        e.preventDefault();

        var kolRate = $('#kol-rate').val();
        var kolName = $('#kol-name').val();

        var isValidateRate = true;
        var isValidateName = true;
        if (parseInt(kolRate) > 100 || !kolRate) {
            isValidateRate = false
            $('#error-kol-rate').removeAttr('hidden');
            $('#error-kol-rate').text('Chiết khấu không được bỏ trống và phải nhỏ hớn 100%.');
            $('#kol-rate').addClass('font-weight-normal border border-danger')
        } else {
            isValidateRate = true
            clearErrorKolRate();
        }

        if (!kolName || kolName.length > 255) {
            isValidateName = false
            $('#error-kol-name').removeAttr('hidden');
            $('#error-kol-name').text('Tên không được bỏ trống và phải nhỏ hớn 255 kí tự.');
            $('#kol-name').addClass('font-weight-normal border border-danger')
        } else {
            isValidateName = true
            clearErrorKolName();
        }

        if (isValidateName && isValidateRate) {
            $('#body-kol-form').attr("hidden", true);
            $('#temp-form').removeAttr('hidden');
            $.ajax({
                data: $('#kol-form').serialize(),
                url: "kol/create-or-update",
                type: "POST",
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function(){
                    $('#temp-form').html('')
                    var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                    $('#temp-form').html(html)
                    $('#btn-submit-kol').attr('disabled', true);
                },
                success: function (data) {
                    $('#btn-submit-kol').fadeOut();
                    if (data.error === 0) {
                        $('#temp-form').html('<div class="text-center text-success">' + data.message + '</div>');
                        listPage();
                    } else {
                        $('#temp-form').html('<div class="text-center text-danger">' + data.message + '</div>');
                    }

                    $('#btn-finish').fadeIn();
                },
                error: function (data) {
                    $('#body-kol-form').attr("hidden", true);
                    $('#temp-form').html('<div class="text-center"><span class="text-center text-danger">Truy vấn thất bại!</span><div>');
                    $('#btn-submit-kol').fadeOut().attr('disabled', false);
                    $('#btn-finish').fadeIn();
               }
            });
        }
    });
});
