/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/admin/group_product.js ***!
  \*********************************************/
$(document).ready(function () {
  listCategory();
  function listCategory() {
    var q = $('#q').val();
    var sl = $('#sl').val();
    $.ajax({
      url: '/admin/group-product/get-group-product',
      data: {
        q: q,
        sl: sl
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="15" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        if (data.error === 0) {
          if (data.data.length) {
            screen_list(data);
          } else {
            $('tbody').html('<td colspan="15" class="text-center text-danger">Không có chuyên mục trong dữ liệu</td>');
          }
        } else {
          $('tbody').html('<td colspan="15" class="text-center text-danger">' + data.message + '</td>');
        }
      },
      error: function error(e) {
        console.log(e);
        $('tbody').html('<td colspan="15" class="text-center text-danger">Truy vấn thất bại!</td>');
      }
    });
  }
  function screen_list(data) {
    // console.log(data.role);
    var html = '';
    $.each(data.data, function (index, groupProduct) {
      html += '<tr>';
      // avatar
      html += '<td>';
      if (groupProduct.is_avatar) {
        html += '<img src="' + groupProduct.avatar + '" alt="' + groupProduct.name + '" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
      }
      html += '</td>';
      // // Nội dung
      html += '<td>' + groupProduct.name + '</td>';
      html += '<td>' + groupProduct.description.substring(0, 30) + '</td>';
      // // hành động
      html += '<td class="button-action">';
      html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="' + groupProduct.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
      html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="' + groupProduct.name + '" data-id="' + groupProduct.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
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
    var html_page = Pagination(total, per_page, current_page, '');
    $('tfoot').html(html_page);
    $('[data-bs-toggle="tooltip"]').tooltip();
  }
  $('#createGroup').on('click', function () {
    $('#modal-page').modal('show');
    $('#modal-page .modal-title').text('Thêm nhóm sản phẩm');
    $('#btn-submit').fadeIn().text('Tạo nhóm sản phẩm').attr('data-action', 'create');
    $('#btn-finish').fadeOut();
    var html = "\n            <div class=\"message-error\"></div>\n            <div class=\"form-group\">\n                <label for=\"group-product-name\">T\xEAn<span class=\"text-danger\">*</span></label>\n                <input type=\"text\" class=\"form-control\" id=\"group-product-name\" value=\"\" placeholder=\"T\xEAn nh\xF3m s\u1EA3n ph\u1EA9m\">\n            </div>\n            <div class=\"form-group\">\n                <label for=\"group-product-description\">M\xF4 t\u1EA3<span class=\"text-danger\">*</span></label>\n                <textarea class=\"form-control\" id=\"group-product-description\" placeholder=\"M\xF4 t\u1EA3 nh\xF3m s\u1EA3n ph\u1EA9m\"></textarea>\n            </div>\n            <div class=\"form-group\">\n                <label for=\"group-product-avatar\">\u1EA2nh \u0111\u1EA1i di\u1EC7n</label>\n                <div class=\"group-product-avatar-img mb-2\"></div>\n                <input type=\"hidden\" id=\"group-product-avatar\" class=\"form-control\" value=\"\">\n                <button type=\"button\" class=\"btn btn-outline-dark btn-sm btn-open-library btn-group-product-avatar\">\n                    <i class=\"bx bx-cloud-upload mr-1\"></i> Ch\u1ECDn \u1EA3nh \u0111\u1EA1i di\u1EC7n\n                </button>\n            </div>\n        ";
    $('#notication').html(html);
  });
  $(document).on('click', '.action_event', function () {
    var action = $(this).attr('data-action');
    // console.log(action)
    switch (action) {
      case 'edit':
        var id = $(this).attr('data-id');
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Chỉnh sửa nhóm sản phẩm');
        $('#btn-submit').fadeIn().text('Cập nhật').attr('data-action', 'edit').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $.ajax({
          url: '/admin/group-product/get-detail-group-product',
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
              var html = "\n                                <div class=\"message-error\"></div>\n                                <div class=\"form-group\">\n                                    <label for=\"group-product-name\">T\xEAn<span class=\"text-danger\">*</span></label>\n                                    <input type=\"text\" class=\"form-control\" id=\"group-product-name\" value=\"".concat(data.groupProduct.name, "\" placeholder=\"T\xEAn nh\xF3m s\u1EA3n ph\u1EA9m\" />\n                                </div>\n                                <div class=\"form-group\">\n                                    <label for=\"group-product-description\">M\xF4 t\u1EA3<span class=\"text-danger\">*</span></label>\n                                    <textarea class=\"form-control\" id=\"group-product-description\" placeholder=\"M\xF4 t\u1EA3\">").concat(data.groupProduct.description, "</textarea>\n                                </div>\n                                <div class=\"form-group\">\n                                    <label for=\"group-product-avatar\">\u1EA2nh \u0111\u1EA1i di\u1EC7n</label>\n                                    <div class=\"group-product-avatar-img mb-2\">\n                                       ").concat(data.groupProduct.is_avatar ? '<img class="config-image" src="' + data.groupProduct.avatar + '" alt="Logo" width="160" height="160">' : "", "\n                                    </div>\n                                    <input type=\"hidden\" id=\"group-product-avatar\" class=\"form-control\" value=\"").concat(data.groupProduct.library_id, "\">\n                                    <button type=\"button\" class=\"btn btn-outline-dark btn-sm btn-open-library btn-group-product-avatar\">\n                                        <i class=\"bx bx-cloud-upload mr-1\"></i> Ch\u1ECDn \u1EA3nh \u0111\u1EA1i di\u1EC7n\n                                    </button>\n                                </div>\n                            ");
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
        $('#notication').html('<div class="text-center">Bạn có muốn xóa nhóm sản phẩm <strong class="text-danger">' + name + '</strong> này không?</div>');
        break;
      default:
        alert("Hành động không có trong dữ liệu");
        break;
    }
  });
  $(document).on('click', '.btn-group-product-avatar', function () {
    $('#modal-library .modal-title').text('Chọn ảnh đại diện cho nhóm sản phẩm');
  });
  $('#btn-confirm').on('click', function () {
    var link = $('#libraryImage').attr('data-link');
    var id = $('#libraryImage').val();
    $('#group-product-avatar').val(id);
    $('.group-product-avatar-img').html('<img class="config-image" src="' + link + '" alt="Logo" width="160" height="160">');
    $('#modal-library').modal('hide');
  });
  $('#btn-submit').on('click', function () {
    var title = $('#group-product-name').val();
    var description = $('#group-product-description').val();
    var avatar = $('#group-product-avatar').val();
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
      url: '/admin/group-product/action-group-product',
      type: 'post',
      data: {
        id: id,
        name: title,
        description: description,
        library_id: avatar,
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
    var title = $('#group-product-name').val();
    var description = $('#group-product-description').val();
    if (!title.length) {
      $('.message-error').html('<span class="text-danger">Tên nhóm sản phẩm không được để trống</span>');
      return false;
    } else if (title.length < 2 || title.length > 255) {
      $('.message-error').html('<span class="text-danger">Tên nhóm sản phẩm không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
      return false;
    }
    if (!description.length) {
      $('.message-error').html('<span class="text-danger">Mô tả nhóm sản phẩm không được để trống</span>');
      return false;
    } else if (description.length > 255) {
      $('.message-error').html('<span class="text-danger">Mô tả nhóm sản phẩm không được lớn hơn 255 ký tự</span>');
      return false;
    }
    return true;
  }
});
/******/ })()
;