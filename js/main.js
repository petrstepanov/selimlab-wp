$(document).ready(function() {
    // Mobile menu
    $('.js-toggle-menu').click(function() {
        $('.js-navigation').slideToggle("fast")
    })
    // Chocolat gallery
    $('.chocolat-parent').Chocolat()
    // // MathJax Settings
    // // Enable inline math delimiters
    // MathJax.Hub.Config({
    //   tex2jax: {
    //     inlineMath: [['$','$'], ['\\(','\\)']],
    //     processEscapes: true
    //   }
    // })
    // // Automatic Equation Numbering
    // MathJax.Hub.Config({
    //   TeX: { equationNumbers: { autoNumber: "AMS" } }
    // })
});

// Smooth Scroll

$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});
