/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/admin/cardProvider.js ***!
  \********************************************/
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
      url: '/admin/card-provider/get-list-card-provider',
      // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        // console.log(data);
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
    $.each(data.data.data, function (index, cardProvider) {
      html += '<tr>';
      // user
      html += '<td>' + cardProvider.name + '</td>';
      // // Nội dung
      html += '<td>' + cardProvider.rate + '%</td>';

      // hành động
      html += '<td>';
      html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="' + cardProvider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
      html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="' + cardProvider.name + '" data-id="' + cardProvider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
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

    // Bắt sự kiện xoá nhóm đối tác giới thiệu
    // $('.delete-cardProvider').on('click', function(e){
    //     e.preventDefault();
    //     var cardProviderId = $(this).data('id');
    //     confirmDeleteCardProvider(cardProviderId);
    // })
  }
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('data-page');
    $.ajax({
      url: '/admin/khach-hang/get-list-user',
      data: {
        page: page
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        // console.log(data);
        var html = '';
        if (data.data != '') {
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
  });
  $('#createCardProvider').on('click', function () {
    $('#modal-page').modal('show');
    $('#modal-page .modal-title').text('Thêm nhà cung cấp');
    $('#btn-submit').fadeIn().text('Tạo nhà cung cấp').attr('data-action', 'create');
    $('#btn-finish').fadeOut();
    var html = "\n            <div class=\"message-error\"></div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"card-provider-name\">T\xEAn nh\xE0 cung c\u1EA5p<span class=\"text-danger\">*</span></label>\n                <input type=\"text\" class=\"form-control\" id=\"card-provider-name\" value=\"\" placeholder=\"T\xEAn nh\xE0 cung c\u1EA5p\">\n            </div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"card-provider-rate\">T\u1EC9 l\u1EC7 chi\u1EBFt kh\u1EA5u</label>\n                <input type=\"number\" class=\"form-control\" id=\"card-provider-rate\" value=\"\" placeholder=\"T\u1EC9 l\u1EC7 chi\u1EBFt kh\u1EA5u\">\n            </div>\n        ";
    $('#notication').html(html);
  });
  $(document).on('click', '.action_event', function () {
    var action = $(this).attr('data-action');
    switch (action) {
      case 'edit':
        var id = $(this).attr('data-id');
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Chỉnh sửa nhà cung cấp');
        $('#btn-submit').fadeIn().text('Cập nhật').attr('data-action', 'edit').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $.ajax({
          url: '/admin/card-provider/get-detail',
          data: {
            id: id
          },
          dataType: 'json',
          beforeSend: function beforeSend() {
            var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
            $('#btn-submit').attr('disabled', true);
            $('#notication').html(html);
          },
          success: function success(data) {
            if (data.error === 0) {
              var html = "\n                                <div class=\"message-error\"></div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"card-provider-name\">T\xEAn nh\xE0 cung c\u1EA5p<span class=\"text-danger\">*</span></label>\n                                    <input type=\"text\" class=\"form-control\" id=\"card-provider-name\" value=\"".concat(data.cardProvider.name, "\" placeholder=\"T\xEAn nh\xE0 cung c\u1EA5p\">\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"card-provider-rate\">T\u1EC9 l\u1EC7 chi\u1EBFt kh\u1EA5u</label>\n                                    <input type=\"number\" class=\"form-control\" id=\"card-provider-rate\" value=\"").concat(data.cardProvider.rate, "\" placeholder=\"T\u1EC9 l\u1EC7 chi\u1EBFt kh\u1EA5u\">\n                                </div>\n                            ");
              $('#notication').html(html);
            } else {
              $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
              $('#btn-submit').fadeOut().attr('disabled', false);
              $('#btn-finish').fadeIn();
            }
            $('#btn-submit').attr('disabled', false);
          },
          error: function error(e) {
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
        $('#modal-page .modal-title').text('Xóa nhóm sản phẩm');
        $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $('#notication').html('<div class="text-center">Bạn có muốn xóa nhà cung cấp <strong class="text-danger">' + name + '</strong> này không?</div>');
        break;
      default:
        alert("Hành động không có trong dữ liệu");
        break;
    }
  });
  $('#btn-submit').on('click', function () {
    var name = $('#card-provider-name').val();
    var rate = $('#card-provider-rate').val();
    var action = $(this).attr('data-action');
    var id = 0;
    if (action === 'delete' || action === 'edit') id = $(this).attr('data-id');
    var _token = $('meta[name="csrf-token"]').attr('content');
    if (action === 'create' || action === 'edit') {
      if (!validate()) {
        return false;
      }
    }
    $.ajax({
      url: '/admin/card-provider/action',
      type: 'post',
      data: {
        id: id,
        name: name,
        rate: rate,
        action: action,
        _token: _token
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('#btn-submit').attr('disabled', true);
        $('#notication').html(html);
      },
      success: function success(data) {
        if (data.error === 0) {
          $('#notication').html('<div class="text-center text-success">' + data.message + '</div>');
          listPage();
        } else {
          $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
        }
        $('#btn-submit').fadeOut();
        $('#btn-submit').attr('disabled', false);
        $('#btn-finish').fadeIn();
      },
      error: function error(e) {
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
    var name = $('#card-provider-name').val();
    var rate = $('#card-provider-rate').val();
    if (!name.length) {
      $('.message-error').html('<span class="text-danger">Tên nhà cung cấp không được để trống</span>');
      return false;
    } else if (name.length < 2 || name.length > 255) {
      $('.message-error').html('<span class="text-danger">Tên nhà cung cấp không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
      return false;
    }
    if (rate && rate > 100) {
      $('.message-error').html('<span class="text-danger">Chiết khấu không được lớn hơn 100%</span>');
      return false;
    }
    return true;
  }
});
/******/ })()
;