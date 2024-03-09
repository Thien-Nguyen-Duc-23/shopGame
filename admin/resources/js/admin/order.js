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
            url: '/admin/order/get-list-order',
            // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('#table-order-index tbody').html(html);
            },
            success: function (data) {
                var html = '';
                if (!data.error) {
                    screen_list(data);
                } else {
                    html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
                    $('#table-order-index tbody').html(html);
                }
            },
            error: function (e) {
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('#table-order-index tbody').html(html);
            }
        });
    }

    function screen_list(data) {
        var html = '';
        $.each(data.data['data'], function (index , order) {
            html += '<tr>';
            // user
            html += '<td>' + order.id +'</td>';
            html += '<td>' + order.processor_name +'</td>';
            html += '<td>' + order.customer_name +'</td>';
            html += '<td>' + order.product_name +'</td>';
            html += '<td>' + order.quantity +'</td>';
            html += '<td>' + order.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) +'</td>';
            html += '<td>' + order.created_at +'</td>';
            html += '<td>';
            switch(parseInt(order.status)) {
                case 0:
                    html += '<button disabled type="button" class="btn btn-sm btn-outline-warning">Chờ giao hàng</button></span>';
                    break;
                case 1:
                    html += '<button disabled type="button" class="btn btn-sm btn-outline-success">Đã giao hàng</button></span>';
                    break;
                case 2:
                    html += '<button disabled type="button" class="btn btn-sm btn-outline-danger">Thất bại</button></span>';
                    break;
                case 3:
                    html += '<button disabled type="button" class="btn btn-sm btn-outline-primary">Đã hoàn tiền</button></span>';
                    break;
                default:
                    break;
            }
            html += '</td>';
            // hành động
            html += '<td class="button-action">';
            html += '<button type="button" class="edit-order btn btn-sm btn-warning text-light edit_event m-1" data-action="edit" data-id="'+ order.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit" style="margin-left: 5px;"></i></button>';
            html += '<button type="button" class="delete-order btn btn-sm btn-danger action_event m-1" data-action="delete" data-name="'+ order.name +'" data-id="'+ order.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Xóa sự kiện"><i class="bx bx-trash" style="margin-left: 5px;"></i></button>';
            html += '</td>';

            html += '</tr>';
        });
        $('#table-order-index tbody').html(html);
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

        $('.delete-order').on('click', function(e){
            e.preventDefault();
            var orderId = $(this).attr('data-id');

            $('#btn-finish-delete').fadeOut();
            $('#btn-submit-delete').fadeIn().attr('disabled', false);;
            $('#modal-delete-order').modal('show');
            $('#modal-delete-order .modal-title').text('Xóa đơn hàng');
            $('#btn-submit-delete').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', orderId);

            $('#delete-order').html('<div class="text-center">Bạn có muốn xóa đơn hàng ID:<strong class="text-danger">'+ orderId +'</strong> này không?</div>');
        });
    }

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('data-page');

        $.ajax({
            url: '/admin/promo-code/get-list-promo-code',
            data: { page: page },
            dataType: 'json',
            beforeSend: function(){
                var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
                $('#table-order-index tbody').html(html);
            },
            success: function (data) {
                var html = '';
                if (data.data != '') {
                    screen_list(data);
                } else {
                    html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
                    $('#table-order-index tbody').html(html);
                }
            },
            error: function (e) {
                var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
                $('#table-order-index tbody').html(html);
            }
        });
    });

    $("#select-user-ids").select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    $('#status-order-select').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    $('#select-product-id').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    $("#add-order-infor-button").click(function(){
        var html = '<tr>';
            html +='<td>'
                html +='<input type="text" name="name[]" placeholder="Vui lòng nhập tên" class="form-control"/>'
            html +='</td>'
            html +='<td>'
                html +='<input type="text" name="content[]" placeholder="Vui lòng nhập nội dung" class="form-control"/>'
            html +='</td>'
            html +='<td>'
                html +='<button onClick="$(this).parent().parent().remove();" type="button" class="btn btn-outline-danger"><i class="bx bx-trash" style="margin-left: 5px;"></i></button>'
            html +='</td>'
        html += '</tr>';

        $('#add-item').before(html);
    });

    $('.inp-amount').on('change', function () {
        var amount = $(this).val();
        amount = amount.replaceAll('.', '');
        amount = amount.replaceAll(',', '');
        amount = addCommas(amount);
        $(this).val(amount);
    });

    function addCommas(nStr)
    {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    if(typeof(productId) != "undefined" && productId) {
        $("#select-product-id").val(productId).trigger('change')
    }

    $('#select-product-id').on('change', function() {
        var productId = this.value;
        if (productId) {
            $.ajax({
                url: '/admin/san-pham/detail/' + productId,
                dataType: 'json',
                success: function (data) {
                    if (!data.error) {
                        var dataProduct = data.data
                        var price = dataProduct.sale_pricing ? dataProduct.sale_pricing : dataProduct.pricing;
                        $('#unit-price').val(addCommas(price))
                        if (dataProduct.sale_pricing != 0 || dataProduct.sale_pricing != null) {
                            $('#is_sale').removeAttr('hidden');
                        } else {
                            $('#is_sale').attr("hidden", true);
                        }
                    }
                },
                error: function (e) {
                    alertifyNote(0, 'Lấy thông tin sản phẩm thất bại!');
                }
            });
        }
    });

    $('#unit-price').change(function() {
        totalPrice();
    });

    $('#quantity').change(function() {
        totalPrice();
    });

    $('#discounted').change(function() {
        totalPrice();
    });

    totalPrice();

    function totalPrice()
    {
        var price = $('#unit-price').val() ?? 0;
        var quantity = $('#quantity').val() ?? 0;
        var discounted = $('#discounted').val() ?? 0;

        if (price && quantity) {
            price = price.replaceAll('.', '');
            price = price.replaceAll(',', '');
            discounted = discounted.replaceAll('.', '');
            discounted = discounted.replaceAll(',', '');
            var total = price*quantity - discounted;
            if (total) {
                total = total <= 0 ? 0 : total;
                $('#total').val(addCommas(total));
                $('#total-temp').val(addCommas(total))
            } else {
                $('#total').val('');
                $('#total-temp').val('')
            }
        }
    }

    $('#btn-submit-delete').click(function (e) {
        e.preventDefault();
        id = $(this).attr('data-id');
        $.ajax({
            data: $('#kol-form').serialize(),
            url: "/admin/order/"+ id,
            type: 'delete',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('#delete-order').html(html)
                $('#btn-submit-delete').attr('disabled', true);
            },
            success: function (data) {
                $('#btn-submit-delete').fadeOut();
                if (data.error === 0) {
                    $('#delete-order').html('<div class="text-center text-success">' + data.message + '</div>');
                    listPage();
                } else {
                    $('#delete-order').html('<div class="text-center text-danger">' + data.message + '</div>');
                }
                $('#btn-finish-delete').fadeIn().attr('disabled', false);
            },
            error: function (data) {
                $('#delete-order').html('<div class="text-center"><span class="text-center text-danger">Truy vấn thất bại!</span><div>');
                $('#btn-submit-delete').fadeOut().attr('disabled', false);
                $('#btn-finish-delete').fadeIn();
            }
        });
    });

    $(document).on('click', '.edit-order', function (e) {
        e.preventDefault();
        var orderId = $(this).attr('data-id');
        location.href = 'order/'+orderId+'/edit';
    });

    if(typeof(userId) != "undefined" && userId) {
        $("#select-user-ids").val(userId).trigger('change')
    }

    if(typeof(statusOrder) != "undefined" && statusOrder) {
        $("#status-order-select").val(statusOrder).trigger('change')
    }

    $('#select-processor-id').select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    });

    if(typeof(processorId) != "undefined" && processorId) {
        $("#select-processor-id").val(processorId).trigger('change')
    }
});
