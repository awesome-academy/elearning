var Datatable = $("#m_table_1").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
    	url: window.location.href,
    	method: 'POST',
    	data: {_token: window.Laravel.csrfToken}
    },
    columns: [
        {data: 'id', targets: 0},
        {data: 'name', targets: 1},
        {data: 'slug', targets: 2},
        {data: 'description', targets: 3},
        {data: 'courses', targets: 4},
        {data: 'released_at', targets: 5},
        {data: 'updated_at', targets: 6},
        {data: 'status', targets: 7},
        {targets: 8}
    ],
    columnDefs: [{
    	targets: 0,
    	visible: false,
    }, {
        targets: -1,
        title: "Actions",
        orderable: !1,
        // width: "13%",
        render: function( data, type, row, meta ) {
            return '\n                        <span class="dropdown">\n                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">\n                              <i class="la la-ellipsis-h"></i>\n                            </a>\n                            <div class="dropdown-menu dropdown-menu-right">\n                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> View</a>\n                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\n                            </div>\n                        </span>\n                        <a href="/admin/'+window.location.pathname.split('/')[2]+'/edit/'+row.id+'" value='+row.id+' class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">\n                          <i class="la la-edit"></i>\n                        </a>\n                        <a href="#" value='+row.id+' class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill programDelete" title="Remove">\n                          <i class="la la-remove"></i>\n                        </a>'
     	}
    }, {
        targets: 7,
        render: function( data, type, row, meta ) {
            var s = {
                1: {
                    title: "Pending",
                    state: "accent"
                },
                2: {
                    title: "Draft",
                    state: "primary"
                },
                3: {
                    title: "Publish",
                    state: "danger"
                }
            };
            return void 0 === s[data] ? data : '<span class="m-badge m-badge--' + s[data].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + s[data].state + '">' + s[data].title + "</span>"
        }
    }, {
        targets: 4,
        render: function( data, type, row, meta ) {
            let rs = data.map(function(course) {
            	return '<a href="/admin/course/' + course.slug + '"> ' + course.name + '</a>'
            })
            return rs;
        }
    }, {
        targets: 3,
        render: function( data, type, row, meta ) {
            return data != null ? (data.length > 80 ? data.substring(0, 80) + '...' : data) : ''
        }
    }]
})
function ProgramDelete(id) {
    $.ajax({
    	url: '/admin/program/'+id,
    	type: 'delete',
    	dataType: 'JSON',
    	data: {_token: window.Laravel.csrfToken}
    })
    .done(function(rs) {
    	if(rs.success == true) {
    		showNotice('Deleted successfully');
    		Datatable.ajax.reload();
    	}
    	else
    		showNotice('Unknown Error','error')
    })
    .fail(function(err) {
    	showNotice( err.toString(),'error')
    })
    .always(function() {
    });

};
$(document).on('click', '.programDelete', function(event) {
    let id = $(this).attr('value');
    event.preventDefault();
    swal({
        title: "Delete this program!",
        text: "Are you sure?",
        icon: "success",
        confirmButtonText: "<span><i class='la la-remove'></i><span>Yes</span></span>",
        confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
        showCancelButton: !0,
        cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>Cancel</span></span>",
        cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
    }).then(function(e) {
        e.value && ProgramDelete(id)
    })
})
