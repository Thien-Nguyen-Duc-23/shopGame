/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/admin/promoCode.js ***!
  \*****************************************/
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
  }
  ;
  listPage();
  function listPage() {
    $.ajax({
      url: '/admin/promo-code/get-list-promo-code',
      // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        var html = '';
        if (!data.error) {
          screen_list(data);
        } else {
          html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
          $('tbody').html(html);
        }
      },
      error: function error(e) {
        console.log(e);
        var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
        $('tbody').html(html);
      }
    });
  }
  function screen_list(data) {
    var html = '';
    $.each(data.data['data'], function (index, promoCode) {
      html += '<tr>';
      // user
      html += '<td>' + promoCode.name.substring(0, 30) + '</td>';
      if (parseInt(promoCode.type) == 1) {
        html += '<td>' + promoCode.value + '% </td>';
      } else {
        html += '<td>' + promoCode.value.toLocaleString('it-IT', {
          style: 'currency',
          currency: 'VND'
        }) + ' </td>';
      }
      // Nội dung
      if (promoCode.order_min_value) {
        html += '<td>' + promoCode.order_min_value.toLocaleString('it-IT', {
          style: 'currency',
          currency: 'VND'
        }) + '</td>';
      } else {
        html += '<td> </td>';
      }
      if (promoCode.order_max_value) {
        html += '<td>' + promoCode.order_max_value.toLocaleString('it-IT', {
          style: 'currency',
          currency: 'VND'
        }) + '</td>';
      } else {
        html += '<td> </td>';
      }
      html += '<td>' + promoCode.expired_at + '</td>';
      html += '<td class="td-status">';
      if (parseInt(promoCode.status) == 1) {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-promo-code-status" type="checkbox" role="switch" data-id="' + promoCode.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt mã giảm giá" checked></div>';
      } else {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-promo-code-status" type="checkbox" role="switch" data-id="' + promoCode.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật mã giảm giá"></div>';
      }
      html += '</td>';
      // hành động
      html += '<td class="button-action">';
      html += '<button type="button" class="edit-promo-code btn btn-sm btn-warning text-light edit_event m-1" data-action="edit" data-id="' + promoCode.id + '" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit" style="margin-left: 5px;"></i></button>';
      html += '<button type="button" class="delete-promo-code btn btn-sm btn-danger action_event m-1" data-action="delete" data-name="' + promoCode.name + '" data-id="' + promoCode.id + '" data-toggle="tooltip" data-placement="top" data-original-title="Xóa sự kiện"><i class="bx bx-trash" style="margin-left: 5px;"></i></button>';
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
    $('#qttVpsSearch').html("<span class='text-primary'>Tổng cộng: " + total + "</span>");
    var html_page = Pagination(total, per_page, current_page, '');
    $('tfoot').html(html_page);
    $('[data-toggle="tooltip"]').tooltip();
    $('.delete-promo-code').on('click', function (e) {
      e.preventDefault();
      var promoCodeId = $(this).attr('data-id');
      confirmDeletePromoCode(promoCodeId);
    });
  }
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('data-page');
    $.ajax({
      url: '/admin/promo-code/get-list-promo-code',
      data: {
        page: page
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        var html = '';
        if (data.data != '') {
          screen_list(data);
        } else {
          html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
          $('tbody').html(html);
        }
      },
      error: function error(e) {
        var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
        $('tbody').html(html);
      }
    });
  });
  $(document).on('click', '.edit-promo-code', function (e) {
    e.preventDefault();
    var promoCodeId = $(this).attr('data-id');
    location.href = 'promo-code/' + promoCodeId + '/edit';
  });
  function confirmDeletePromoCode(promoCodeId) {
    var isConfirmed = confirm('Bạn có chắc muốn xoá mã giảm giá này không??');
    if (isConfirmed) {
      $.ajax({
        url: "/admin/promo-code/" + promoCodeId,
        type: 'delete',
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(response) {
          console.log("Đã xoá thành công!!");
          alert("Đã xóa mã giảm giá thành công!");
          listPage();
        },
        error: function error(_error) {
          alert("Đã có lỗi xãy ra!");
          console.error("Lỗi xoá mã giảm giá: ", _error);
        }
      });
    }
  }
  $("#select-user-ids").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  $("#select-product-group-ids").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  $("#select-product-ids").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  if (typeof productGroupIds != "undefined" && productGroupIds) {
    $("#select-product-group-ids").val(productGroupIds).trigger('change');
  }
  if (typeof productIds != "undefined" && productIds) {
    $("#select-product-ids").val(productIds).trigger('change');
  }
  if (typeof userIds != "undefined" && userIds) {
    $("#select-user-ids").val(userIds).trigger('change');
  }
  $('.btn-promo-code-logo').on('click', function () {
    $('#btn-confirm').attr("data-type", 'logo').text('Xác nhận');
    $('#modal-library .modal-title').text('Thiết lập ảnh đại diện');
  });
  $('#btn-confirm').on('click', function () {
    var type = $(this).attr('data-type');
    var link = $('#libraryImage').attr('data-link');
    var id = $('#libraryImage').val();
    console.log(id, link);
    if (typeof link !== 'undefined') {
      $('.website-logo-container').html('<img class="config-image" src="' + link + '" alt="Logo" style="max-height: 300px; max-width: 300px; margin-left: 10px;">');
      $('#library_id').val(id);
      $('#modal-library').modal('hide');
    } else {
      alert("Vui lòng chọn hình ảnh trước khi xác nhận");
    }
  });
  $('#random-discount-code').on('click', function (e) {
    e.preventDefault();
    $('#discount-code').val(makeDiscountCode(12));
  });
  function makeDiscountCode(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    var counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
  }
  $('.inp-amount').on('change', function () {
    var amount = $(this).val();
    amount = amount.replaceAll('.', '');
    amount = amount.replaceAll(',', '');
    amount = addCommas(amount);
    $(this).val(amount);
  });
  function addCommas(nStr) {
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
  $('.type-promo-code').click(function () {
    console.log($(this).val());
    var typePromoCode = $(this).val();
    if (typePromoCode == 1) {
      $("#value-promo-code").attr('type', 'number');
    } else {
      $("#value-promo-code").attr('type', 'text');
      $("#value-promo-code").removeAttribute('maxLength');
    }
  });
  $(".date-time").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i"
  });
  $("#promo-code-start-at").change(function () {
    var startAt = $(this).val();
    var endAt = $("#promo-code-expired-at").val();
    if (new Date(startAt) < new Date()) {
      $('.error-start-at').removeAttr('hidden');
      $('.error-start-at').text('Không được nhỏ hơn ngày giờ hiện tại!');
      $('#promo-code-start-at').addClass('font-weight-normal border border-danger');
    } else if (endAt && new Date(startAt) > new Date(endAt)) {
      $('.error-start-at').removeAttr('hidden');
      $('.error-start-at').text('Không được lớn hơn ngày giờ kết thúc!');
      $('#promo-code-start-at').addClass('font-weight-normal border border-danger');
    } else {
      $('.error-start-at').attr("hidden", true);
      $('.error-start-at').text('');
      $('#promo-code-start-at').removeClass('font-weight-normal border border-danger');
    }
  });
  $("#promo-code-expired-at").change(function () {
    var endAt = $(this).val();
    var startAt = $("#promo-code-start-at").val();
    if (new Date(endAt) < new Date()) {
      $('.error-expired-at').removeAttr('hidden');
      $('.error-expired-at').text('Không được nhỏ hơn ngày giờ hiện tại!');
      $('#promo-code-expired-at').addClass('font-weight-normal border border-danger');
    } else if (startAt && new Date(startAt) > new Date(endAt)) {
      $('.error-expired-at').removeAttr('hidden');
      $('.error-expired-at').text('Không được nhỏ hơn ngày giờ bắt đầu!');
      $('#promo-code-expired-at').addClass('font-weight-normal border border-danger');
    } else {
      $('.error-expired-at').attr("hidden", true);
      $('.error-expired-at').text('');
      $('#promo-code-expired-at').removeClass('font-weight-normal border border-danger');
    }
  });
  $(document).on('change', '.tbody-promo-code-status', function () {
    var id = $(this).attr('data-id');
    var type = 0;
    if (this.checked) {
      type = 1;
    }
    var action = 'change-status';
    var _token = $('meta[name="csrf-token"]').attr('content');
    $(this).closest('tr').addClass('change-status');
    $.ajax({
      url: '/admin/promo-code/update-status',
      type: 'post',
      data: {
        id: id,
        status: type,
        action: action,
        _token: _token
      },
      dataType: 'json',
      success: function success(data) {
        if (data.error === 0) {
          alertifyNote(0, data.message);
        } else {
          alertifyNote(1, data.message);
          if (type) {
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật mã giảm giá" /></div>');
          } else {
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật mã giảm giá" checked /></div>');
          }
        }
        $('tr').removeClass('change-status');
      },
      error: function error(e) {
        console.log(e);
        alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
      }
    });
  });
});
/******/ })()
;