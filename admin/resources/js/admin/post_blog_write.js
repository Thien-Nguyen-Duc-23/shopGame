$(document).ready(function() {

    // select
    $('.select2').select2();

    $(document).on('click', '.btn-post-avatar', function () {
        $('#modal-library .modal-title').text('Chọn ảnh đại diện cho bài viết');
        $('#btn-confirm').text('Chọn ảnh');
        $('#btn-confirm').attr('data-type', 'avatar-post');
    });

    $('#btn-confirm').on('click', function () {
        var type = $(this).attr('data-type');
        if ( typeof(type) === 'undefined') return false;
        if (type === 'avatar-post')
        {
            var link = $('#libraryImage').attr('data-link');
            var id = $('#libraryImage').val();

            $('#post-avatar').val(id);
            $('.post-avatar-img').html('<img class="config-image" src="'+ link +'" alt="Logo" width="160" height="160">');
            $('#modal-library').modal('hide');
        }
    });

});
