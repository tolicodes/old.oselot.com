<?php

/**

 * Twenty Thirteen functions and definitions

 *

 * Sets up the theme and provides some helper functions, which are used in the

 * theme as custom template tags. Others are attached to action and filter

 * hooks in WordPress to change core functionality.

 *

 * When using a child theme (see https://codex.wordpress.org/Theme_Development

 * and https://codex.wordpress.org/Child_Themes), you can override certain

 * functions (those wrapped in a function_exists() call) by defining them first

 * in your child theme's functions.php file. The child theme's functions.php

 * file is included before the parent theme's file, so the child theme

 * functions would be used.

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are

 * instead attached to a filter or action hook.

 *

 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API

 *

 * @package WordPress

 * @subpackage Twenty_Thirteen

 * @since Twenty Thirteen 1.0

 */



/*

 * Set up the content width value based on the theme's design.

 *

 * @see oselot_content_width() for template-specific adjustments.

 */

if ( ! isset( $content_width ) )

	$content_width = 604;



/**

 * Add support for a custom header image.

 */

require get_template_directory() . '/inc/custom-header.php';



/**

 * Twenty Thirteen only works in WordPress 3.6 or later.

 */

if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )

	require get_template_directory() . '/inc/back-compat.php';



/**

 * Twenty Thirteen setup.

 *

 * Sets up theme defaults and registers the various WordPress features that

 * Twenty Thirteen supports.

 *

 * @uses load_theme_textdomain() For translation/localization support.

 * @uses add_editor_style() To add Visual Editor stylesheets.

 * @uses add_theme_support() To add support for automatic feed links, post

 * formats, and post thumbnails.

 * @uses register_nav_menu() To add support for a navigation menu.

 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_setup() {

	/*

	 * Makes Twenty Thirteen available for translation.

	 *

	 * Translations can be added to the /languages/ directory.

	 * If you're building a theme based on Twenty Thirteen, use a find and

	 * replace to change 'oselot' to the name of your theme in all

	 * template files.

	 */

	load_theme_textdomain( 'oselot', get_template_directory() . '/languages' );



	/*

	 * This theme styles the visual editor to resemble the theme style,

	 * specifically font, colors, icons, and column width.

	 */

	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', oselot_fonts_url() ) );



	// Adds RSS feed links to <head> for posts and comments.

	add_theme_support( 'automatic-feed-links' );



	/*

	 * Switches default core markup for search form, comment form,

	 * and comments to output valid HTML5.

	 */

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

	) );



	/*

	 * This theme supports all available post formats by default.

	 * See https://codex.wordpress.org/Post_Formats

	 */

	add_theme_support( 'post-formats', array(

		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'

	) );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', __( 'Navigation Menu', 'oselot' ) );

	register_nav_menu( 'top', __( 'Top Menu', 'oselot' ) );



	/*

	 * This theme uses a custom image size for featured images, displayed on

	 * "standard" posts and pages.

	 */

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 604, 270, true );



	// This theme uses its own gallery styles.

	add_filter( 'use_default_gallery_style', '__return_false' );

}

add_action( 'after_setup_theme', 'oselot_setup' );



/**

 * Return the Google font stylesheet URL, if available.

 *

 * The use of Source Sans Pro and Bitter by default is localized. For languages

 * that use characters not supported by the font, the font can be disabled.

 *

 * @since Twenty Thirteen 1.0

 *

 * @return string Font stylesheet or empty string if disabled.

 */

function oselot_fonts_url() {

	$fonts_url = '';



	/* Translators: If there are characters in your language that are not

	 * supported by Source Sans Pro, translate this to 'off'. Do not translate

	 * into your own language.

	 */

	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'oselot' );



	/* Translators: If there are characters in your language that are not

	 * supported by Bitter, translate this to 'off'. Do not translate into your

	 * own language.

	 */

	$bitter = _x( 'on', 'Bitter font: on or off', 'oselot' );



	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {

		$font_families = array();



		if ( 'off' !== $source_sans_pro )

			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
		if ( 'off' !== $bitter )

			$font_families[] = 'Bitter:400,700';



		$query_args = array(

			'family' => urlencode( implode( '|', $font_families ) ),

			'subset' => urlencode( 'latin,latin-ext' ),

		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	}



	return $fonts_url;

}



