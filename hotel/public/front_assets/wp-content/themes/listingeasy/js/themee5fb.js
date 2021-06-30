"use strict";
var header = jQuery('.main_header'),
	footer = jQuery('.main_footer'),
	main_wrapper = jQuery('.main_wrapper'),
	site_wrapper = jQuery('.site_wrapper'),
	nav = jQuery('nav.main_nav'),
	menu = nav.find('ul.menu'),
	html = jQuery('html'),
	body = jQuery('body'),
	myWindow = jQuery(window);


(function gt3_preloader () {
	setTimeout(function(){
		jQuery('#loading').fadeOut();
	},4000);
}());

jQuery(document).ready(function($) {

	var ie = (function(){

	    var undef,
	        v = 3,
	        div = document.createElement('div'),
	        all = div.getElementsByTagName('i');

	    while (
	        div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
	        all[0]
	    );

	    return v > 4 ? v : undef;

	}());

	var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);

	if (ie == 9) {
		jQuery('body').addClass('ie_9');
	}

	if (iOS) {
		jQuery('body').addClass('gt3_iOS');
	}

	gt3_search();
	gt3_mobile_menu();
	gt3_menu_line();
	gt3_sticky_header ();
	gt3_burger_sidebar ();
	gt3_modal_login ();
	gt3_message_close();
	gt3_custom_price_button ();
	gt3_back_to_top();
	gt3_mega_menu();
	gt3_packages_switcher();

	if (jQuery('.pp_block').size() > 0) {
		html.addClass('pp_page');
	}
	if(jQuery('.gt3_js_bg_img').size() > 0) {
		jQuery('.gt3_js_bg_img').each(function(){
			jQuery(this).css('background-image', 'url('+jQuery(this).attr('data-src')+')');
		});
	}
	if(jQuery('.gt3_js_bg_color').size() > 0) {
		jQuery('.gt3_js_bg_color').each(function(){
			jQuery(this).css('background-color', jQuery(this).attr('data-bgcolor'));
		});
	}
	if(jQuery('.gt3_js_color').size() > 0) {
		jQuery('.gt3_js_color').each(function(){
			jQuery(this).css('color', jQuery(this).attr('data-color'));
		});
	}
	if(jQuery('.gt3_js_transition').size() > 0) {
		jQuery('.gt3_js_transition').each(function(){
			var transition_time = jQuery(this).attr('data-transition') + 'ms';
			jQuery(this).css({'transition-duration': transition_time});
		});
	}

	//Flickr Widget
	if (jQuery('.flickr_widget_wrapper').size() > 0) {
		jQuery('.flickr_badge_image a').each(function() {
			jQuery(this).append('<div class="flickr_fadder"></div>');
		});
	}

	//Blank Anchors
	jQuery('a[href="#"]').on('click', function(e) {
		e.preventDefault();
	});

	// Nivoslider
	if (jQuery('.nivoSlider').size() > 0) {
		jQuery('.nivoSlider').each(function() {
			jQuery(this).nivoSlider({
				directionNav: true,
				controlNav: false,
				effect:'fade',
				pauseTime:4000,
				slices: 1
			});
		});
	}

	// Gt3 Carousel List
	//gt3_carousel_list ();

	// // GT3 Testimonials List
	gt3_testimonials_list ();

	// Slick Slider Arrows
	gt3_slick_slider_arrows ();
	var carousel_arrows_tag = jQuery('.gt3_module_featured_posts .carousel_arrows');
	if (carousel_arrows_tag.length) {
		carousel_arrows_tag.each(function() {
			jQuery(this).find('a.left_slick_arrow').on("click", function() {
				jQuery(this).parents('.gt3_module_carousel').find('.slick-prev').click();
			});
			jQuery(this).find('a.right_slick_arrow').on("click", function() {
				jQuery(this).parents('.gt3_module_carousel').find('.slick-next').click();
			});
		});
	}

	if (jQuery('.gt3-contact-widget').length) {
		jQuery('.gt3-contact-widget_label').on('click', function () {
			jQuery('.gt3-contact-widget').toggleClass('open');
		})
	}

	// GT3 Countdown
	gt3_countdown_module ();

	// GT3 Flicker Widget
	gt3_flickr_widget ();

	// GT3 Popup Video
	gt3_popup_video ();

	gt3_includes_js ();

	// GT3 tabs group woo
	gt3_woocommerce_tab ();

	gt3_grid_list_shop();

	if (jQuery('.rating_for_not_user').size() > 0) {
		jQuery('.rating_for_user').remove();
	}

	// Job listing preview
	if (jQuery('.single-job_listing_preview').length && jQuery('#job_preview').length) {
		jQuery('#job_preview').parents('.container').parent().addClass('visibility_wrap');
	}
});


