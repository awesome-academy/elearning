$(document).ready(function () {
    let s = {
        checked: {
            name: "checked",
            cls: "success"
        },

        unchecked: {
            name: "unchecked",
            cls: "info"
        },

        start: {
            name: "start",
            cls: "primary"
        },

        testing: {
            name: "testing",
            cls: "warning"
        }
    };

    let a = {
        Start: {
            name: "Start",
            cls: "primary"
        },

        View: {
            name: "View",
            cls: "success"
        },
    };

    if($(".act").length)
    {
        $(".status").each(function( index, value ) {
            let status = $(this).text().trim();
            let html = '<span class="label label-'+s[status].cls+'">'+s[status].name+'</span>';
            $(this).html(html);
        });

        $(".act").each(function( index, value ) {
            let act = $(this).text().trim();
            let id = $(this).closest('tr').find('td').last().text().trim();
            let html = '<a class="btn btn-'+a[act].cls+' button" href="/exams/'+id+'">'+a[act].name;
            $(this).html(html);
        });
    }
});  
     