/**

 * Enqueue scripts and styles for the front end.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_scripts_styles() {

	/*

	 * Adds JavaScript to pages with the comment form to support

	 * sites with threaded comments (when in use).

	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	// Adds Masonry to handle vertical alignment of footer widgets.

	if ( is_active_sidebar( 'sidebar-1' ) )

		wp_enqueue_script( 'jquery-masonry' );



	// Loads JavaScript file with functionality specific to Twenty Thirteen.

	wp_enqueue_script( 'oselot-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );





	// Add Genericons font, used in the main stylesheet.

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );



	// Loads our main stylesheet.

	wp_enqueue_style( 'oselot-style', get_stylesheet_uri(), array(), '2013-07-18' );



	// Loads the Internet Explorer specific stylesheet.

	wp_enqueue_style( 'oselot-ie', get_template_directory_uri() . '/css/ie.css', array( 'oselot-style' ), '2013-07-18' );

	wp_style_add_data( 'oselot-ie', 'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'oselot_scripts_styles' );



/**

 * Filter the page title.

 *

 * Creates a nicely formatted and more specific title element text for output

 * in head of document, based on current view.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param string $title Default title text for current view.

 * @param string $sep   Optional separator.

 * @return string The filtered title.

 */

function oselot_wp_title( $title, $sep ) {

	global $paged, $page;



	if ( is_feed() )

		return $title;



	// Add the site name.

	$title .= get_bloginfo( 'name', 'display' );



	// Add the site description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		$title = "$title $sep $site_description";



	// Add a page number if necessary.

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )

		$title = "$title $sep " . sprintf( __( 'Page %s', 'oselot' ), max( $paged, $page ) );



	return $title;

}

add_filter( 'wp_title', 'oselot_wp_title', 10, 2 );



/**

 * Register two widget areas.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_widgets_init() {

	register_sidebar( array(

		'name'          => __( 'Main Widget Area', 'oselot' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Appears in the footer section of the site.', 'oselot' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>',

	) );




// for what we do data text
	register_sidebar( array(
		'name'          => __( 'What We Do Text', 'oselot' ),
		'id'            => 'whatwedo_data_text',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'oselot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	


// for contact map
	register_sidebar( array(
		'name'          => __( 'Contact map', 'oselot' ),
		'id'            => 'map',
		'description'   => __( 'Appears in the contact section', 'oselot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );


	register_sidebar( array(

		'name'          => __( 'Secondary Widget Area', 'oselot' ),

		'id'            => 'sidebar-2',

		'description'   => __( 'Appears on posts and pages in the sidebar.', 'oselot' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget'  => '</aside>',

		'before_title'  => '<h3 class="widget-title">',

		'after_title'   => '</h3>',

	) );
	
	// for contact map
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'oselot' ),
		'id'            => 'right_sidebar',
		'description'   => __( 'Appears in the Right side of pages', 'oselot' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );

}

add_action( 'widgets_init', 'oselot_widgets_init' );



if ( ! function_exists( 'oselot_paging_nav' ) ) :

/**

 * Display navigation to next/previous set of posts when applicable.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_paging_nav() {

	global $wp_query;



	// Don't print empty markup if there's only one page.

	if ( $wp_query->max_num_pages < 2 )

		return;

	?>

	<nav class="navigation paging-navigation" role="navigation">

		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'oselot' ); ?></h1>

		<div class="nav-links">



			<?php if ( get_next_posts_link() ) : ?>

			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'oselot' ) ); ?></div>

			<?php endif; ?>



			<?php if ( get_previous_posts_link() ) : ?>

			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'oselot' ) ); ?></div>

			<?php endif; ?>



		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;



if ( ! function_exists( 'oselot_post_nav' ) ) :

/**

 * Display navigation to next/previous post when applicable.

*

* @since Twenty Thirteen 1.0

*/

function oselot_post_nav() {

	global $post;



	// Don't print empty markup if there's nowhere to navigate.

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );



	if ( ! $next && ! $previous )

		return;

	?>

	<nav class="navigation post-navigation" role="navigation">

		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'oselot' ); ?></h1>

		<div class="nav-links">



			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'oselot' ) ); ?>

			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'oselot' ) ); ?>



		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;



if ( ! function_exists( 'oselot_entry_meta' ) ) :