function gt3_includes_js () {
	if (jQuery('.gt3_module_counter').length) {
		// GT3 Counter
		gt3_initCounter();
	}
	// GT3 Button
	if (jQuery('.gt3_btn_customize').length) {
		jQuery('.gt3_btn_customize').each(function() {
			var this_btn = jQuery(this).find('a');
			var body_tag = jQuery('body');

			// Default Attributes
			var btn_default_bg = this_btn.attr('data-default-bg');
			var btn_default_color = this_btn.attr('data-default-color');
			var btn_default_border_color = this_btn.attr('data-default-border');
			var btn_default_icon = jQuery(this).find('.gt3_btn_icon').attr('data-default-icon');

			// Hover Attributes
			var btn_hover_bg = this_btn.attr('data-hover-bg');
			var btn_hover_color = this_btn.attr('data-hover-color');
			var btn_hover_border_color = this_btn.attr('data-hover-border');
			var btn_hover_icon = jQuery(this).find('.gt3_btn_icon').attr('data-hover-icon');

			// Theme Color
			var theme_color = body_tag.attr('data-theme-color');

			this_btn.mouseenter(function(){
				// Button Hover Bg
				if(typeof btn_hover_bg !== 'undefined') {
					this_btn.css({'background-color' : btn_hover_bg});
				} else {
					this_btn.css({'background-color' : '#ffffff'});
				}
				// Button Hover Text Color
				if(typeof btn_hover_color !== 'undefined') {
					this_btn.css({'color' : btn_hover_color});
				} else {
					this_btn.css({'color' : theme_color});
				}
				// Button Hover Border Color
				if(typeof btn_hover_border_color !== 'undefined') {
					this_btn.css({'border-color' : btn_hover_border_color});
				} else {
					this_btn.css({'border-color' : theme_color});
				}
				// Button Hover Icon Color
				if(typeof btn_hover_icon !== 'undefined') {
					this_btn.find('.gt3_btn_icon').css({'color' : btn_hover_icon});
				} else {
					this_btn.find('.gt3_btn_icon').css({'color' : '#ffffff'});
				}
			}).mouseleave(function(){
				// Button Default Bg
				if(typeof btn_default_bg !== 'undefined') {
					this_btn.css({'background-color' : btn_default_bg});
				} else {
					this_btn.css({'background-color' : theme_color});
				}
				// Button Default Text Color
				if(typeof btn_default_color !== 'undefined') {
					this_btn.css({'color' : btn_default_color});
				} else {
					this_btn.css({'color' : '#ffffff'});
				}
				// Button Default Border Color
				if(typeof btn_default_border_color !== 'undefined') {
					this_btn.css({'border-color' : btn_default_border_color});
				} else {
					this_btn.css({'border-color' : theme_color});
				}
				// Button Default Icon Color
				if(typeof btn_default_icon !== 'undefined') {
					this_btn.find('.gt3_btn_icon').css({'color' : btn_default_icon});
				} else {
					this_btn.find('.gt3_btn_icon').css({'color' : '#ffffff'});
				}
			});

		});
	}
}

function gt3_mega_menu(){
	jQuery('.gt3_header_builder > .gt3_header_builder__container .gt3_megamenu_active > .sub-menu, .gt3_header_builder > .sticky_header > .gt3_header_builder__container .gt3_megamenu_active > .sub-menu').each(function(){
		jQuery(this).find('.gt3_megamenu_triangle').css({
			'margin-left':'0px',
		})
		jQuery(this).css({
			'margin-left':'0px',
		})
		var elementWidth = jQuery(this).outerWidth();
		var halfWidth = Math.round(elementWidth/2);
		var leftOffset = jQuery(this).offset().left - halfWidth;
		var rightOffset = jQuery(window).width() - (leftOffset + elementWidth);
		if (rightOffset < 25) {
			halfWidth = halfWidth + 25 - rightOffset;
		}
		if (leftOffset < 25) {
			halfWidth = halfWidth - 25 + leftOffset;
		}
		jQuery(this).find('.gt3_megamenu_triangle').css({
			'margin-left':(halfWidth-34)+'px',
		})
		jQuery(this).css({
			'margin-left':-halfWidth+'px',
		})
	})
}

jQuery(window).resize(function() {
	if (jQuery(window).width() >= 1200) {
		gt3_mega_menu();
	}
});


function gt3_course_lessons_iframe(){
	jQuery('#course-curriculum-popup iframe').each(function(){
		jQuery(this).css({width:'0'})
	})
}

