$(document).ready(function(){

    $('iframe').width($(window).width());
    $('iframe').height($(window).height());
    $('iframe').reframe();

    $('.cd-btn').on('click', function(event){
        event.preventDefault();
        $('.cd-panel').addClass('is-visible');
    });
    $('.cd-panel').on('click', function(event){
        if( $(event.target).is('.cd-panel') || $(event.target).is('.cd-panel-close') ) {
            $('.cd-panel').removeClass('is-visible');
            event.preventDefault();
        }
    });
    $('.term-collection').collection();
    $('.word-collection').collection();
});