/**

 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.

 *

 * Create your own oselot_entry_meta() to override in a child theme.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() )

		echo '<span class="featured-post">' . esc_html__( 'Sticky', 'oselot' ) . '</span>';



	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )

		oselot_entry_date();



	// Translators: used between list items, there is a space after the comma.

	$categories_list = get_the_category_list( __( ', ', 'oselot' ) );

	if ( $categories_list ) {

		echo '<span class="categories-links">' . $categories_list . '</span>';

	}



	// Translators: used between list items, there is a space after the comma.

	$tag_list = get_the_tag_list( '', __( ', ', 'oselot' ) );

	if ( $tag_list ) {

		echo '<span class="tags-links">' . $tag_list . '</span>';

	}



	// Post author

	if ( 'post' == get_post_type() ) {

		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

			esc_attr( sprintf( __( 'View all posts by %s', 'oselot' ), get_the_author() ) ),

			get_the_author()

		);

	}

}

endif;



if ( ! function_exists( 'oselot_entry_date' ) ) :

/**

 * Print HTML with date information for current post.

 *

 * Create your own oselot_entry_date() to override in a child theme.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param boolean $echo (optional) Whether to echo the date. Default true.

 * @return string The HTML-formatted post date.

 */

function oselot_entry_date( $echo = true ) {

	if ( has_post_format( array( 'chat', 'status' ) ) )

		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'oselot' );

	else

		$format_prefix = '%2$s';



	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',

		esc_url( get_permalink() ),

		esc_attr( sprintf( __( 'Permalink to %s', 'oselot' ), the_title_attribute( 'echo=0' ) ) ),

		esc_attr( get_the_date( 'c' ) ),

		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )

	);



	if ( $echo )

		echo $date;



	return $date;

}

endif;



if ( ! function_exists( 'oselot_the_attached_image' ) ) :

/**

 * Print the attached image with a link to the next attached image.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_the_attached_image() {

	/**

	 * Filter the image attachment size to use.

	 *

	 * @since Twenty thirteen 1.0

	 *

	 * @param array $size {

	 *     @type int The attachment height in pixels.

	 *     @type int The attachment width in pixels.

	 * }

	 */

	$attachment_size     = apply_filters( 'oselot_attachment_size', array( 724, 724 ) );

	$next_attachment_url = wp_get_attachment_url();

	$post                = get_post();



	/*

	 * Grab the IDs of all the image attachments in a gallery so we can get the URL

	 * of the next adjacent image in a gallery, or the first image (if we're

	 * looking at the last image in a gallery), or, in a gallery of one, just the

	 * link to that image file.

	 */

	$attachment_ids = get_posts( array(

		'post_parent'    => $post->post_parent,

		'fields'         => 'ids',

		'numberposts'    => -1,

		'post_status'    => 'inherit',

		'post_type'      => 'attachment',

		'post_mime_type' => 'image',

		'order'          => 'ASC',

		'orderby'        => 'menu_order ID',

	) );



	// If there is more than 1 attachment in a gallery...

	if ( count( $attachment_ids ) > 1 ) {

		foreach ( $attachment_ids as $attachment_id ) {

			if ( $attachment_id == $post->ID ) {

				$next_id = current( $attachment_ids );

				break;

			}

		}



		// get the URL of the next image attachment...

		if ( $next_id )

			$next_attachment_url = get_attachment_link( $next_id );



		// or get the URL of the first image attachment.

		else

			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );

	}



	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',

		esc_url( $next_attachment_url ),

		the_title_attribute( array( 'echo' => false ) ),

		wp_get_attachment_image( $post->ID, $attachment_size )

	);

}

endif;



/**

 * Return the post URL.

 *

 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or

 * the first link found in the post content.

 *

 * Falls back to the post permalink if no URL is found in the post.

 *

 * @since Twenty Thirteen 1.0

 *

 * @return string The Link format URL.

 */

function oselot_get_link_url() {

	$content = get_the_content();

	$has_url = get_url_in_content( $content );



	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );

}



if ( ! function_exists( 'oselot_excerpt_more' ) && ! is_admin() ) :

/**

 * Replaces "[...]" (appended to automatically generated excerpts) with ...

 * and a Continue reading link.

 *

 * @since Twenty Thirteen 1.4

 *

 * @param string $more Default Read More excerpt link.

 * @return string Filtered Read More excerpt link.

 */

function oselot_excerpt_more( $more ) {

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',

		esc_url( get_permalink( get_the_ID() ) ),

			/* translators: %s: Name of current post */

			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'oselot' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )

		);

	return ' &hellip; ' . $link;

}

add_filter( 'excerpt_more', 'oselot_excerpt_more' );

endif;