function gt3_popup_video () {
	if (jQuery(".swipebox-video, .swipebox").length) {
		jQuery( '.swipebox-video, .swipebox' ).parent().swipebox( {
			selector: '.swipebox-video, .swipebox',
			useCSS : true, // false will force the use of jQuery for animations
			useSVG : true, // false to force the use of png for buttons
			initialIndexOnArray : 0, // which image index to init when a array is passed
			hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
			removeBarsOnMobile : true, // false will show top bar on mobile devices
			hideBarsDelay : 3000, // delay before hiding bars on desktop
			videoMaxWidth : 1140,
			autoplayVideos: false,
			beforeOpen: function() {}, // called before opening
			afterOpen: null, // called after opening
			afterClose: function() {}, // called after closing
			loopAtEnd: false // true will return to the first image after the last image is reached
		} );
	}
}

function gt3_back_to_top(){
	var W_height = jQuery(window).height();
	var element = jQuery('#back_to_top');
	if (element.length) {
		element.click(function(){
			jQuery('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		var show_back_to_top = function (){
			if (jQuery(document).scrollTop() < W_height) {
	        	element.removeClass('show');
	        }else{
	        	element.addClass('show');
	        }
		}
		show_back_to_top();
		jQuery(window).scroll(function() {
	        show_back_to_top();
	    });
	}
}

// menu line
function gt3_menu_line(){
	var menu = jQuery('.main-menu.main_menu_container.menu_line_enable > ul');
	if (menu.length) {
		menu.each(function(){
			var menu = jQuery(this);
			var current = '';
			menu.append('<span class="menu_item_line"></span>');
			var menu_item = menu.find('> .menu-item');
			var currentItem = menu.find('> .current-menu-item');
			var currentItemParent = menu.find('> .current-menu-ancestor');
			var line = menu.find('.menu_item_line');
			if (currentItem.length || currentItemParent.length) {
				current = currentItem.length ? currentItem : (currentItemParent.length ? currentItemParent : '');
				line.css({width: current.find('>a').outerWidth()});
				line.css({left: current.find('>a').offset().left - menu.offset().left});
			}

			menu_item.mouseenter(function(){
                line.css({width: jQuery(this).find('> a').outerWidth()});
                line.css({left: jQuery(this).find('> a').offset().left - jQuery(this).parent().offset().left});
            });

            menu.mouseleave(function(){
                if (current.length) {
                    line.css({width: current.find('> a').outerWidth()});
                    line.css({left: current.find('> a').offset().left - menu.offset().left});
                } else {
                	line.css({width:'0'});
                    line.css({left:'100%'});
                }
            });


		})
	}
}

function gt3_sticky_header (){
	if (jQuery(window).width() > 1200 || jQuery('.gt3_header_builder > .sticky_header.header_sticky_in_mobile').length) {
		var stickyNumber = jQuery('.gt3_header_builder').height();
		var stickyHeader = jQuery('.gt3_header_builder > .sticky_header');
		var docScroll = jQuery(document).scrollTop();
		var docScrollNext = jQuery(document).scrollTop();
		if (jQuery('.gt3_header_builder > .sticky_header.header_sticky_in_mobile').length) {
			var sticky_header_height = jQuery('.gt3_header_builder > .sticky_header.header_sticky_in_mobile').height();
			if (jQuery('html #wpadminbar').length) {
				sticky_header_height = sticky_header_height + 32;
			}
			jQuery('.gt3_header_builder > .sticky_header.header_sticky_in_mobile + .mobile_menu_container').css('top',sticky_header_height);
		}
		if (stickyHeader.length) {
			var stickyType = stickyHeader.attr('data-sticky-type');
			if (stickyHeader[0].hasAttribute('data-sticky-number')) {
				stickyNumber = stickyHeader.attr('data-sticky-number');
			}
			var stickyOn = function(){
				docScroll = jQuery(document).scrollTop();
				if (stickyType == 'classic') {
					if (docScroll < stickyNumber) {
						stickyHeader.removeClass('sticky_on')
					}else{
						stickyHeader.addClass('sticky_on')
					}
				}else{
					if (( docScrollNext < docScroll) || (docScroll < stickyNumber) ) {
						stickyHeader.removeClass('sticky_on')
					}else{
						stickyHeader.addClass('sticky_on')
					}
				}
				docScrollNext = jQuery(document).scrollTop();

			}
			stickyOn();
			jQuery(window).scroll(function() {
	            stickyOn();
	        });
		}
	}

}

// mobile menu
function gt3_mobile_menu(){
	var windowW = jQuery(window)
	var loaded = false;
	var main_menu = jQuery('.mobile_menu_container .main-menu > ul');
	var sub_menu = jQuery('.mobile_menu_container .main-menu > ul ul');
	var mobile_toggle = jQuery('.mobile-navigation-toggle');
	if (windowW.width() <= 1200) {
		sub_menu.hide().removeClass('showsub')
		main_menu.hide().addClass('mobile_view_on');
		loaded = true;
		gt3_mobile_menu_switcher(main_menu)
	}else{
		sub_menu.show();
		main_menu.show();
	}

	jQuery(window).resize(function() {
		if (windowW.width() <= 1200) {
			if (!mobile_toggle.hasClass('is-active')) {
				sub_menu.hide().removeClass('showsub')
				main_menu.hide().removeClass('showsub').addClass('mobile_view_on');
				mobile_toggle.removeClass('is-active')
			}
			if (loaded == false) {
				loaded = true;
				gt3_mobile_menu_switcher(main_menu)
			}
		}else{
			sub_menu.show().removeClass('showsub');
			main_menu.show().removeClass('showsub').removeClass('mobile_view_on');
			mobile_toggle.removeClass('is-active')
		}
	});
}
// end mobile menu

function gt3_mobile_menu_switcher(main_menu){
	if (jQuery(main_menu).find('.menu-item-has-children > .mobile_sitcher').length == 0) {
		jQuery(main_menu).find('.menu-item-has-children').append('<div class="mobile_sitcher"></div>')
	}
	var timeStamp = 1;
	jQuery('.mobile-navigation-toggle').on("tap click", function(event) {
		if ((event.timeStamp - timeStamp) > 100) {
			timeStamp = event.timeStamp;
			var element = jQuery(this);
			if (element.hasClass('is-active')) {
				main_menu.removeClass('showsub').slideUp(200)
				element.removeClass('is-active')
			}else{
				main_menu.addClass('showsub').slideDown(200)
				element.addClass('is-active')
			}
		}
	});

	jQuery(main_menu).find('.menu-item-has-children > .mobile_sitcher, .menu-item-has-children > a[href*="#"]').on("tap click", function(e) {
		e.preventDefault();
		var element = jQuery(this);
		if ((event.timeStamp - timeStamp) > 100) {
			timeStamp = e.timeStamp;
			if (element.hasClass('is-active')) {
				element.prev('ul.sub-menu').removeClass('showsub').slideUp(200)
				element.next('ul.sub-menu').removeClass('showsub').slideUp(200)
				element.removeClass('is-active')
			}else{
				element.prev('ul.sub-menu').addClass('showsub').slideDown(200)
				element.next('ul.sub-menu').addClass('showsub').slideDown(200)
				element.addClass('is-active')
			}
		}
	});
}

function gt3_burger_sidebar(){
	var element = jQuery('.gt3_header_builder_burger_sidebar_component');
	var sidebar = jQuery('.gt3_header_builder__burger_sidebar');
	jQuery('.gt3_header_builder_burger_sidebar_component,.gt3_header_builder__burger_sidebar-cover').on('click',function(){
		if (element.hasClass('active')) {
			element.removeClass('active');
			sidebar.removeClass('active');
			jQuery('body').removeClass('active_burger_sidebar');
		}else{
			element.addClass('active');
			sidebar.addClass('active');
			jQuery('body').addClass('active_burger_sidebar');
		}
	})
	jQuery(sidebar).on('swiperight',function(){
		if (element.hasClass('active')) {
			element.removeClass('active');
			sidebar.removeClass('active');
			jQuery('body').removeClass('active_burger_sidebar');
		}else{
			element.addClass('active');
			sidebar.addClass('active');
			jQuery('body').addClass('active_burger_sidebar');
		}
	})
}

function gt3_modal_login(){
	var element = jQuery('.gt3_header_builder__login-modal');
	if (element.hasClass('lwa') || element.hasClass('not_woo')) {
		return false;
	}
	jQuery('.gt3_header_builder_login_component,.gt3_header_builder__login-modal-close,.gt3_header_builder__login-modal-cover').on('click',function(){
		if (element.hasClass('active')) {
			element.removeClass('active');
		}else{
			element.addClass('active');
		}
	})
	jQuery('.gt3_header_builder__login-modal_container .gt3_woo_login_switcher').on('click',function(){
		jQuery(this).parents('.gt3_header_builder__login-modal_container').toggleClass('register_active');
	})
}

function gt3_search(){
	var top_search = jQuery('.header_search');

	if (top_search.size() > 0) {
		top_search.each(function () {

			var $ctsearch = jQuery(this),
				$ctsearchinput = $ctsearch.find('input.search_text'),
				$body = jQuery('html, body'),
				openSearch = function () {
					$ctsearch.data('open', true).addClass('ct-search-open');
					$ctsearchinput.focus();
					return false;
				},
				closeSearch = function () {
					$ctsearch.data('open', false).removeClass('ct-search-open');
				};

			$ctsearchinput.on('click', function (e) {
				e.stopPropagation();
				$ctsearch.data('open', true);
			});

			$ctsearch.on('click', function (e) {
				e.stopPropagation();
				if (!$ctsearch.data('open')) {
					openSearch();
					$body.on('click', function (e) {
						closeSearch();
					});
				}
				else {
					if ($ctsearchinput.val() === '') {
						closeSearch();
						return false;
					}
				}
			});

			top_search.on('click', function(){
				var element = jQuery(this);
				if (element.hasClass('ct-search-hover')) {
					element.removeClass('ct-search-hover');
				}else{
					element.addClass('ct-search-hover');
					setTimeout(function(){
						element.find('input.search_text').focus();
					}, 100);
				}
			})

		});
	}

	jQuery(".search_form .search_submit").on("mouseover", function(){
		jQuery(this).parents('.search_form').addClass("button-hover");
	})
	jQuery(".search_form .search_submit").on("mouseleave", function(){
		jQuery(this).parents('.search_form').removeClass("button-hover");
	})
}

function gt3_message_close(){
	jQuery(".gt3_message_box-closable").each(function(){
		var element = jQuery(this);
		element.find('.gt3_message_box__close').on('click',function(){
			element.slideUp(300);
		})
	})
}

jQuery(window).resize(function() {
	// Slick Slider Arrows
	gt3_slick_slider_arrows ();
	// Blog Isotope layout
	gt3_blog_isotope_update_js ();
});

jQuery(window).load(function() {
	// Gt3 Carousel List
	gt3_carousel_list ();
	gt3_isotope_team ();
	gt3_course_lessons_iframe();
	gt3_blog_isotope_js ();
	jQuery('#loading').fadeOut();
	// Blog Isotope layout
	gt3_blog_isotope_update_js ();
});

// Slick Slider Arrows
function gt3_slick_slider_arrows () {
	var carousel_arrows_tag = jQuery('.gt3_module_featured_posts .carousel_arrows');
	if (carousel_arrows_tag.length) {
		carousel_arrows_tag.each(function() {
			if (jQuery(this).parents('.gt3_module_carousel').find('.slick-arrow').length) {
				jQuery(this).removeClass('hidden_block');
			} else {
				jQuery(this).addClass('hidden_block');
			}
		});
	}
}

// -------------------- //
// --- GT3 COMPOSER --- //
// -------------------- //

// GT3 Counter
function gt3_initCounter() {
	if (jQuery('.gt3_module_counter').length) {
		if (jQuery(window).width() > 760) {
			jQuery('.gt3_module_counter').each(function(){
				if (jQuery(this).offset().top < jQuery(window).height()) {
						var cur_this = jQuery(this);
					if (!jQuery(this).hasClass('done')) {
						var stat_count = cur_this.find('.stat_count'),
							set_count = stat_count.attr('data-value'),
							counter_suffix = stat_count.attr('data-suffix'),
							counter_prefix = stat_count.attr('data-prefix');

						jQuery(this).find('.stat_temp').stop().animate({width: set_count}, {duration: 3000, step: function(now) {
								var data = Math.floor(now);
								stat_count.text(counter_prefix + data + counter_suffix);
							}
						});
						jQuery(this).addClass('done');
					}
				} else {
					var cur_this = jQuery(this);
					jQuery(this).waypoint(function(){
						if (!cur_this.hasClass('done')) {
							var stat_count = cur_this.find('.stat_count'),
								set_count = stat_count.attr('data-value'),
								counter_suffix = stat_count.attr('data-suffix'),
								counter_prefix = stat_count.attr('data-prefix');
							cur_this.find('.stat_temp').stop().animate({width: set_count}, {duration: 3000, step: function(now) {
									var data = Math.floor(now);
									stat_count.text(counter_prefix + data + counter_suffix);
								}
							});
							cur_this.addClass('done');
						}
					},{offset: 'bottom-in-view'});
				}
			});
		} else {
			jQuery('.gt3_module_counter').each(function(){
				var stat_count = jQuery(this).find('.stat_count'),
					set_count = stat_count.attr('data-value'),
					counter_suffix = stat_count.attr('data-suffix'),
					counter_prefix = stat_count.attr('data-prefix');
				jQuery(this).find('.stat_temp').stop().animate({width: set_count}, {duration: 3000, step: function(now) {
						var data = Math.floor(now);
						stat_count.text(counter_prefix + data + counter_suffix);
					}
				});
			},{offset: 'bottom-in-view'});
		}
	}
}

function gt3_isotope_team () {
	if (jQuery(".isotope").length) {
		jQuery(".isotope").isotope({
			itemSelector: ".item-team-member, .gt3_practice_list__item, .gt3_course_item.isotope-item"
		});

	}
	jQuery(window).on('resize', function() {
		jQuery(".isotope").each(function () {
			jQuery(this).isotope({
				itemSelector: ".item-team-member, .gt3_practice_list__item, .gt3_course_item.isotope-item"
			})
		})
	})
	jQuery(".isotope-filter a,.isotope-row .gt3_course_filter a").on("click", function (e){
		e.preventDefault();
		var data_filter = this.getAttribute("data-filter");
		jQuery(this).siblings().removeClass("active");
		jQuery(this).addClass("active");
		var grid = this.parentNode.nextElementSibling;
		jQuery(grid).isotope({ filter: data_filter });
	});
}

function gt3_woocommerce_tab () {
	jQuery('.gt3-tab-group').hide();
	jQuery('.gt3-tab-group.active').show();
	jQuery('.gt3-woo-filter a').off();
    jQuery('.gt3-woo-filter a').click(function(){
        var va = jQuery(this).attr('data-filter');
        var parentTabs = jQuery(this).parents(".gt3-woocommers-tab").find(".woocommerce");

        jQuery(this).siblings().removeClass('active');
        jQuery(this).addClass('active');
        parentTabs.find('.gt3-tab-group').removeClass('active');
        jQuery(va).addClass('active');
        parentTabs.find('.gt3-tab-group:not(.active)').fadeOut(300);
        setTimeout(function(){
        	jQuery(va).fadeIn("slow");
        },300)
    });
}

function gt3_custom_price_button () {
	jQuery(".shortcode_button").each(function(){
		if (jQuery(this).attr('data-btn-color')) {
			var curent_color = jQuery(this).attr('data-btn-color');
			this.style.borderColor = curent_color;
			this.style.backgroundColor = curent_color;
			this.style.color = "#ffffff";
			jQuery(this).on({
				mouseenter: function() {
				    this.style.backgroundColor = "#ffffff";
				    this.style.color = curent_color;
				}, mouseleave: function() {
				    this.style.backgroundColor = curent_color;
				    this.style.color = "#ffffff";
				}
			})
		}
	})

	jQuery(".shortcode_button.alt").each(function(){
		if (jQuery(this).attr('data-btn-color')) {
			var curent_color = jQuery(this).attr('data-btn-color');
			this.style.borderColor = curent_color;
			this.style.backgroundColor = "#ffffff";
			this.style.color = curent_color;
			jQuery(this).on({
				mouseenter: function() {
				    this.style.backgroundColor = curent_color;
				    this.style.color = "#ffffff";
				}, mouseleave: function() {
				    this.style.backgroundColor = "#ffffff";
				    this.style.color = curent_color;
				}
			})
		}
	})
}

// Blog Isotope
function gt3_blog_isotope_js () {
	if (jQuery(".isotope_blog_items").length) {
		jQuery('.isotope_blog_items').isotope({
			itemSelector: '.element'
		});
	}
}

// Blog Isotope layout
function gt3_blog_isotope_update_js () {
	if (jQuery(".isotope_blog_items").length) {
		jQuery('.isotope_blog_items').isotope('layout');
	}
}

// Gt3 Carousel List
function gt3_carousel_list () {
	var carousel_tag = jQuery('.gt3_carousel_list');
	if (carousel_tag.length) {
		carousel_tag.each(function(){
			jQuery(this).slick({
			});
		});
	}
}

// Gt3 Testimonials
function gt3_testimonials_list () {
	if (jQuery('.module_testimonial.type4').length) {
		jQuery('.module_testimonial.type4').each(function(){
			var cur_img = jQuery(this).find('.testimonials_photo');
			var wrapper_img = '';
			for (var i=0; i < cur_img.length; i++) {
				wrapper_img += cur_img[i].outerHTML;
			}
			jQuery(this).find('.testimonials-photo-wrapper').append(wrapper_img);
		})
	}
	if (jQuery('.module_testimonial.active-carousel').length) {
		jQuery('.module_testimonial.active-carousel').each(function(){
			var cur_slidesToShow = jQuery(this).attr('data-slides-per-line')*1;
			var cur_sliderAutoplay = jQuery(this).attr('data-autoplay-time')*1;
			var cur_fade = jQuery(this).attr('data-slider-fade') == 1;
			var rotator = jQuery(this).find('.testimonials_rotator');
			var photo_wrapper = jQuery(this).find('.testimonials-photo-wrapper');

			var rtl = body.hasClass('rtl');

			jQuery(this).find('.testimonials_rotator').slick({
				slidesToShow: cur_slidesToShow,
				slidesToScroll: cur_slidesToShow,
				autoplay: true,
				autoplaySpeed: cur_sliderAutoplay,
				speed: 500,
				dots: false,
				fade: cur_fade,
				focusOnSelect: true,
				arrows: true,
				infinite: true,
				asNavFor: photo_wrapper,
				rtl:rtl
			});
			var centerMode = false;
			if (jQuery(this).hasClass('testimonials_align_center')) {
				centerMode = true;
			}
			jQuery(this).find('.testimonials-photo-wrapper').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: rotator,
				dots: false,
				arrows: false,
				centerMode: centerMode,
				focusOnSelect: true,
				rtl:rtl
			})
		});
	}
}

