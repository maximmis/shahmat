jQuery(document).ready(function($){

    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: '',
        inDuration: 800,
        outDuration: 0,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 900,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });

    //open sub-navigation
    $('.subnav-trigger').on('click', function(event){
        event.preventDefault();
        $('.main-nav').toggleClass('moves-out');
        $('.dropdown').toggleClass('moves-out');
    });
    
    //search-box
    $('.clear-search').on('click', function(event){
        event.preventDefault();
        $('#search').val('').trigger('keyup').focus();
    });
    
    $('#search').on('focus', function(event){
        event.preventDefault();
        $('.clear-search').addClass('is-visible');
    });
    
    $('#search').on('blur', function(event){
        event.preventDefault();
        $('.clear-search').removeClass('is-visible');
    });
    
    
    
    
    if ($('#outer').length > 0) {
        
        var parallax = document.getElementById("outer");
        var speed = document.getElementById("outer").getAttribute("data-parallax");

        //Initial background position
        var yOffset = window.pageYOffset;
        var yStart =$('#outer').offset().top - $(window).height();
        parallax.style.backgroundPosition = "center " + ((yOffset-yStart)/speed) + "px";

        window.onscroll = function() {
            var yOffset = window.pageYOffset;
            var yStart =$('#outer').offset().top - $(window).height();

            if(yOffset > yStart){
                parallax.style.backgroundPosition = "center " + ((yOffset-yStart)/speed) + "px";
            }

            //        console.log($('#outer').offset().top, yOffset, $(window).height(), yStart);

        }
    }

    jQuery.scrollSpeed(100, 800);

    new WOW().init();

});
