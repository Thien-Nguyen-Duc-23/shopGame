$(document).ready(function() {

    $(document).on('click', '.btn-open-library', async function () {
        $('#modal-library').modal('show');
        await loadModalContentImageType1();
        await loadLibrary();
    });

    // chọn và chỉnh sửa ảnh loại 1
    function loadModalContentImageType1(type) {
        var html = '';
        html += `
            <ul id="custom-tabs-image" role="tablist" class="nav nav-tabs">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#upload" role="tab" aria-selected="true" id="menu-item-upload">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-upload font-18 me-1"></i></div>
                            <div class="tab-title">Tải tập tin lên</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" href="#folder" role="tab" aria-selected="false" tabindex="-1" id="menu-item-folder">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-folder font-18 me-1"></i></div>
                            <div class="tab-title">Thư viện</div>
                        </div>
                    </a>
                </li>
                <!--<li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#link" role="tab" aria-selected="false" tabindex="-1">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-credit-card-front font-18 me-1"></i></div>
                            <div class="tab-title">Đường dẫn</div>
                        </div>
                    </a>
                </li>-->
            </ul>
            <div class="media-frame-content tab-content row" id="custom-tabs-two-tabContent">
                <div class="col-md-12 tab-pane fade" role="tabpanel" aria-labelledby="menu-item-upload" id="upload" style="min-height: 350px;">
                    <div class="uploader-inline tab-content">
                        <div class="uploader-inline-content no-upload-message">
                            <div class="upload-ui">
                                <h2 class="upload-instructions drop-instructions">Thả các tập tin để tải lên</h2>
                                <p class="upload-instructions drop-instructions">hoặc</p>
                                <div class="btnSelectFile">
                                    <button type="button" class="browser button button-hero" style="display: inline-block; position: relative; z-index: 1;" >Chọn tập tin</button>
                                    <input type="file" id="items" name="items[]" accept="image/*" ref="file" required multiple />
                                </div>
                            </div>
                            <div class="upload-inline-status">
                            </div>
                            <div class="post-upload-ui">
                                <p class="max-upload-size">
                                    Kích thước tập tin tải lên tối đa: 64 MB
                                    <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 tab-pane fade show active" role="tabpanel" aria-labelledby="menu-item-folder" id="folder" style="min-height: 350px;">
                    <p class="pt-3 pb-2 mb-0" id="libary-title"></p>
                    <div id="list-library">
                        <div class="list-libraries col-md-12">
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-12 tab-pane p-4 fade" role="tabpanel" aria-labelledby="menu-item-link" id="link" style="min-height: 350px;">
                    <p class="pt-3 pb-2 mb-0 text-left"><b>Thêm đường dẫn</b></p>
                    <div class="update-link">
                        <div class="addLink mt-1">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Thêm đường dẫn" id="search-link">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" id="checkLink">Kiểm tra</button>
                                </div>
                            </div>
                        </div>
                        <div class="link-image mt-3 text-center">

                        </div>
                    </div>
                </div>-->
            </div>
        `;
        $('#notication-popup').html(html);
    }

    function loadLibrary()
    {
        $('#btn-confirm').attr("disabled", false);
        $.ajax({
            url: '/admin/library/load-library',
            dataType: 'json',
            beforeSend: function(){
                var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                $('.list-libraries').html(html);
            },
            success: function (data) {
                if ( !data.error ) {
                    $('#uploadFile').val(0);
                    loadFile(data.data);
                    $('[data-toggle="tooltip"]').tooltip();
                } else {
                    $('.list-libraries').html('<div class="text-center text-danger">'+ data.message +'</div>');
                }
            },
            error: function (e) {
                console.log(e);
                $('.list-libraries').html('<div class="text-center text-danger">Lỗi truy vấn dữ liệu</div>');
            }
        });
    }

    function loadFile(data) {
        var isContent = $('#isContent').val();
        var id = $('.type1-image').attr('data-img');
        var html = '<div class="row">';
        $.each(data, function (index, file) {
            html += '<div class="col-6 col-sm-4 col-lg-3 col-xl-2 pb-3 list-image">';
            if ( isContent != 0 && typeof(id) != 'undefined' && id != 0 ) {
                if (file.id === id) {
                    html += '<div class="gallery chooseImage" data-id="'+ file.id +'" data-link="'+ file.link +'" data-title="'+ file.title +'" data-alt="'+ file.alt +'">';
                }
                else {
                    html += '<div class="gallery" data-id="'+ file.id +'" data-link="'+ file.link +'" data-title="'+ file.title +'" data-alt="'+ file.alt +'">';
                }
            }
            else {
                html += '<div class="gallery" data-id="'+ file.id +'" data-link="'+ file.link +'" data-title="'+ file.title +'" data-alt="'+ file.alt +'">';
            }
            html += '<div class="image-cover">';
            html += '<div class="box-image">';
            // style="height: 450px;"
            html += '<img src="'+ file.link +'" alt="'+ file.alt +'">';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        });
        html += '</div>';
        $('.list-libraries').html(html);
    }

    $(document).on('click', '.button-hero',function () {
        $('#items').click();
    });

    $(document).on('change', '#items',function (event) {
        var files = event.target.files || event.dataTransfer.files;
        for (var index = 0; index < files.length; index++) {
            var fileSize = event.target.files[index].size;
            // console.log(fileSize > 67000000);
            if ( fileSize < 67000000 ) {
                var formData = new FormData();
                var file = event.target.files[index];

                formData.append('file', event.target.files[index], event.target.files[index].name);
                formData.append('type', file.type);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: '/admin/library/upload-load-file',
                    // dataType: 'json',
                    data: formData,
                    type: 'post',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    beforeSend: function(){
                        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
                        $('.upload-inline-status').html(html);
                    },
                    success: function (data) {
                        if ( !data.error ) {
                            $('.upload-inline-status').html('<div class="text-center text-success">'+ data.message +'</div>');
                            $('#uploadFile').val(1);
                        } else {
                            $('.upload-inline-status').html('<div class="text-center text-danger">'+ data.message +'</div>');
                        }
                    },
                    error: function (e) {
                        console.log(e);
                        $('.upload-inline-status').html('<div class="text-center text-danger">Lỗi truy vấn dữ liệu</div>');
                    }
                });
            } else {
                $('.upload-inline-status').html('<div class="text-center text-danger">Kích thước của file lớn hơn 64MB. Quý khách vui lòng kiểm tra lại.</div>');
            }
        }
    });

    $(document).on('click', '#menu-item-folder', function () {
        $('#btn-confirm').attr("disabled", false);
        if ( $('#uploadFile').val() != 0 ) {
            loadLibrary();
        }
    });

    $(document).on('click', '.gallery', function () {
        $('.gallery').removeClass('chooseImage');
        $(this).addClass('chooseImage');
        $('#typeChoosseImage').val(1);
        $('#libraryImage').val($(this).attr('data-id')).attr('data-link', $(this).attr('data-link'));
    });

    $(document).on('click', '#menu-item-upload', function () {
        $('#btn-confirm').attr("disabled", true);
    });


    if ($('#ckeditor-content').length > 0)
    {
        CKEDITOR.replace('ckeditor-content', {
            height: "450px",
        });

        CKEDITOR.on('dialogDefinition', function (event) {
            var dialogName = event.data.name;
            var dialogDefinition = event.data.definition;
            if (dialogName === 'image')
            {
                // Gắn sự kiện vào hộp thoại mỗi khi nó được mở
                dialogDefinition.onShow = async function (ev) {
                    // Đóng hộp thoại
                    this.hide();

                    $('#modal-library').modal('show');
                    $('#btn-confirm').text('Chọn ảnh');
                    $('#btn-confirm').attr('data-type', 'ckeditor-img');

                    await loadModalContentImageType1();
                    await loadLibrary();

                    // $('#modal-library').modal('show');
                    // $('#btn-confirm').text('Chọn ảnh');
                    // $('#btn-confirm').attr('data-type', 'ckeditor-img');
                    //
                    // await loadModalContentImageType1();
                    // await loadLibrary();
                };

                dialogDefinition.onFocus =  function (ev) {
                    // Đóng hộp thoại
                    // ev.cancel = false;

                    // Đóng hộp thoại
                    this.hide();
                };

                dialogDefinition.onLoad  = function (ev) {
                    // Đặt thuộc tính 'cancel' thành 'false' để ngăn người dùng đóng hộp thoại
                    // ev.cancel = false;

                    // Đóng hộp thoại
                    this.hide();

                    // $('#modal-library').modal('show');
                    // $('#btn-confirm').text('Chọn ảnh');
                    // $('#btn-confirm').attr('data-type', 'ckeditor-img');
                    //
                    // await loadModalContentImageType1();
                    // await loadLibrary();
                };
            }
        });


        $('#btn-confirm').on('click', function () {
            var type = $(this).attr('data-type');
            if ( typeof(type) === 'undefined') return false;

            if (type === 'ckeditor-img')
            {
                var editor = CKEDITOR.instances['ckeditor-content'];

                var link = $('#libraryImage').attr('data-link');
                // Kiểm tra xem editor có tồn tại không
                if (editor) {
                    // Thêm hình ảnh vào vị trí con trỏ
                    editor.insertHtml('<img src="' + link + '" />');

                    $('#modal-library').modal('hide');
                }

            }
        });

    }
});
