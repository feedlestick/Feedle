function localStorageHelper()
{
    if(typeof localStorage === 'undefined')
    {
         $("#page-localstorage").html('<div class="row"><div class="col-lg-12">\
                                 <div class="alert alert-dismissable alert-danger"> \
                                 <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>\
                                 L\'application ne peut pas fonctionner correctement avec votre navigateur</div></div></div>');
        
    }
    else
    {
      $("#page-localstorage").html('<div class="row"><div class="col-lg-12">\
                                 <div class="alert alert-dismissable alert-success"> \
                                 <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>\
                                 Utilisation d\'une base de donnée local possible...</div></div></div>');
    }
}

localStorageHelper.setItem = function (key, value)
{
    localStorage.setItem(key, value);
};

localStorageHelper.getItem = function(key)
{
   return localStorage.getItem(key);  
};

localStorageHelper.removeItem = function(key)
{
    return localStorage.removeItem(key);
};

localStorageHelper.clear = function()
{
    localStorage.clear();
};