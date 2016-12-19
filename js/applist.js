function toggle_visibility() {
                
    if ($('.hamburger-menu').is(':visible')) {
        /*$("#ham").removeClass("fa-window-close");
        $("#ham").addClass("fa-bars");*/
        $('.hamburger-menu').hide();
    } else
    {
       /*$("#ham").removeClass("fa-bars");
       $("#ham").addClass("fa-window-close");*/
       $('.hamburger-menu').show();
    }
}
function toggle_visibility1() {
                
    if ($('#settings').is(':visible')) {
         $('#settings').hide();
    }
    else {
       $('#settings').show();
    }
}
function toggle_visibility2() {
                
    if ($('#signout').is(':visible')) {
         $('#signout').hide();
    }
    else
    {
       $('#signout').show();
    }
}