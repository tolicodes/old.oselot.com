<?php

/**

 * The Header template for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Oselot

 * @since Oselot 
 
 */

?><!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav.png" type="image/x-icon" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

    

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js?v=2.1.5"></script>

    

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.hash-magic.min.js"></script>

    

  	<script src="<?php bloginfo('template_url'); ?>/js/jquery.ba-bbq.js"></script>

    

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

	<![endif]-->

	<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>
<div id="top"></div>
	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header" role="banner">

        	<div class="header_inner">

            	<div class="blog_link">

					<a href="http://artnagar.com/wip/oselot/index.php/blog/"><i class="fa fa-rss"></i> Blog </a>                

                </div>

                <div class="logo_menu_section">

                    <div class="top_menu">

                    	<?php wp_nav_menu( array( 'theme_location' => 'top', 'menu_class' => 'my-menu', 'menu_id' => 'secondery-menu' ) ); ?>

                    </div>

                    <div class="logo_main">

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

                            <img src="<?php bloginfo('template_url'); ?>/images/logo.png" height="360" width="360" alt="<?php bloginfo( 'name' ); ?>" />

                        </a>

                	

                    	<div class="under_logo">

                        	<div class="inner_logo_desc">

                                <h1> <?php bloginfo( 'name' ); ?> </h1>

                                <strong>&lt; Staffing &gt;</strong>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear"></div>

                	<div class="under_logo">

                    	<strong> The Best Engineers for The Best Startups </strong>

                    </div>

                <div class="down_arrow">
					<a href="#whatwedo">
                	<img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png">
                    </a>

                </div>

            </div>

		</header><!-- #masthead -->

		<div id="main" class="site-main">
        <script>
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>

<script>
	$(document).ready(function() {
        $('.menu-toggle.whatwedo').click(function(){
			$('.nav-menu.whatwedo').slideToggle('slow');	
		});
		$('.menu-toggle.contact').click(function(){
			$('.nav-menu.contact').slideToggle('slow');	
		});
		$('.menu-toggle.whyweexist').click(function(){
			$('.nav-menu.whyweexist').slideToggle('slow');	
		});
		$('.menu-toggle.team').click(function(){
			$('.nav-menu.team').slideToggle('slow');	
		});
		$('.menu-toggle.workwithus').click(function(){
			$('.nav-menu.workwithus').slideToggle('slow');	
		});
		$('.menu-toggle.value').click(function(){
			$('.nav-menu.value').slideToggle('slow');	
		});
		$('.menu-toggle.resume').click(function(){
			$('.nav-menu.resume').slideToggle('slow');	
		});
    });
</script>