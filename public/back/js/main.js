$('#all_check').click(function(){
    $("input[type='checkbox']").each(function(){
        $(this).click();
    });
});
// propecte image logo width = height
if($('.box-img-lg img').height() < $('.box-img-lg img').width()){
    $('.box-img-lg img').css('height','100%');
    $('.box-img-lg img').css('width','auto');
    $('.logo-img').css('left',-$('.logo-img').width()/4);
}else{
    $('.logo-img').css('top',-$('.logo-img').height()/4);
}
// btn click on file logo
$('#upload').click(function(){
    // $('#form').
    $('#logo').click();
});

