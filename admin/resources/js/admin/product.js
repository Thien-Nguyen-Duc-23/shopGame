$(document).ready(function () {
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
            url: '/admin/san-pham/get-list-product',
            // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
            dataType: 'json',
            beforeSend: function () {
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
        console.log(data.data);
        //var categories = data.data.categories;
        //console.log(categories);
        var html = '';
        $.each(data.data.data, function (index, product) {
            //console.log(product.product_category);
            
            html += '<tr>';
            // user

            if(product.is_category){
                html += '<td>' + product.name_category + '</td>';
            }else{
                html += '<td>' + 'Không tìm thấy danh mục!!' + '</td>';
            }
            
            // // Nội dung
            html += '<td> <a href="/admin/san-pham/infor-of-product/'+ product.id +'" >'+ product.name +' </a></td>';

            // Kiếm tra có hình ảnh hay không
            if(product.is_avatar){
                html += '<td><img src="' + product.avatar + '" width="100" height="100"></td>';
            }else{
                html += '<td>' + " " + '</td>';
            }
            
            html += '<td>' + product.pricing.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})  + '</td>';
            html += '<td>' + product.sale_pricing.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})  + '</td>';
            html += '<td>' + product.card_pricing.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})  + '</td>';
            
            html += '<td class="td-status">';
            if ( product.hidden === 0 ) {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-product-status" type="checkbox" role="switch" data-id="'+ product.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Ẩn chuyên mục bài viết" checked></div>';
            } else {
                html += '<div class="form-check form-switch"><input class="form-check-input tbody-product-status" type="checkbox" role="switch" data-id="'+ product.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết"></div>';
            }
            html += '</td>';

            // // hành động
            html += '<td class="button-action">';
            html += '<a href="/admin/san-pham/edit/'+ product.id +'" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></a>';
            //html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="'+ product.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
            html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1 delete-product" data-action="delete" data-name="'+ product.name +'" data-id="'+ product.id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
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
        var html_page = Pagination(total, per_page, current_page, '');
        $('tfoot').html(html_page);
        $('[data-toggle="tooltip"]').tooltip();

        // Bắt sự kiện xoá sản phẩm
        $('.delete-product').on('click', function(e){
            e.preventDefault();
            var productId = $(this).data('id');
            confirmDeleteProduct(productId);
        })
    }

    $(document).on('click', '.btn-product-avatar', function () {
        $('#modal-library .modal-title').text('Chọn hình ảnh cho sản phẩm');
    });

    $('#btn-confirm').on('click', function () {
        //var type = $(this).attr('data-type');
        var link = $('#libraryImage').attr('data-link');
        var id = $('#libraryImage').val();

        $('#product-avatar').val(id);
        $('.product-avatar-img').html('<img class="config-image" src="'+ link +'" alt="Image" width="160" height="160">');
        $('#modal-library').modal('hide');
    });

    function confirmDeleteProduct(productId) {
        var isConfirmed = confirm("Bạn chắc chắn muốn xoá sản phẩm này??");

        if(isConfirmed){
            if (isConfirmed) {
                $.ajax({
                    url: "/admin/san-pham/delete/" + productId,
                    success: function (response) {
                        console.log("Đã xoá thành công!!");
                        listPage();
                    },
                    error: function (error) {
                        console.error("Lỗi xoá sản phẩm: ", error);
                    }
                });
            }
        }
    }

    $(document).on('change', '.tbody-product-status', function(){
        var id = $(this).attr('data-id');
        var type = 0;
        if(this.checked) {
            type = 1;
        }
        var _token = $('meta[name="csrf-token"]').attr('content');
        $(this).closest('tr').addClass('change-status');

        console.log(id, type, _token);

        $.ajax({
            type: "post",
            url: "/admin/san-pham/changeStatusProduct",
            data: {
                id: id,
                type: type,
                _token: _token,
            },
            dataType: "json",
            success: function (data) {
                if (data.error === 0) {
                    alertifyNote(0, data.message);
                } else {
                    alertifyNote(1, data.message);

                    if (type)
                    {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-product-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết" /></div>');
                    }
                    else {
                        $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-product-status" type="checkbox" role="switch" data-id="'+ id +'" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật chuyên mục bài viết" checked /></div>');
                    }
                }
                $('tr').removeClass('change-status');
            },
            error: function (e) {
                console.log(e);
                alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
            }
        });
    })

    $(document).on('keyup', '#searchInput', function () {
        var searchInput = $(this).val();
        //console.log(searchInput);

        $.ajax({
            type: "get",
            url: "/admin/san-pham/search",
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

    $(document).on('input', '.pricing-input', function (){
        formatNumberInput($(this));
    });

    // Function format Number Input
    function formatNumberInput(input){
        var value = input.val();
        // Loại bỏ dấu chấm (.) và giữ lại dấu phẩy (,)
        var cleanedValue = value.replace(/[,.]/g, '');

        // Chuyển đổi giá trị thành số trước khi định dạng
        var numericValue = parseFloat(cleanedValue);

        var formattedValue = new Intl.NumberFormat('en-US').format(numericValue);
        
        input.val(formattedValue);
    }

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('data-page');

        $.ajax({
            url: '/admin/product/get-list-product',
            data: { page: page },
            dataType: 'json',
            beforeSend: function () {
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
