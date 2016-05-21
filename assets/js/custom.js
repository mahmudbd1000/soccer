function get_notification(title, msg) {
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: title,
        // (string | mandatory) the text inside the notification
        text: msg,
        // (string | optional) the image to display on the left
        image: '',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 40000
    });
}

function show_loader(){
    $('#loader').show();
    $('body').css('opacity', '.6');
}
function hide_loader(){
    $('#loader').hide();
    $('body').css('opacity', '1');
}
$(function() {












});