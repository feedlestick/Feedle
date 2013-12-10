jQuery.fn.exists = function() {
    return this.length > 0;
}

function ajax($contenant, data) {
    $.ajax({
        type: "POST",
        url: '.',
        data: data,
        async: true,
        success: function(html) {
            $contenant.html(html);
        },
        dataType: 'html'
    });
    
    $localstorage = localStorageHelper();
}