// GT3 Countdown
function gt3_countdown_module () {
	if (jQuery('.gt3-countdown').length) {
		jQuery('.gt3-countdown').each(function () {
			var year = jQuery(this).attr('data-year');
			var month = jQuery(this).attr('data-month');
			var day = jQuery(this).attr('data-day');
			var hours = jQuery(this).attr('data-hours');
			var min = jQuery(this).attr('data-min');
			var format = jQuery(this).attr('data-format');

			var austDay = new Date();
			austDay = new Date(+year, +month-1, +day, +hours, +min);
			jQuery(this).countdown({
				until: austDay,
				format: format,
				padZeroes: true,
				labels: [jQuery(this).attr('data-label_years'),jQuery(this).attr('data-label_months'),jQuery(this).attr('data-label_weeks'),jQuery(this).attr('data-label_days'),jQuery(this).attr('data-label_hours'),jQuery(this).attr('data-label_minutes'),jQuery(this).attr('data-label_seconds')],
				labels1:[jQuery(this).attr('data-label_year'),jQuery(this).attr('data-label_month'),jQuery(this).attr('data-label_week'),jQuery(this).attr('data-label_day'),jQuery(this).attr('data-label_hour'),jQuery(this).attr('data-label_minute'),jQuery(this).attr('data-label_second')]
			});
		});
	}
}

