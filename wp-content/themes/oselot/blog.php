<?php 
/*
	Template Name:blog
*/
?>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav.png" type="image/x-icon" />

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

    

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js?v=2.1.5"></script>

    

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.hash-magic.min.js"></script>

    

  	<script src="<?php bloginfo('template_url'); ?>/js/jquery.ba-bbq.js"></script>

    

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

	<![endif]-->
    <script>
		$(document).ready(function(){
		$('.menu-toggle.team').click(function(){
			$('.nav-menu.team').slideToggle('slow');	
		});
		});
	</script>
</head>    
<body>
<div id="page" class="hfeed site">
<div id="main" class="site-main">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle team"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu team', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->
 
 <div class="blog_page"> 
 	<div class="container">
    	<h1> Our Values </h1>              
    	<div class="left_blog_page">
        	<?php query_posts( array( 'post_type' => 'post',  'DESC', 'posts_per_page' => 2  ) );
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<div class="single_post_blog">
            	<div class="date_blog_post">
                	<div class="date_blogpost">
                    	<strong> <?php the_time('j'); ?><br /><?php the_time('F'); ?> </strong>
                    </div>
                </div>
                <div class="content_blogpost">
                	<div class="right_bloghead">
                    	<h3> <?php the_title(); ?> </h3>
                        <span><?php if(in_category('Human Resources')) {?><img src="<?php bloginfo('template_directory'); ?>/images/icon_34.png" height="30" width="30" /><?php the_category() ?>
                        <?php }elseif(in_category('Tech Stuff')){ ?><img src="<?php bloginfo('template_directory'); ?>/images/icon_37.png" height="30" width="30" /><?php the_category() ?>
                        <?php }elseif(in_category('Office Dynamics')){ ?><img src="<?php bloginfo('template_directory'); ?>/images/icon_40.png" height="30" width="30" /><?php the_category()?>
                        <?php }else if(in_category('Open Source')){ ?><img src="<?php bloginfo('template_directory'); ?>/images/icon_43.png" height="30" width="30" /><?php the_category() ?>
                        <?php }elseif(in_category('Fitness')){ ?><img src="<?php bloginfo('template_directory'); ?>/images/icon_45.png" height="30" width="30" /><?php the_category();?>
                        <?php } ?>
                        </span>
                    </div>
                    <div class="content_text_blog">
                    	<p><?php the_content_limit('1000'); ?></p>
                        <a href="<?php the_permalink(); ?>"><strong> Read More </strong></a>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>         
        <div class="right_blog_page">        
            <?php dynamic_sidebar('right_sidebar'); ?> 
        </div>        	
	</div>
</div>
<?php get_footer(); ?>