<script type="text/javascript">

	$(document).ready(function() {

		$('.fancybox-buttons').fancybox();		

		$('.single_box_fancy').mouseenter(function(){

			$(this).find('.caption_fancy_box').stop(true).fadeIn('slow');

		});

		$('.single_box_fancy').mouseleave(function(){

			$(this).find('.caption_fancy_box').fadeOut('slow');

		});

	});

</script>

<div id="resumes">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle resume"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu resume', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<div class="container">

		<h1> Sample Resumes </h1>

        <div class="resume_lists">

        	<?php query_posts( array( 'post_type' => 'resume',  'ASC', 'posts_per_page' => 20  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="single_resume">

            			<?php the_post_thumbnail(); ?>

                		<p> <?php the_title(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>

            <div class="clear"></div>

            <div class="resume_fancybox">

            	<?php query_posts( array( 'post_type' => 'resume_b',  'ASC', 'posts_per_page' => 6  ) );

					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

                        	<div class="single_box_fancy">

                            	<a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo $url; ?>">

                                	<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />

                                </a>

                                <a class="fancybox-buttons caption_fancy_box" data-fancybox-group="button" href="<?php echo $url; ?>">

                                	<img src="<?php bloginfo('template_url'); ?>/images/view.png" width="100"/>

                                </a>

                            </div>

                <?php endwhile; endif; wp_reset_query(); ?>

            </div>

            <div class="clear"></div>

        </div>

        <div class="down_arrow_section">

            <a href="#workwithus"><img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png" /></a>

        </div>

    </div>

</div>