/**

 * Extend the default WordPress body classes.

 *

 * Adds body classes to denote:

 * 1. Single or multiple authors.

 * 2. Active widgets in the sidebar to change the layout and spacing.

 * 3. When avatars are disabled in discussion settings.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param array $classes A list of existing body class values.

 * @return array The filtered body class list.

 */

function oselot_body_class( $classes ) {

	if ( ! is_multi_author() )

		$classes[] = 'single-author';



	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )

		$classes[] = 'sidebar';



	if ( ! get_option( 'show_avatars' ) )

		$classes[] = 'no-avatars';



	return $classes;

}

add_filter( 'body_class', 'oselot_body_class' );



/**

 * Adjust content_width value for video post formats and attachment templates.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_content_width() {

	global $content_width;



	if ( is_attachment() )

		$content_width = 724;

	elseif ( has_post_format( 'audio' ) )

		$content_width = 484;

}

add_action( 'template_redirect', 'oselot_content_width' );



/**

 * Add postMessage support for site title and description for the Customizer.

 *

 * @since Twenty Thirteen 1.0

 *

 * @param WP_Customize_Manager $wp_customize Customizer object.

 */

function oselot_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}

add_action( 'customize_register', 'oselot_customize_register' );



/**

 * Enqueue Javascript postMessage handlers for the Customizer.

 *

 * Binds JavaScript handlers to make the Customizer preview

 * reload changes asynchronously.

 *

 * @since Twenty Thirteen 1.0

 */

function oselot_customize_preview_js() {

	wp_enqueue_script( 'oselot-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );

}

add_action( 'customize_preview_init', 'oselot_customize_preview_js' );





 // Perk custom post type-----

function post_type_perk() {

 register_post_type('perk',

  array(



    'labels' => array(



    'name' => __( 'Perk' ),



    'singular_name' => __( 'Perk' ),



    'add_new' => __( 'Add New' ),



    'add_new_item' => __( 'Add New Perk' ),



    'edit' => __( 'Edit' ),



    'edit_item' => __( 'Edit Perk' ),



    'new_item' => __( 'New Perk' ),



    'view' => __( 'View Perk' ),



    'view_item' => __( 'View Perk' ),



    'search_items' => __( 'Search Perk' ),



    'not_found' => __( 'No brand Perk' ),



    'not_found_in_trash' => __( 'No Perk found in Trash' ),



    'parent' => __( 'Parent Perk' ),

   ),

   'public' => true,



   'show_ui' => true,



   'exclude_from_search' => true,



   'hierarchical' => true,



   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),



   'query_var' => true

   )

   );

 }

 add_action('init', 'post_type_perk');

 

 

 // Sample Resumes custom post type-----

function post_type_resume() {

 register_post_type('resume',

  array(



    'labels' => array(



    'name' => __( 'Sample Resumes' ),



    'singular_name' => __( 'Sample Resumes' ),



    'add_new' => __( 'Add New' ),



    'add_new_item' => __( 'Add New Sample Resumes' ),



    'edit' => __( 'Edit' ),



    'edit_item' => __( 'Edit Sample Resumes' ),



    'new_item' => __( 'New Sample Resumes' ),



    'view' => __( 'View Sample Resumes' ),



    'view_item' => __( 'View Sample Resumes' ),



    'search_items' => __( 'Search Sample Resumes' ),



    'not_found' => __( 'No brand Sample Resumes' ),



    'not_found_in_trash' => __( 'No Sample Resumes found in Trash' ),



    'parent' => __( 'Parent Sample Resumes' ),

   ),

   'public' => true,



   'show_ui' => true,



   'exclude_from_search' => true,



   'hierarchical' => true,



   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),



   'query_var' => true

   )

   );

 }

 add_action('init', 'post_type_resume');

 

  // Sample Resumes Banner custom post type-----

function post_type_resume_b() {

 register_post_type('resume_b',

  array(



    'labels' => array(



    'name' => __( 'Sample Resumes Banners' ),



    'singular_name' => __( 'Sample Resumes Banner' ),



    'add_new' => __( 'Add New' ),



    'add_new_item' => __( 'Add New Banner' ),



    'edit' => __( 'Edit' ),



    'edit_item' => __( 'Edit Sample Resumes Banner' ),



    'new_item' => __( 'New Banner' ),



    'view' => __( 'View Banner' ),



    'view_item' => __( 'View Banner' ),



    'search_items' => __( 'Search Banner' ),



    'not_found' => __( 'No Banner' ),



    'not_found_in_trash' => __( 'No Banner found in Trash' ),



    'parent' => __( 'Parent Banner' ),

   ),

   'public' => true,



   'show_ui' => true,



   'exclude_from_search' => true,



   'hierarchical' => true,



   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),



   'query_var' => true

   )

   );

 }

 add_action('init', 'post_type_resume_b');

 

 

 // Sample Resumes Banner custom post type-----

