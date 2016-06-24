$(function () {
    $('input#search').focus(function() { $(this).parent().addClass('focused'); });
    $('input#search').blur(function() {
        if (!$(this).val()) {
            $(this).parent().removeClass('focused');
        }
    });


    $('#nav-mobile').on('mouseover', function() {
    	$(this).css('overflow', 'scroll');
    });

    $('#nav-mobile').on('mouseout', function() {
    	$(this).css('overflow', 'auto');
    });
});