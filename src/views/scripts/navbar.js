$(function () {
    $('#nav-mobile').on('mouseover', function() {
        $(this).css('overflow', 'scroll');
    });

    $('#nav-mobile').on('mouseout', function() {
        $(this).css('overflow', 'auto');
    });
});