<div id="whoweare">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle team"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu team', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<div class="container">

    	<h1> Who We Are </h1>

    	<div class="team_wraper">

        	<?php query_posts( array( 'post_type' => 'team',  'ASC', 'posts_per_page' => 2  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="single_team">

                    	<div class="team_thumb">

                        	<?php the_post_thumbnail(); ?>

                        </div>

                        <h1> <?php the_title(); ?> </h1>

                        <strong> <?php the_meta(); ?> </strong>

                        <?php the_content(); ?>

            		</div>

           <?php endwhile; endif; wp_reset_query(); ?>

        </div>

		<div class="clear"></div>

        <div class="down_arrow_section">

            <a href="#value"><img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png" /></a>

        </div>

	</div>

</div>