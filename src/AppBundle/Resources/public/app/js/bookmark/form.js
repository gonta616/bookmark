$(document).ready(function(){

    // Init
    $('iframe').width($(window).width());
    $('iframe').height($(window).height());
    $('iframe').reframe();

    // $('.url').on('change', function(event){
    //     console.log(event.value);
    // });

    $('.url').change(function(event){
        console.log(event.target.value);
        $('iframe').attr('src', 'http://symfony-collection.fuz.org/symfony3/options/fadeInFadeOut');
    });

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
    $('.word-collection').collection({
        up: '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>',
        down: '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a>',
        add: '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span></a>',
        remove: '<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span></a>'
    });
});
