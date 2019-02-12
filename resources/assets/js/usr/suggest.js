var i = 2;
$('#add-answer').click(function(event) {
    event.preventDefault();
    var d = "<div id='answer"+i+"' class='form-group answer-field-box clearfix'>"+
            "<label class='answer-title' for='question_options_attributes_0_content'>Option</label>"+
            "<div class='col-md-12'>"+
            "<div class='col-md-8'>"+
               "<input class='form-control' type='text' name='sg_answer' id='question_options_attributes_0_content'>"+
            "</div>"+
            "<div class='check-box-remove'>"+
            "<div class='col-md-2'>"+
            "<input name='question[options_attributes][0][correct]' type='hidden' value='0'>"+
            "<input class='check-box' type='checkbox' value='1' name='question[options_attributes][0][correct]' id='question_options_attributes_0_correct'>"+
            "<label for='question_options_attributes_0_correct' style='font-size: 18px'>Correct?</label>"+
            "</div>"+
            "<div class='col-md-2 space-top-remove'>"+
            "<input type='hidden' value='false' name='question[options_attributes][0][_destroy]' id='question_options_attributes_0__destroy'>"+
            "<a id='answer"+i+"' class='remove-button text-danger' href='' style='font-size: 18px'>"+
            "<span class='glyphicon glyphicon-trash'></span> Remove</a>"+
            "</div></div></div></div>";
    $(".group").append(d);
    i++;
});

function getAnswer(){
    let user_answer = [];
    $('.questions_class').each(function( index, value ) {
        id = $(this).attr('id');
        answer = $(this).find('input[type="checkbox"]:checked').val();
        user_answer.push({'id': id,'answer': answer});
    });
    return user_answer;
}

$(document).on('click','a.remove-button',function(event) {
    event.preventDefault();
    $('div[id='+$(this).attr('id')+']').remove();
});