// GT3 Flicker Widget
function gt3_flickr_widget () {
	if (jQuery('.flickr_widget_wrapper').length) {
		jQuery('.flickr_widget_wrapper').each(function () {
			var flickrid = jQuery(this).attr('data-flickrid');
			var widget_id = jQuery(this).attr('data-widget_id');
			var widget_number = jQuery(this).attr('data-widget_number');
			jQuery(this).addClass('flickr_widget_wrapper_'+flickrid);

			jQuery.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id="+widget_id+"&lang=en-us&format=json&jsoncallback=?", function(data){
				jQuery.each(data.items, function(i,item){
					if(i<widget_number){
						jQuery("<img/>").attr("src", item.media.m).appendTo(".flickr_widget_wrapper_"+flickrid).wrap("<div class=\'flickr_badge_image\'><a href=\'" + item.link + "\' target=\'_blank\' title=\'Flickr\'></a></div>");
					}
				});
			});
		});
	}
}

// Post Likes
jQuery(document).on("click", ".post_likes_add", function(event) {
	var post_likes_this = jQuery(this);
	if (!jQuery.cookie(post_likes_this.attr('data-modify')+post_likes_this.attr('data-postid'))) {
		jQuery.post(object_name.gt3_ajaxurl, {
			action:'add_like_attachment',
			attach_id:jQuery(this).attr('data-postid')
		}, function (response) {
			jQuery.cookie(post_likes_this.attr('data-modify')+post_likes_this.attr('data-postid'), 'true', { expires: 7, path: '/' });
			post_likes_this.addClass('already_liked');
			post_likes_this.find('span.like_count').text(response);
		});
	}
});

