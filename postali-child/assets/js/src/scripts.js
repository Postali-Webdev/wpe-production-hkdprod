/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    // set correct class for viewport size
    if ($(window).width() < 1201) {
        $('.menu li.nav-practice-areas').addClass('nav-practice-areas-mobile');
        $('.menu li.nav-practice-areas-mobile').removeClass('nav-practice-areas');
    }

    // tweak class on resize if necessary
    $(window).resize(function() {
        if ($(window).width() < 1201) {
            $('.menu li.nav-practice-areas').addClass('nav-practice-areas-mobile');
            $('.menu li.nav-practice-areas-mobile').removeClass('nav-practice-areas');
        }
        else {
            $('.menu li.nav-practice-areas-mobile').addClass('nav-practice-areas');
            $('.menu li.nav-practice-areas').removeClass('nav-practice-areas-mobile');
            
        }
    });

    // set all needed classes when we start
    $('.sub-menu').addClass('closed');

    //Hamburger animation
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('.desktop-nav-container').toggleClass('opened');
        $('.desktop-nav-container').toggleClass('active'); 
        $('.desktop-nav-container .menu').toggleClass('opened');
        $('.desktop-nav-container .menu').toggleClass('active'); 
        $('.sub-menu').removeClass('opened');
        $('.sub-menu').addClass('closed');
        $('body').toggleClass('noscroll');
        return false;
    });
     
    //Close navigation on anchor tap
    $('.active').click(function() {	
        $('.menu').addClass('closed');
        $('.menu').toggleClass('opened');
        $('.menu .sub-menu').removeClass('opened');
        $('.menu .sub-menu').addClass('closed');
        $('body').toggleClass('noscroll');
    });	

    //Mobile menu accordion toggle for sub pages
    $('.menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-right-arrow"></span></div>');
    $('.menu > li.menu-item-has-children > .sub-menu').prepend('<li class="child-close"><span class="icon-left-arrow"></span> &nbsp; back</li>');

    //Mobile menu accordion toggle for third-level pages
    $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"><span class="icon-right-arrow"></span></div>');
    $('.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close"><span class="icon-left-arrow"></span> &nbsp; back</div>');

    $('.menu .accordion-toggle').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.menu .accordion-toggle2').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.child-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    $('.tertiary-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

        // script to make practice area boxes on homepage work properly
	$(".transcript-more").on("click", function() {
        // will (slide) toggle the related panel.
        $(this).parent().find('.extra').toggleClass("closed");
        $(this).parent().find('.extra').toggleClass("fadein");
        $(this).parent().find('.ellipsis').toggleClass("visible");
        $(this).toggleClass("clicked");
    });

    $(document).ready(function() {
        
        $('.dropbtn').on('click', function() {
            $('#myDropdown').slideToggle('medium');
        });
        
        $('.inner-dropdown-btn').on('click', function() {
            var dropdown = $(this).attr('data-drop-type');
            console.log(dropdown);
            $("#" + dropdown).slideToggle('medium');
        });
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	// $(document).ready(function() {
	// 	$('.menu-item-has-children').on('focusin', function() {
	// 		var subMenu = $(this).find('.sub-menu');
	// 		subMenu.css('display', 'block');

	// 		$(this).find('.sub-menu:last-of-type > li:last-child').on('focusout', function() {
	// 			console.log('blur!');
	// 			subMenu.css('display', 'none');
	// 		});
	// 	});
	// });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#menu-main-navigation li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-navigation li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-navigation li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
    });
    


});