<div id="value">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle value"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu value', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<div class="container">

    	<h1> Our Values </h1>

    	<div class="perk_post">

        	<div class="perk_wraper">

            	<?php query_posts( array( 'post_type' => 'values',  'ASC', 'posts_per_page' => 8  ) );

					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <div class="single_perk value">

                            <div class="left_perk_images">

                                <?php the_post_thumbnail(); ?>

                            </div>

                            <div class="right_perk_desc">

                                <h4> <?php the_title(); ?> </h4>

                                <?php the_content(); ?> 

                            </div>

                        </div>

                <?php endwhile; endif; wp_reset_query(); ?>

            </div>

        </div>

        <div class="down_arrow_section">
					<a href="#resumes">
                	<img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png">
                    </a>

                </div>

    </div>

</div>