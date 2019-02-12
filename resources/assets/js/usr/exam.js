var target = 1200;
var a;
var exam_id = $('#exam_id').val();
var token = $('#token').val();

$(document).ready(function () {
    a = setInterval(function () { getCountdown(); }, 1000);
        console.log(token);

});

function getCountdown(){
    
    hours = parseInt(target / 3600) ;
    minutes = parseInt(target / 60);
    seconds = parseInt(target % 60);

    localStorage.setItem('hours',  hours);
    localStorage.setItem('minutes',  minutes);
    localStorage.setItem('seconds',  seconds);

    document.getElementById("hours").innerHTML = localStorage.getItem('hours');
    document.getElementById("minutes").innerHTML = localStorage.getItem('minutes');
    document.getElementById("seconds").innerHTML = localStorage.getItem('seconds');
    if(target==0)
    {
        clearInterval(a);
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
        var radio = document.querySelectorAll("input.radio").forEach((function(x){ x.setAttribute("disabled",true);}))
    }
    target--;
}

function getAnswer(){
    let user_answer = [];
    $('.questions_class').each(function( index, value ) {
        id = $(this).attr('id');
        answer = $(this).find('input[type="radio"]:checked').val();
        user_answer.push({'id': id,'answer': answer});
    });
    return user_answer;
}

$('#btSave').click(function(event) {
    /* Act on the event */
    $.ajax({
        url: '/save/'+exam_id,
        type: 'POST',
        dataType: 'json',
        data: {'data': getAnswer(),'_token': token}
    })
    .done(function() {
        window.location.href = '/exams';
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
});

$('#btFinish').click(function(event) {
    var alert = confirm("Are you sure finish your exam?\nYou can't change your answers after you click button OK.");

    $.ajax({
        url: '/finish/'+exam_id,
        type: 'POST',
        dataType: 'json',
        data: {'data': getAnswer(),'_token': token}
    })
    .done(function() {
        window.location.href = '/';
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });   
});