function gt3_grid_list_shop () {
	jQuery('.gt3-shop-list #grid').click(function() {
		var parentWrapper = jQuery(this).closest('.gt3-shop-list');
		jQuery(this).addClass('active');
		jQuery(parentWrapper).find('#list').removeClass('active');
		jQuery.cookie('gt3_gridcookie','grid', { path: '/' });
		jQuery(parentWrapper).find('ul.products').fadeOut(300, function() {
			jQuery(this).addClass('grid').removeClass('list').fadeIn(300);
		});
		return false;
	});

	jQuery('.gt3-shop-list #list').click(function() {
		var parentWrapper = jQuery(this).closest('.gt3-shop-list');
		jQuery(this).addClass('active');
		jQuery(parentWrapper).find('#grid').removeClass('active');
		jQuery.cookie('gt3_gridcookie','list', { path: '/' });
		jQuery(parentWrapper).find('ul.products').fadeOut(300, function() {
			jQuery(this).removeClass('grid').addClass('list').fadeIn(300);
		});
		return false;
	});

	if (jQuery.cookie('gt3_gridcookie')) {
        jQuery('.gt3-shop-list ul.products, .gt3-shop-list #gridlist-toggle').addClass(jQuery.cookie('gt3_gridcookie'));
    }

    if (jQuery.cookie('gt3_gridcookie') == 'grid') {
        jQuery('.gt3-shop-list .gridlist-toggle #grid').addClass('active');
        jQuery('.gt3-shop-list .gridlist-toggle #list').removeClass('active');
    }

    if (jQuery.cookie('gt3_gridcookie') == 'list') {
        jQuery('.gt3-shop-list .gridlist-toggle #list').addClass('active');
        jQuery('.gt3-shop-list .gridlist-toggle #grid').removeClass('active');
    }

	jQuery('#gridlist-toggle a').click(function(event) {
	    event.preventDefault();
	});
}

