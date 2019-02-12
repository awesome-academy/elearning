var data = [];
//get select
$(document).ready(function() {
    $.ajax({
        url: '/admin/category/' + window.location.pathname.split('/')[3] + '/getselect',
        type: 'POST',
        dataType: 'json',
        data: {_token: window.Laravel.csrfToken}
    })
    .done(function(rs) {
        data = rs;
        _setCatSelect();
    })
    .fail(function() {
    })
    .always(function() {
    });
    
});
// set image
(function(){
    if ($('#thumbnail').val().length != 0) {
        $('#holder').attr('src', $('#thumbnail').val());
    }
})();
//standard image insert
var options = {prefix: '/admin/filemanager'};
$('#lfm').filemanager('image',options);
// category add
$('#category_edit').click(function(event) {
    event.preventDefault();
    let data = {
        category: { 
            name: $('input[name="name"]').val(),
            slug: $('input[name="slug"]').val(),
            parent_id: $('select[name="parent_id"]').find('option:selected').attr('value'),
            description: $('input[name="description"]').val()
        },
        image: $('input[name="filepath"]').val(),
        _token: window.Laravel.csrfToken
    }
    $.ajax({
        url: window.location.href,
        type: 'POST',
        dataType: 'JSON',
        data: data,
    })
    .done(function(rs) {
        if (rs.success == true)
            renderMessage('success', rs.message);
        else
            renderMessage('danger', rs.message);
    })
    .fail(function(err) {
        renderMessage('danger', err.toString());
    })
    .always(function() {
    });
    
});
//set select
function _setCatSelect() {
    var cats = data.map(function(ele, index) {
        if (ele.parent_id == null) {
            return '<option value="' + ele.id + '">' + 'None' + '</option>';
        }
        else {
            return '<option value="' + ele.id + '">' + '—'.repeat(ele.level) + ' ' + ele.name + '</option>';
        }
    })
    if(cats.length) {
        $('select[name="parent_id"]').html(cats);
        if(typeof parent_id != "undefined") {
            $('select[name="parent_id"] option[value="' + parent_id + '"]').prop("selected", true);
            $('select[name="parent_id"] option[value="' + window.location.pathname.split('/')[5] + '"]').prop("disabled", true);
        }
    }
    $('.m_selectpicker').selectpicker('refresh');
}
//set slug
$('input[name="name"]').change(function(event) {
    let value = $(this).val().vn_str_filter().cleanup();
    $('input[name="slug"]').val(value);
});

function renderMessage(type, message) {
    rs = '<div class="alert alert-' + type + '" role="alert">' + message + '</div>';
    $('.fl-ms').html(rs);
}
