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



	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">

			<div class="blog_page">
	
		<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title"><?php printf( __( 'Category: %s', 'oselot' ), single_cat_title( '', false ) ); ?></h1>



				<?php if ( category_description() ) : // Show an optional category description ?>

				<div class="archive-meta"><?php echo category_description(); ?></div>

				<?php endif; ?>

			</header><!-- .archive-header -->



			<?php /* The loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>



			<?php oselot_paging_nav(); ?>



		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

			</div>

		</div><!-- #content -->

	</div><!-- #primary -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>