function clearSelected() {
    jQuery('.star-rating').removeClass('current-rated0');
	jQuery('.star-rating').removeClass('current-rated1');
	jQuery('.star-rating').removeClass('current-rated2');
	jQuery('.star-rating').removeClass('current-rated3');
	jQuery('.star-rating').removeClass('current-rated4');
	jQuery('.star-rating').removeClass('current-rated5');
	jQuery('.star-rating a.zero-star').removeClass('zero-selected');
    jQuery('.star-rating a.one-star').removeClass('current-rating');
    jQuery('.star-rating a.two-stars').removeClass('current-rating');
    jQuery('.star-rating a.three-stars').removeClass('current-rating');
    jQuery('.star-rating a.four-stars').removeClass('current-rating');
    jQuery('.star-rating a.five-stars').removeClass('current-rating');
}

function rateClick(num) {
    clearSelected();
    switch (num) {
        case 0:
            jQuery('.star-rating a.zero-star').addClass('zero-selected');
            jQuery('.rate').val('0');
			jQuery('.star-rating').addClass('current-rated0');
            break;
        case 1:
            jQuery('.star-rating a.one-star').addClass('current-rating');
            jQuery('.rate').val('1');
			jQuery('.star-rating').addClass('current-rated1');
            break;
        case 2:
            jQuery('.star-rating a.two-stars').addClass('current-rating');
            jQuery('.rate').val('2');
			jQuery('.star-rating').addClass('current-rated2');
            break;
        case 3:
            jQuery('.star-rating a.three-stars').addClass('current-rating');
            jQuery('.rate').val('3');
			jQuery('.star-rating').addClass('current-rated3');
            break;
        case 4:
            jQuery('.star-rating a.four-stars').addClass('current-rating');
            jQuery('.rate').val('4');
			jQuery('.star-rating').addClass('current-rated4');
            break;
        case 5:
            jQuery('.star-rating a.five-stars').addClass('current-rating');
            jQuery('.rate').val('5');
			jQuery('.star-rating').addClass('current-rated5');
            break;
    }
}

