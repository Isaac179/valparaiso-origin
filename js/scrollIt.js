/**
 * ScrollIt
 * ScrollIt.js(scroll•it•dot•js) makes it easy to make long, vertically scrolling pages.
 * Developed by cmpolis https://github.com/cmpolis/scrollIt.js
 * Forked by Rbto https://github.com/cmpolis/scrollIt.js
 * 
 */
(function($) {
    'use strict';

    var pluginName = 'ScrollIt',
        pluginVersion = '1.0.1';

    /*
     * OPTIONS
     */
    var defaults = {
        upKey: 38,
        downKey: 40,
        easing: 'linear',
        scrollTime: 600,
        activeClass: 'active',
        onPageChange: null,
        topOffset : 0
    };
    
    $.scrollIt = function(options) {


        /*
         * DECLARATIONS
         */
        var settings = $.extend(defaults, options),
            active = 0,
            lastIndex = $('[data-scroll-index]:last').attr('data-scroll-index');

        /*
         * METHODS
         */

        /**
         * navigate
         * 
         * sets up navigation animation
         */
        var navigate = function(ndx) {

            var targetTop = $('[data-scroll-index=' + ndx + ']').offset().top + settings.topOffset;
            $('html,body').animate({
                scrollTop: targetTop,
                easing: settings.easing
            }, settings.scrollTime);

        };

        /**
         * doScroll
         * 
         * runs navigation() when criteria are met
         */
        var doScroll = function (e) {

            e.preventDefault();
            var target = $(this).attr('data-scroll-nav') || 
            $(this).attr('data-scroll-goto');
            navigate(target);
        };

        /**
         * keyNavigation
         * 
         * sets up keyboard navigation behavior
         */
        var keyNavigation = function (e) {
            var key = e.which;
            if(key == settings.upKey && active > 0) {
                navigate(parseInt(active) - 1);
                return false;
            } else if(key == settings.downKey && active < lastIndex) {
                navigate(parseInt(active) + 1);
                return false;
            }
            return true;
        };

        /**
         * updateActive
         * 
         * sets the currently active item
         */
        var updateActive = function(ndx) {
            if(settings.onPageChange && ndx && (active != ndx)) settings.onPageChange(ndx);
            
            active = ndx;
           
            $('.boton').removeClass("seleccionado");
            if (ndx !== 'inicio') {
                
                $('[data-scroll-nav=' + ndx + ']').addClass("seleccionado");
            };
            
            if (window.history && window.history.pushState && !(typeof ndx === 'undefined') )
                window.history.replaceState(ndx, ndx, '#'+ndx);
        };

        /**
         * watchActive
         * 
         * watches currently active item and updates accordingly
         */
        var watchActive = function() {
            var winTop = $(window).scrollTop()+10;

            var visible = $('[data-scroll-index]').filter(function(ndx, div) {
                return winTop >= $(div).offset().top + settings.topOffset &&
                winTop < $(div).offset().top + (settings.topOffset) + $(div).outerHeight()
            });
            var newActive = visible.first().attr('data-scroll-index');
            updateActive(newActive);
        };

        /*
         * runs methods
         */
        $(window).on('scroll',watchActive,80).on('scroll', 80);

        $(window).on('keydown', keyNavigation);

        $('body').on('click','[data-scroll-nav], [data-scroll-goto]', doScroll);

    };
}(jQuery));

/*!
 * jquery.unevent.js 0.2
 * https://github.com/yckart/jquery.unevent.js
 *
 * Copyright (c) 2013 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/07/26
**/
;(function ($) {
    var on = $.fn.on, timer;
    $.fn.on = function () {
        var args = Array.apply(null, arguments);
        var last = args[args.length - 1];

        if (isNaN(last) || (last === 1 && args.pop())) return on.apply(this, args);

        var delay = args.pop();
        var fn = args.pop();

        args.push(function () {
            var self = this, params = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(self, params);
            }, delay);
        });

        return on.apply(this, args);
    };
}(this.jQuery || this.Zepto));