function post_type_value() {

 register_post_type('values',

  array(



    'labels' => array(



    'name' => __( 'Values' ),



    'singular_name' => __( 'Values' ),



    'add_new' => __( 'Add New' ),



    'add_new_item' => __( 'Add New Values' ),



    'edit' => __( 'Edit' ),



    'edit_item' => __( 'Edit Values' ),



    'new_item' => __( 'New Values' ),



    'view' => __( 'View Values' ),



    'view_item' => __( 'View Values' ),



    'search_items' => __( 'Search Values' ),



    'not_found' => __( 'No Values' ),



    'not_found_in_trash' => __( 'No Values found in Trash' ),



    'parent' => __( 'Parent Values' ),

   ),

   'public' => true,



   'show_ui' => true,



   'exclude_from_search' => true,



   'hierarchical' => true,



   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),



   'query_var' => true

   )

   );

 }

 add_action('init', 'post_type_value');

 

 

 // Sample Resumes Banner custom post type-----

function post_type_team() {

 register_post_type('team',

  array(



    'labels' => array(



    'name' => __( 'Our Team' ),



    'singular_name' => __( 'Our Team' ),



    'add_new' => __( 'Add New' ),



    'add_new_item' => __( 'Add New Team' ),



    'edit' => __( 'Edit' ),



    'edit_item' => __( 'Edit team' ),



    'new_item' => __( 'New team' ),



    'view' => __( 'View team' ),



    'view_item' => __( 'View team' ),



    'search_items' => __( 'Search team' ),



    'not_found' => __( 'No team' ),



    'not_found_in_trash' => __( 'No team found in Trash' ),



    'parent' => __( 'Parent team' ),

   ),

   'public' => true,



   'show_ui' => true,



   'exclude_from_search' => true,



   'hierarchical' => true,



   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),



   'query_var' => true

   )

   );

 }

 add_action('init', 'post_type_team');
 
 // OSELOT THEME CUSTOMISER
 
function tcx_register_theme_customizer( $wp_customize ) {



// Work With Us Section ===============

$wp_customize->add_section( 'work_us' , array(
    'title'       => __( 'Work With Us', 'themeslug' ),
    'priority'    => 35,
    'description' => ' Work With Us Description',
) );
class Example_Customize_work_us_Control extends WP_Customize_Control {
    public $type = 'textrea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> > <?php echo esc_textarea( $this->value() ); ?> </textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'work_us', array(
    'default'        => 'Oselot Staffing is a forward thinking Staffing company. We focus on recruiting only the top talent and work with only the best companies. We have a very rigorous interview process (lasts a total ~6 hour) where we be determining not only your technical skills, but who you are as a person. we care about having perfect culture fits for every one of our placements. Once you are hired, you will initially starts of working on our internal projects, but eventually be placed with one of our clients. ',
) );
 
$wp_customize->add_control( new Example_Customize_work_us_Control( $wp_customize, 'work_us1', array(
    'label'   => 'First Paragraph',
    'section' => 'work_us',
    'settings'   => 'work_us',
) ) );






class Example_Customize_culture_Control extends WP_Customize_Control {
    public $type = 'textrea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> > <?php echo esc_textarea( $this->value() ); ?> </textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'culture', array(
    'default'        => 'We value culture value above all else. which is why we take exceptional care of our employees. We make sure that the projects and clients our employees work with match thier specific talents and passions. We ensure that all our employees are challenged and constantly learning new things.
 ',
) );
 
$wp_customize->add_control( new Example_Customize_culture_Control( $wp_customize, 'culture', array(
    'label'   => 'Culture Description',
    'section' => 'work_us',
    'settings'   => 'culture',
) ) );


// Contact Section

$wp_customize->add_section( 'fn' , array(
    'title'       => __( 'Contacts', 'themeslug' ),
    'priority'    => 35,
    'description' => '',
) );


class Example_Customize_detail_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>> <?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'detail', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
) );
 
$wp_customize->add_control( new Example_Customize_detail_Control( $wp_customize, 'detail', array(
    'label'   => 'Glitz and Glamour details',
    'section' => 'detail',
    'settings'   => 'detail',
) ) );