jQuery(document).on("mouseenter", ".star-rating a", function(event) {
	jQuery(this).parents('.star-rating').addClass('hovered_star' + jQuery(this).text());
});
jQuery(document).on("mouseleave", ".star-rating a", function(event) {
	jQuery(this).parents('.star-rating').removeClass('hovered_star' + jQuery(this).text());
});

jQuery(document).on("click", ".single_listing_go2review", function(event) {
	jQuery('body,html').animate({
		scrollTop: jQuery('.listing_post_reviews_title').offset().top
	}, 500);
	return false;
});

function gt3_packages_switcher(){
	var job_listing_packages = jQuery('.job_listing_packages');
	var active_package = job_listing_packages.find('.job_listing_packages_switcher_item.active').attr('data-packages_switcher');
	//console.log(active_package)
	job_listing_packages.find('.package-list .package_billing_period-'+active_package).addClass('active');
	job_listing_packages.find('.job_listing_packages_switcher_item').on('click',function(){
		jQuery(this).addClass('active').siblings().removeClass('active')
		console.log('.package_billing_period-'+(jQuery(this).attr('data-packages_switcher')));
		job_listing_packages.find('.package-list .package').removeClass('active');
		job_listing_packages.find('.package-list .package_billing_period-'+(jQuery(this).attr('data-packages_switcher'))).addClass('active')
	})

}
