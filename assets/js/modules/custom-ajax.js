jQuery(document).ready(function($) {
    console.log('AJAX request initiated');
  
    $.ajax({
        url: ajax_object.ajax_url, // URL from wp_localize_script
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'get_books'
        },
        success: function(response) {
            console.log('AJAX response received:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching books:', textStatus, errorThrown);
        }
    });
});