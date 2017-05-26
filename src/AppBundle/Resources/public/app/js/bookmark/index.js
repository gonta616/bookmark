$(document).ready(function(){



    /**********    Submit Event    *********/
    var postForm = $('#form-bookmark');
    postForm.submit(function(event){
        event.preventDefault();
        submitBookmark(this, event);
    });

});



function submitBookmark(trigger, event){
    event.preventDefault();

    var self = $(trigger);
    var formAction = $(trigger).attr('action');
    var formMethod = $(trigger).attr('method');
    var formData = new FormData(trigger);

    $.ajax({
        url: formAction,
        method: formMethod,
        data: formData,
        processData: false,
        contentType: false,
        success: function(data, textStatus, jqXHR)
        {
            window.location = Routing.generate('bookmark_index', {page:1});
        },
        error: function(jqXHR, textStatus, errorThrown)
        {

        }
    });
}
