jQuery(document).ready(function($) {
    // Calculate the maximum scrollable area height
    var winHeight = $(window).height(), 
        docHeight = $(document).height(),
        progressBar = $('#reading-progress-bar'),
        maxScroll = docHeight - winHeight,
        value, scrollPercent;

    // Update the progress bar on scroll
    $(window).on('scroll', function() {
        value = $(window).scrollTop();
        scrollPercent = (value / maxScroll) * 100;
        progressBar.width(scrollPercent + '%');
    });

    // Adjust progress bar on window resize (dynamic recalculations)
    $(window).on('resize', function() {
        winHeight = $(window).height();
        docHeight = $(document).height();
        maxScroll = docHeight - winHeight;
    });
});