class Example_Customize_fn_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'fn', array(
    'default'        => '(000) 123 456',
) );
 
$wp_customize->add_control( new Example_Customize_fn_Control( $wp_customize, 'fn', array(
    'label'   => 'Contact number',
    'section' => 'fn',
    'settings'   => 'fn',
) ) );

/// Email =============================

class Example_Customize_email_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'email', array(
    'default'        => 'inquiries@oselot.com',
) );
 
$wp_customize->add_control( new Example_Customize_email_Control( $wp_customize, 'email', array(
    'label'   => 'Email',
    'section' => 'fn',
    'settings'   => 'email',
) ) );


/// Address 2 =============================

class Example_Customize_ad1_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'ad1', array(
    'default'        => '11 42nd St Suite 1121 Newyork, NY 11201',
) );
 
$wp_customize->add_control( new Example_Customize_ad1_Control( $wp_customize, 'ad1', array(
    'label'   => 'Address 1',
    'section' => 'fn',
    'settings'   => 'ad1',
) ) );


/// Address 2 =============================

class Example_Customize_ad2_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'ad2', array(
    'default'        => '11 42nd St Suite 1121 Newyork, NY 11201',
) );
 
$wp_customize->add_control( new Example_Customize_ad2_Control( $wp_customize, 'ad2', array(
    'label'   => 'Address 2',
    'section' => 'fn',
    'settings'   => 'ad2',
) ) );






// Whyweexist section starts here

$wp_customize->add_section( 'whyweexist' , array(
    'title'       => __( 'Why We Exist', 'themeslug' ),
    'priority'    => 35,
    'description' => 'Why We Exist Details',
) );

class Example_Customize_topy_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'topy', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_topy_Control( $wp_customize, 'topy', array(
    'label'   => 'Description',
    'section' => 'whyweexist',
    'settings'   => 'topy',
) ) );




class Example_Customize_p1_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'p1', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_p1_Control( $wp_customize, 'p1', array(
    'label'   => 'Problem 1',
    'section' => 'whyweexist',
    'settings'   => 'p1',
) ) );





class Example_Customize_s1_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 's1', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_s1_Control( $wp_customize, 's1', array(
    'label'   => 'Solution 1',
    'section' => 'whyweexist',
    'settings'   => 's1',
) ) );






class Example_Customize_p2_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'p2', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_p2_Control( $wp_customize, 'p2', array(
    'label'   => 'Problem 2',
    'section' => 'whyweexist',
    'settings'   => 'p2',
) ) );





class Example_Customize_s2_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 's2', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_s2_Control( $wp_customize, 's2', array(
    'label'   => 'Solution 2',
    'section' => 'whyweexist',
    'settings'   => 's2',
) ) );




class Example_Customize_p3_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 'p3', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_p3_Control( $wp_customize, 'p3', array(
    'label'   => 'Problem 3',
    'section' => 'whyweexist',
    'settings'   => 'p3',
) ) );





class Example_Customize_s3_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>"></textarea>
        </label>
        <?php
	}}

$wp_customize->add_setting( 's3', array(
    'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
) );
 
$wp_customize->add_control( new Example_Customize_s3_Control( $wp_customize, 's3', array(
    'label'   => 'Solution 3',
    'section' => 'whyweexist',
    'settings'   => 's3',
) ) );



// Socials section starts here

$wp_customize->add_section( 'socials' , array(
    'title'       => __( 'Footer Social', 'themeslug' ),
    'priority'    => 35,
    'description' => 'Footer Social Links',
) );
//////

class Example_Customize_fb_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'fb', array(
    'default'        => 'www.facebook.com',
) );
 
$wp_customize->add_control( new Example_Customize_fb_Control( $wp_customize, 'fb', array(
    'label'   => 'Facebook Link',
    'section' => 'socials',
    'settings'   => 'fb',
) ) );




class Example_Customize_tw_Control extends WP_Customize_Control {
    public $type = 'input';
 
    public function render_content() {
        ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <input rows="5" style="width:100%;" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" />
        </label>
        <?php
	}}

$wp_customize->add_setting( 'tw', array(
    'default'        => 'www.twitter.com',
) );
 
$wp_customize->add_control( new Example_Customize_tw_Control( $wp_customize, 'tw', array(
    'label'   => 'Twitter Link',
    'section' => 'socials',
    'settings'   => 'tw',
) ) );

}

add_action( 'customize_register', 'tcx_register_theme_customizer' );


