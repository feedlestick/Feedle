jQuery.fn.exists = function() {
    return this.length > 0;
}

function ajax($contenant, data, replace, async) {
    $.ajax({
        type: "POST",
        url: '.',
        data: data,
        async: async,
        success: function(html) {
            if(replace)
                $contenant.html(html);
            else
                $contenant.append(html);
        },
        dataType: 'html'
    });
    
    $localstorage = localStorageHelper(); //LocalStorageHelper
}


/* MOUVEMENT FONCTION UTILE */
var Mouvement = function(){};

 Mouvement.getStringType = function(type)
 {
        switch(type)
        {
            case '0': return "Entrée"; break; 
            case '1': return "Sortie";  break;
            default : return "Erreur"; break;
        }
 };
 
 Mouvement.getClassTrType = function(type)
 {
        switch(type)
        {
            case '0': return "success"; break; 
            case '1': return "warning";  break;
            default : return "error"; break;
        }
};