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
