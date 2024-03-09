/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/category.js ***!
  \****************************************/
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
      url: '/admin/danh-muc/get-list-category',
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
    // console.log(data.role);
    var html = '';
    var storageUrl = '/storage/app/public/images/libraries';
    $.each(data.data.data, function (index, category) {
      html += '<tr>';
      // avatar
      html += '<td>';
      if (category.is_avatar) {
        //var imageUrl = category.avatar.replace('/storage/images/libraries', storageUrl);
        //console.log(imageUrl);
        html += '<img src="' + category.avatar + '" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
      }
      html += '</td>';
      html += '<td> <a href="/admin/danh-muc/infor-of-category/' + category.id + '" >' + category.name + ' </a></td>';
      // // Nội dung
      html += '<td>' + category.description + '</td>';
      html += '<td>' + category.count_products + '</td>';
      html += '<td>';
      if (parseInt(category.status) == 1) {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + category.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt" checked></div>';
      } else {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + category.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật"></div>';
      }
      html += '</td>';

      // hành động
      html += '<td class="button-action">';
      html += '<a href="/admin/danh-muc/edit/' + category.id + '" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></a>';
      //html += '<a href="/admin/danh-muc/delete/'+ category.id +'" class="btn btn-sm btn-danger action_event mr-2 mb-1" data-toggle="tooltip" data-placement="top" data-original-title="Xoá" onclick="return confirm("Bạn chắc chắn muốn xoá danh muc này ??")"><i class="bx bx-trash"></i></a>';
      //html += '<button type="button" class="btn btn-sm btn-warning text-light edit_event mr-2 mb-1" data-action="edit" data-id="'+ category.id +'" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit"></i></button>';
      html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1 delete-category" data-action="delete" data-name="' + category.name + '" data-id="' + category.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa ngành hàng"><i class="bx bx-trash"></i></button>';
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

    // Bắt sự kiện xoá danh mục
    $('.delete-category').on('click', function (e) {
      e.preventDefault();
      var categoryId = $(this).data('id');
      confirmDeleteCategory(categoryId);
    });
  }
  $(document).on('click', '.btn-category-avatar', function () {
    $('#modal-library .modal-title').text('Chọn ảnh đại diện cho ngành hàng');
  });
  $('#btn-confirm').on('click', function () {
    //var type = $(this).attr('data-type');
    var link = $('#libraryImage').attr('data-link');
    var id = $('#libraryImage').val();
    $('#category-avatar').val(id);
    $('.category-avatar-img').html('<img class="config-image" src="' + link + '" alt="Logo" width="160" height="160">');
    $('#modal-library').modal('hide');
  });
  function confirmDeleteCategory(categoryId) {
    var isConfirmed = confirm('Bạn có chắc muốn xoá danh mục này không??');
    if (isConfirmed) {
      $.ajax({
        url: "/admin/danh-muc/delete/" + categoryId,
        success: function success(response) {
          console.log("Đã xoá thành công!!");
          listPage();
        },
        error: function error(_error) {
          console.error("Lỗi xoá danh mục: ", _error);
        }
      });
    }
  }
  $(document).on('keyup', '#searchInput', function () {
    var searchInput = $(this).val();
    //console.log(searchInput);

    $.ajax({
      type: "get",
      url: "/admin/danh-muc/search",
      data: {
        q: searchInput
      },
      dataType: "json",
      success: function success(data) {
        if (data.error === 0) {
          // Render lại bảng dữ liệu hoặc thực hiện các thao tác khác
          screen_list(data);
        } else {
          // Hiển thị thông báo lỗi nếu có
          alert(data.message);
        }
      },
      error: function error(_error2) {
        console.log(_error2);
      }
    });
  });
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('data-page');
    $.ajax({
      url: '/admin/danh-muc/get-list-category',
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
  $('#select-parent-id').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true
  });
  if (typeof parentId != "undefined" && parentId) {
    $("#select-parent-id").val(parentId).trigger('change');
  }
  $(document).on('change', '.tbody-category-status', function () {
    var id = $(this).attr('data-id');
    var type = 0;
    if (this.checked) {
      type = 1;
    }
    var action = 'change-status';
    var _token = $('meta[name="csrf-token"]').attr('content');
    $(this).closest('tr').addClass('change-status');
    $.ajax({
      url: '/admin/danh-muc/update-status',
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
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-cardExchanger-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật" /></div>');
          } else {
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-cardExchanger-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật" checked /></div>');
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