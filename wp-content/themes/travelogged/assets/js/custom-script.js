(function ($) {
    'use strict';
    $(document).ready(function () {
        new WOW().init();

        //owl carouse col 3
        var owl = $('.owl-carousel_3');
        owl.owlCarousel({
            loop: true,
            margin: 5,
            nav: true,
            autoHeight: true,
            navRewind: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        
        //owl carouse Blog Slider
        var owl = $('.blog-slider');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoHeight: true,
            navRewind: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });

        // Home sliders
        $(function () {
            var $owl = $('.owl-carousel'),
                effect = getAnimationName(),
                outIndex,
                isDragged = false;

            $owl.owlCarousel({
                margin: 0,
                navSpeed: 500,
                nav: true,
                items: 1,
                animateIn: 'fake',
                animateOut: 'fake'
            });

            $owl.on('change.owl.carousel', function (event) {
                outIndex = event.item.index;
            });

            $owl.on('changed.owl.carousel', function (event) {
                var inIndex = event.item.index,
                    dir = outIndex <= inIndex ? 'Next' : 'Prev';

                var animation = {
                    moveIn: {
                        item: $('.owl-item', $owl).eq(inIndex),
                        effect: effect + 'In' + dir
                    },
                    moveOut: {
                        item: $('.owl-item', $owl).eq(outIndex),
                        effect: effect + 'Out' + dir
                    },
                    run: function (type) {
                        var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                            animationObj = this[type],
                            inOut = type == 'moveIn' ? 'in' : 'out',
                            animationClass = 'animated owl-animated-' + inOut + ' ' + animationObj.effect,
                            $nav = $owl.find('.owl-prev, .owl-next, .owl-dot, .owl-stage');

                        $nav.css('pointerEvents', 'none');

                        animationObj.item.stop().addClass(animationClass).one(animationEndEvent, function () {
                            // remove class at the end of the animations
                            animationObj.item.removeClass(animationClass);
                            $nav.css('pointerEvents', 'auto');
                        });
                    }
                };

                if (!isDragged) {
                    animation.run('moveOut');
                    animation.run('moveIn');
                }
            });

            $owl.on('drag.owl.carousel', function (event) {
                isDragged = true;
            });

            $owl.on('dragged.owl.carousel', function (event) {
                isDragged = false;
            });

            /**
             * Get Animation Name from the class 'owl-carousel',
             * animation name begins with fx...
             */
            function getAnimationName() {
                var re = /fx[a-zA-Z0-9\-_]+/i,
                    matches = re.exec($owl.attr('class'));

                return matches !== null ? matches[0] : matches;
            }


            /**
             * For Demo (Selectbox)
             * Change select options with animation name
             */
            $('#fxselect').on('change', function (e) {
                var $owlCarousel = $('.owl-carousel'),
                    animationName = getAnimationName();
                effect = $(this).find('option:selected').val();

                //remove old root class
                if (animationName !== null) {
                    $owl.removeClass(animationName);
                }

                //add new root class
                $owlCarousel.addClass(effect);
            });
        });

        //on hover nav dropdown
        $('body').on('mouseenter mouseleave', '.dropdown-hover', function (e) {
            let dropdown = $(e.target).closest('.dropdown-hover');
            dropdown.addClass('show');

            setTimeout(function () {
                dropdown[dropdown.is(':hover') ? 'addClass' : 'removeClass']('show');
            }, 300);
        });

        // Page loader js
        $('#page-anim-preloader').delay('10').fadeOut(2000);
        setTimeout(page_anim_remove_preloader, '11000');

        function page_anim_remove_preloader() {
            $('#page-anim-preloader').remove();
        }


        // Scroll to Top =
        $(window).on("scroll", function () {
            if ($(this).scrollTop() >= 50) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });


        $('#return-to-top').on('click', function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        });

    });

    // WOW animated
    try {
        var wow = new WOW(
            {
                animatedClass: 'animated',
                offset: 100,
                callback: function (box) {
                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                }
            }
        );
        wow.init();
        document.getElementById('moar').onclick = function () {
            var section = document.createElement('section');
            section.className = 'section--purple wow fadeInDown';
            this.parentNode.insertBefore(section, this);
        };
    } catch (e) {
    }

    $(".comment-reply-link").html("Reply <i class='fas fa-reply'></i>");
    
    jQuery(document).ready(function() {
    if( jQuery(window).width() > 993) {
       jQuery('.nav li.dropdown').hover(function() {
           jQuery(this).addClass('open');
       }, function() {
           jQuery(this).removeClass('open');
       }); 
       jQuery('.nav li.dropdown-submenu').hover(function() {
           jQuery(this).addClass('open');
       }, function() {
           jQuery(this).removeClass('open');
       }); 
    }
    
    jQuery('li.dropdown').find('.fa-angle-down').each(function(){
        jQuery(this).on('click', function(){
            if( jQuery(window).width() < 992) {
                jQuery(this).parent().next().slideToggle();
            }
            return false;
        });
    });
    });

    /*For focus skip content*/
    var menuLink = $('.menu-item').children('a');
    menuLink.on('focus', function(){
        $(this).parents('ul').addClass('focused');
    });
    menuLink.on( 'focusout', function(){
        $(this).parents('ul').removeClass('focused');
    });
    /*For focus skip content*/
    
}(jQuery));

/* fix for skip-to-content link bug in Chrome & IE9 */
window.addEventListener("hashchange", function(event) {

    var element = document.getElementById(location.hash.substring(1));

    if (element) {

        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }

        element.focus();
    }

}, false);