// for what we do custom 

  // Sample Resumes Banner custom post type-----
function post_type_whatwedo_post_data_left() {
 register_post_type('wwd_post_left',
  array(

    'labels' => array(

    'name' => __( 'what we do post' ),

    'singular_name' => __( 'wwd_post_left' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_post_left' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_post_left' ),

    'new_item' => __( 'New wwd_post_left' ),

    'view' => __( 'View wwd_post_left' ),

    'view_item' => __( 'View wwd_post_left' ),

    'search_items' => __( 'Search wwd_post_left' ),

    'not_found' => __( 'No wwd_post_left' ),

    'not_found_in_trash' => __( 'No wwd_post_left found in Trash' ),

    'parent' => __( 'Parent wwd_post_left' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_whatwedo_post_data_left');
 
 
 
 
 
 
 
 

  // Sample Resumes Banner custom post type-----
function post_type_whatwedo_post_data_right() {
 register_post_type('wwd_post_right',
  array(

    'labels' => array(

    'name' => __( 'what we do post right' ),

    'singular_name' => __( 'wwd_post_right' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_post_right' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_post_right' ),

    'new_item' => __( 'New wwd_post_right' ),

    'view' => __( 'View wwd_post_right' ),

    'view_item' => __( 'View wwd_post_right' ),

    'search_items' => __( 'Search wwd_post_right' ),

    'not_found' => __( 'No wwd_post_right' ),

    'not_found_in_trash' => __( 'No wwd_post_right found in Trash' ),

    'parent' => __( 'Parent wwd_post_right' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_whatwedo_post_data_right'); 








  // Sample Resumes Banner custom post type-----
function post_type_whatwedo_post_data_centeral() {
 register_post_type('wwd_post_centeral',
  array(

    'labels' => array(

    'name' => __( 'what we do post centeral' ),

    'singular_name' => __( 'wwd_post_centeral' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_post_centeral' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_post_centeral' ),

    'new_item' => __( 'New wwd_post_centeral' ),

    'view' => __( 'View wwd_post_centeral' ),

    'view_item' => __( 'View wwd_post_centeral' ),

    'search_items' => __( 'Search wwd_post_centeral' ),

    'not_found' => __( 'No wwd_post_centeral' ),

    'not_found_in_trash' => __( 'No wwd_post_centeral found in Trash' ),

    'parent' => __( 'Parent wwd_post_centeral' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_whatwedo_post_data_centeral'); 








  // Sample Resumes Banner custom post type-----
function post_type_brick_data_one() {
 register_post_type('wwd_brick_post_one',
  array(

    'labels' => array(

    'name' => __( 'wwd brick 1' ),

    'singular_name' => __( 'wwd_brick_post_one' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_post_one' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_post_one' ),

    'new_item' => __( 'New wwd_brick_post_one' ),

    'view' => __( 'View wwd_brick_post_one' ),

    'view_item' => __( 'View wwd_brick_post_one' ),

    'search_items' => __( 'Search wwd_brick_post_one' ),

    'not_found' => __( 'No wwd_brick_post_one' ),

    'not_found_in_trash' => __( 'No wwd_brick_post_one found in Trash' ),

    'parent' => __( 'Parent wwd_brick_post_one' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_data_one'); 







  // Sample Resumes Banner custom post type-----
function post_type_brick_data_two() {
 register_post_type('wwd_brick_post_two',
  array(

    'labels' => array(

    'name' => __( 'wwd brick 2' ),

    'singular_name' => __( 'wwd_brick_post_two' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_post_two' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_post_two' ),

    'new_item' => __( 'New wwd_brick_post_two' ),

    'view' => __( 'View wwd_brick_post_two' ),

    'view_item' => __( 'View wwd_brick_post_two' ),

    'search_items' => __( 'Search wwd_brick_post_two' ),

    'not_found' => __( 'No wwd_brick_post_two' ),

    'not_found_in_trash' => __( 'No wwd_brick_post_two found in Trash' ),

    'parent' => __( 'Parent wwd_brick_post_two' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_data_two'); 









  // Sample Resumes Banner custom post type-----
function post_type_brick_line_two() {
 register_post_type('wwd_brick_line_two',
  array(

    'labels' => array(

    'name' => __( 'wwd brick line 2' ),

    'singular_name' => __( 'wwd_brick_line_two' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_line_two' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_line_two' ),

    'new_item' => __( 'New wwd_brick_line_two' ),

    'view' => __( 'View wwd_brick_line_two' ),

    'view_item' => __( 'View wwd_brick_line_two' ),

    'search_items' => __( 'Search wwd_brick_line_two' ),

    'not_found' => __( 'No wwd_brick_line_two' ),

    'not_found_in_trash' => __( 'No wwd_brick_line_two found in Trash' ),

    'parent' => __( 'Parent wwd_brick_line_two' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_line_two'); 






  // Sample Resumes Banner custom post type-----
function post_type_brick_line_three() {
 register_post_type('wwd_brick_line_three',
  array(

    'labels' => array(

    'name' => __( 'wwd brick line 3' ),

    'singular_name' => __( 'wwd_brick_line_three' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_line_three' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_line_three' ),

    'new_item' => __( 'New wwd_brick_line_three' ),

    'view' => __( 'View wwd_brick_line_three' ),

    'view_item' => __( 'View wwd_brick_line_three' ),

    'search_items' => __( 'Search wwd_brick_line_three' ),

    'not_found' => __( 'No wwd_brick_line_three' ),

    'not_found_in_trash' => __( 'No wwd_brick_line_three found in Trash' ),

    'parent' => __( 'Parent wwd_brick_line_three' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_line_three'); 



  // Sample Resumes Banner custom post type-----
function post_type_brick_line_four() {
 register_post_type('wwd_brick_line_four',
  array(

    'labels' => array(

    'name' => __( 'wwd brick line 4' ),

    'singular_name' => __( 'wwd_brick_line_four' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_line_four' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_line_four' ),

    'new_item' => __( 'New wwd_brick_line_four' ),

    'view' => __( 'View wwd_brick_line_four' ),

    'view_item' => __( 'View wwd_brick_line_four' ),

    'search_items' => __( 'Search wwd_brick_line_four' ),

    'not_found' => __( 'No wwd_brick_line_four' ),

    'not_found_in_trash' => __( 'No wwd_brick_line_four found in Trash' ),

    'parent' => __( 'Parent wwd_brick_line_four' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_line_four'); 





  // Sample Resumes Banner custom post type-----
function post_type_brick_line_five() {
 register_post_type('wwd_brick_line_five',
  array(

    'labels' => array(

    'name' => __( 'wwd brick line 5' ),

    'singular_name' => __( 'wwd_brick_line_five' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_line_five' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_line_five' ),

    'new_item' => __( 'New wwd_brick_line_five' ),

    'view' => __( 'View wwd_brick_line_five' ),

    'view_item' => __( 'View wwd_brick_line_five' ),

    'search_items' => __( 'Search wwd_brick_line_five' ),

    'not_found' => __( 'No wwd_brick_line_five' ),

    'not_found_in_trash' => __( 'No wwd_brick_line_five found in Trash' ),

    'parent' => __( 'Parent wwd_brick_line_five' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_line_five'); 








  // Sample Resumes Banner custom post type-----
function post_type_brick_line_six() {
 register_post_type('wwd_brick_line_six',
  array(

    'labels' => array(

    'name' => __( 'wwd brick line 6' ),

    'singular_name' => __( 'wwd_brick_line_six' ),

    'add_new' => __( 'Add New' ),

    'add_new_item' => __( 'Add New wwd_brick_line_six' ),

    'edit' => __( 'Edit' ),

    'edit_item' => __( 'Edit wwd_brick_line_six' ),

    'new_item' => __( 'New wwd_brick_line_six' ),

    'view' => __( 'View wwd_brick_line_six' ),

    'view_item' => __( 'View wwd_brick_line_six' ),

    'search_items' => __( 'Search wwd_brick_line_six' ),

    'not_found' => __( 'No wwd_brick_line_six' ),

    'not_found_in_trash' => __( 'No wwd_brick_line_six found in Trash' ),

    'parent' => __( 'Parent wwd_brick_line_six' ),
   ),
   'public' => true,

   'show_ui' => true,

   'exclude_from_search' => true,

   'hierarchical' => true,

   'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields' ),

   'query_var' => true
   )
   );
 }
 add_action('init', 'post_type_brick_line_six'); 


// Content Limit
 function the_content_limit($max_char, $more_link_text = ' ', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);
    if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
    $content = substr($content, 0, $espacio);
    $content = $content;
    echo $content;
    echo "...<a href='"; the_permalink(); echo "'>"."</a>";
}   else {
      echo $content;
      echo "...<a href='"; the_permalink(); echo "'>"."</a>";
   }
}

