$(document).ready(function(){

    // Init
    $('iframe').width($(window).width());
    $('iframe').height($(window).height());
    $('iframe').reframe();

    // url
    $('.url').change(function(event){
        console.log(event.target.value);
        $('iframe').attr('src', 'http://symfony-collection.fuz.org/symfony3/options/fadeInFadeOut');
    });

    // select2
    $('#bookmark_terms').select2({
        tags: true,
        createTag: function(obj){
            return {
                id: obj.term,
                text: obj.term,
                isNewFlag: true,
            };
        }
    }).on('select2:select', function(e){
        if( e.params.data.isNewFlag ) {
            var $select = $(this);

            $.ajax({
                type: 'POST',
                url: Routing.generate('post_term'),
                data: { value: e.params.data.text },
                dataType: 'json',
            }).done(function(json){
                $select.find('[value="'+e.params.data.id+'"]' ).replaceWith('<option selected value="'+json.id+'">' + e.params.data.text + '</option>');
            }).fail(function(data){
                alert(data);
            });
        }
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
