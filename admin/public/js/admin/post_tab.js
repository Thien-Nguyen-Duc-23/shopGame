/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/post_tab.js ***!
  \****************************************/
$(document).ready(function () {
  $('#add-tab').text('Thêm thẻ');
  loadPage();
  function loadPage() {
    $.ajax({
      url: '/admin/post/getTabPost',
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
    // console.log(data);
    var html = '';
    $.each(data.data, function (index, tab) {
      html += '<tr class="' + index + '">';
      // avatar
      // // Nội dung
      html += '<td>' + tab.name + '</td>';
      html += '<td>' + tab.description + '</td>';
      // // hành động
      html += '<td class="button-action">';
      html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="' + tab.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
      html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="' + tab.name + '" data-id="' + tab.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa thẻ"><i class="bx bx-trash-alt me-0"></i></button>';
      html += '</td>';
      html += '</tr>';
    });
    $('tbody').html(html);
    $('[data-bs-toggle="tooltip"]').tooltip();
  }
  $('#add-tab').on('click', function () {
    var name = $('#inp-tab-name').val();
    var description = $('#inp-tab-description').val();
    var action = $(this).attr('data-action');
    var id = $(this).attr('data-id');
    if (!validate()) {
      return false;
    }
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '/admin/post/actionTabPost',
      type: 'post',
      data: {
        id: id,
        name: name,
        description: description,
        action: action,
        _token: _token
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<div class="load-page load-page-vong-xoay"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('#add-tab').attr('disabled', true);
        $('.load-form').html(html);
      },
      success: function success(data) {
        // console.log(data);
        if (data.error === 0) {
          $('#notication-form').html('<div class="text-success">' + data.message + '</div>');
          loadPage();
          $('#add-tab').attr('disabled', false).text('Thêm thẻ');
          $('#inp-tab-name').val('');
          $('#inp-tab-description').val('');
        } else {
          $('#notication-form').html('<div class="text-danger">' + data.message + '</div>');
          $('#add-tab').attr('disabled', false).text('Thêm thẻ');
        }
        $('.load-form').html('');
      },
      error: function error(e) {
        console.log(e);
        $('#notication-send-mail').html('');
        $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
        $('#add-tab').attr('disabled', false);
        $('.load-form').html('');
      }
    });
  });
  $(document).on('click', '.action_event', function () {
    var id = $(this).attr('data-id');
    var action = $(this).attr('data-action');
    switch (action) {
      case 'edit':
        $('#add-tab').attr('data-action', 'edit');
        $.ajax({
          url: '/admin/post/getDetailTabPost',
          data: {
            id: id
          },
          dataType: 'json',
          beforeSend: function beforeSend() {
            var html = '<div class="load-page load-page-vong-xoay"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
            $('#add-tab').attr('disabled', true);
            $('.load-form').html(html);
          },
          success: function success(data) {
            if (data.error === 0) {
              $('#add-tab').text('Chỉnh sửa').attr('data-id', id);
              $('#inp-tab-name').val(data.tab.name);
              $('#inp-tab-description').val(data.tab.description);
            } else {
              alertifyNote(1, data.message);
            }
            $('#add-tab').attr('disabled', false);
            $('.load-form').html('');
          },
          error: function error(e) {
            console.log(e);
            $('.load-form').html('');
            $('#add-tab').attr('disabled', false);
            alertifyNote(1, 'Lỗi truy vấn đến máy chủ');
          }
        });
        break;
      case 'delete':
        var name = $(this).attr('data-name');
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Xóa nhãm bài viết');
        $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $('#notication').html('<div class="text-center">Bạn có muốn xóa nhãn bài viết <strong class="text-danger">' + name + '</strong> này không?</div>');
        break;
      default:
        alert("Hành động không có trong dữ liệu");
        break;
    }
  });
  $('#btn-submit').on('click', function () {
    var id = $(this).attr('data-id');
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '/admin/post/actionTabPost',
      type: 'post',
      data: {
        id: id,
        action: 'delete',
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
          loadPage();
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
    var name = $('#inp-tab-name').val();
    var description = $('#inp-tab-description').val();
    if (!name.length) {
      $('.message-error').html('<span class="text-danger">Tên không được để trống</span>');
      return false;
    } else if (name.length < 2 || name.length > 255) {
      $('.message-error').html('<span class="text-danger">Tên không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
      return false;
    }
    if (description.length > 255) {
      $('.message-error').html('<span class="text-danger">Mô tả không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
      return false;
    }
    return true;
  }
});
/******/ })()
;