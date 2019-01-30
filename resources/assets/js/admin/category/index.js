var Datatable = $("#m_table_1").DataTable({
    dom: '<"top">frt',
    order: [],
    pageLength: -1,
    processing: true,
    serverSide: true,
    ajax: {
        url: window.location.href,
        method: 'POST',
        data: {_token: window.Laravel.csrfToken}
    },
    columns: [
        {data: 'id', targets: 0},
        {data: 'image', targets: 1},
        {data: 'name', targets: 2},
        {data: 'slug', targets: 3},
        {data: 'description', targets: 4},
        {data: window.location.pathname.split('/')[3] + 's_count', targets: 5, searchable: false},
        {targets: 6}
    ],
    columnDefs: [
        {
            targets: 0,
            visible: false,
            orderable: false,
            searchable: false
        },
        {
            targets: -1,
            orderable: false,
            searchable: false,
            render: function( data, type, row, meta ) {
                return '\n                        <span class="dropdown">\n                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">\n                              <i class="la la-ellipsis-h"></i>\n                            </a>\n                            <div class="dropdown-menu dropdown-menu-right">\n                                <a class="dropdown-item" href="/' + window.location.pathname.split('/')[3] + '/' + row.slug + '" value=' + row.id + '><i class="la la-eye"></i> View</a>\n                                                            </div>\n                        </span>\n                        <a href="/admin/category/' + window.location.pathname.split('/')[3] + '/edit/' + row.id + '" value=' + row.id + ' class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">\n                          <i class="la la-edit"></i>\n                        </a>\n                        <a href="#" value=' + row.id + ' class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill categoryDelete" title="Remove">\n                          <i class="la la-remove"></i>\n                        </a>'
             }
        },
        {
            targets: 1,
            render: function( data, type, row, meta ) {
                return '<img class="img-circle table-thumbnail" src="' + (data != null ? data.url : '/img/placeholder.png') + '"/>'
            },
            orderable: false,
            searchable: false,
            className: 'image-column'
        },
        {
            targets: 2,
            render: function( data, type, row, meta ) {
                return '<b>' + '— ' .repeat(row.level) + row.name + '<b>'
            }
        },
        {
            targets: 4,
            render: function( data, type, row, meta ) {
                return data != null ? (data.length > 80 ? data.substring(0, 80) + '...' : data) : ''
            }
        }
    ]
})
function categoryDelete(id) {
    $.ajax({
        url: '/admin/category/' + id,
        type: 'delete',
        dataType: 'JSON',
        data: {_token: window.Laravel.csrfToken}
    })
    .done(function(rs) {
        if(rs.success==true) {
            showNotice('Deleted successfully');
            Datatable.ajax.reload();
        }
        else
            showNotice('Unknown Error', 'error')
    })
    .fail(function(err) {
        showNotice(err.toString(), 'error')
    })
    .always(function() {
    });
};
$(document).on('click', '.categoryDelete', function(event) {
    let id = $(this).attr('value');
    event.preventDefault();
    swal({
        title: "Delete category will also delete it's children!",
        text: 'Are you sure?',
        icon: 'success',
        confirmButtonText: '<span><i class='la la-check'></i><span>Yes</span></span>',
        confirmButtonClass: 'btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon',
        showCancelButton: !0,
        cancelButtonText: '<span><i class='la la-remove'></i><span>Cancel</span></span>',
        cancelButtonClass: 'btn btn-secondary m-btn m-btn--pill m-btn--icon'
    }).then(function(e) {
        e.value && categoryDelete(id)
    })
})
