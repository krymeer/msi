const mobileViewMaxWidth = 768;

function handleMobileMenu() {
    if ($(window).width() < mobileViewMaxWidth)
    {
        if ($('nav').hasClass('mobile-hide'))
        {
            $('#menu-mask, nav').removeClass('mobile-hide');
        }
        else
        {
            $('#menu-mask, nav').addClass('mobile-hide');
        }
    }
}

$(function() {
    $('#menu-mask, #nav-burger').click(function() {
        handleMobileMenu();
    });
});