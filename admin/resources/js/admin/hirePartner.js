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
            url: '/admin/cay-thue/get-list-hire',
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
                console.log(e);
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('tbody').html(html);
            }
        });
    }

    function screen_list(data) {
        // console.log(data.role);
        var html = '';
        console.log(data.data['data']);
        $.each(data.data['data'], function (index , hirePartner) {
            html += '<tr>';
            // Tên nhóm Hire Partner
            html += '<td> <a href="/admin/cay-thue/infor-of-hirepartner/'+ hirePartner.id +'" >'+ hirePartner.name +' </a></td>';
            // Nội dung
            html += '<td>' + hirePartner.rate + '%</td>';
            if (hirePartner.token) {
                var urlToken = window.location.href + '?token=' + hirePartner.token;
                html += '<td>' + urlToken + ' <button type="button" class="btn-clipboard copy-hire-token" title="" data-bs-original-title="Copy to clipboard" data-token="'+ urlToken +'"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M19 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2V4a2 2 0 0 1 2-2zm-4 6H5v12h10zm-5 7a1 1 0 1 1 0 2H8a1 1 0 1 1 0-2zm9-11H9v2h6a2 2 0 0 1 2 2v8h2zm-7 7a1 1 0 0 1 .117 1.993L12 13H8a1 1 0 0 1-.117-1.993L8 11z"/></g></svg></button></td>';
            } else {
                html += '<td></td>';
            }
            
            // hành động
            html += '<td class="button-action">';
            html += '<button type="button" class="btn btn-sm btn-primary action_event me-1 mb-1 addUserToGroup"  data-name="' + hirePartner.name + '" data-id="' + hirePartner.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Thêm khách hàng vào nhóm"><i class="bx bx-user-plus"></i></button>';
            html += '<a href="/admin/cay-thue/edit/'+ hirePartner.id +'" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="far fa-edit bx bx-edit"></i></a>';
            //html += '<a href="/admin/danh-muc/delete/'+ category.id +'" class="btn btn-sm btn-danger action_event mr-2 mb-1" data-toggle="tooltip" data-placement="top" data-original-title="Xoá" onclick="return confirm("Bạn chắc chắn muốn xoá danh muc này ??")"><i class="bx bx-trash"></i></a>';
            //html += '<button type="button" class="btn btn-sm btn-warning text-light edit_event mr-2 mb-1" data-action="edit" data-id="'+ category.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit"></i></button>';
            html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1 delete-hirePartner" data-action="delete" data-name="'+ hirePartner.name +'" data-id="'+ hirePartner.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Xoá"><i class="bx bx-trash"></i></button>';
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

        // Bắt sự kiện xoá nhóm cày thuê
        $('.delete-hirePartner').on('click', function(e){
            e.preventDefault();
            var hirePartnerId = $(this).data('id');
            confirmDeleteHirePartner(hirePartnerId);
        })
    }

    // Bắt event khi người dùng click vào button thêm người dùng vào nhóm
    $(document).on('click', '.addUserToGroup', function () {
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Thêm người dùng vào nhóm cày thuê');
        //$('#btn-submit').fadeIn().text('Thêm người dùng').attr('data-action', 'addUserToGroup').attr('data-id', id);
        $('#btn-submit-hire').fadeIn().attr('disabled', false);
        //$("#select-user-ids").val([]).trigger('change')
        var hirePartnerId = $(this).data('id');
        $('#hire-id').val(hirePartnerId);
        
        //console.log(id);
    })

    $('#btn-submit-hire').click(function (e) {
        e.preventDefault();

        //console.log(1);

        $.ajax({
            data: $('#hire-form').serialize(),
            type: "POST",
            url: "/admin/cay-thue/add-user-to-group",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                console.log("Thêm user vào nhóm thành công!!");

                // Làm mới trang sau khi thêm thành công
                window.location.reload(true);
            },
            error: function (error) {
                console.error("Thêm thất bại: ", error);
            }
        });
    })

    $(document).on('click', '.copy-hire-token', async function (e) {
        e.preventDefault();
        var copyText = $(this).attr('data-token');
        await parent.navigator.clipboard.writeText(copyText);

        alertifyNote(0, "Sao chép thành công");
    });

    function confirmDeleteHirePartner(hirePartnerId){
        var isConfirmed = confirm('Bạn có chắc muốn xoá nhóm cày thuê này không??');

        if (isConfirmed) {
            $.ajax({
                url: "/admin/cay-thue/delete/" + hirePartnerId,
                success: function (response) {
                    console.log("Đã xoá thành công!!");
                    listPage();
                },
                error: function (error) {
                    console.error("Lỗi xoá danh mục: ", error);
                }
            });
        }
    }

    $(document).on('keyup', '#searchInput', function () {
        var searchInput = $(this).val();
        //console.log(searchInput);

        $.ajax({
            type: "get",
            url: "/admin/cay-thue/search",
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
                console.log(error);
            }
        });
    });

    // Khi thêm User vào nhóm hirepartner thì hiển thị user đã chọn và đồng thười tăng chiều rộng của ô đó
    $("#select-user-ids").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    });

    // Khi click chỉnh sửa thì mới có thẻ input ẩn có id là hireUserIds dùng để lấy giá trị user_ids đã chọn và dùng hàm trigger để hiển thị
    var hireUserIdsValue = $('#hireUserIds').val();

    //console.log(hireUserIdsValue);

    if (hireUserIdsValue) {
        hireUserIdsValue = JSON.parse("[" + hireUserIdsValue + "]");

        if(typeof(hireUserIdsValue) != "undefined" && hireUserIdsValue) {
            $("#select-user-ids").val(hireUserIdsValue).trigger('change')
        }
    }

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('data-page');

        $.ajax({
            url: '/admin/cay-thue/get-list-hire',
            data: { page: page },
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('tbody').html(html);
            },
            success: function (data) {
                // console.log(data);
                var html = '';
                if (data.data != '') {
                    screen_list(data);
                } else {
                    html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
                    $('tbody').html(html);
                }
            },
            error: function (e) {
                console.log(e);
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('tbody').html(html);
            }
        });
    });

});
