<div id="workwithus">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle workwithus"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu workwithus', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<div class="container">

    	<h1> Work With Us </h1>

        <div class="workwith_post">

        <p> <?php echo get_theme_mod( 'work_us1', 'Oselot Staffing is a forward thinking Staffing company. We focus on recruiting only the top talent and work with only the best companies. We have a very rigorous interview process (lasts a total ~6 hour) where we be determining not only your technical skills, but who you are as a person. we care about having perfect culture fits for every one of our placements. Once you are hired, you will initially starts of working on our internal projects, but eventually be placed with one of our clients.' )."\n"; ?></p>
        
        <div class="clear"></div>

        <div class="culture_post">

        	<h2> Culture </h2>

        	<p> <?php echo get_theme_mod( 'work_us1', 'We value culture value above all else. which is why we take exceptional care of our employees. We make sure that the projects and clients our employees work with match thier specific talents and passions. We ensure that all our employees are challenged and constantly learning new things.' )."\n"; ?> </p>
        </div>

        <div class="clear"></div>

        <div class="perk_post">

        	<h2> Perk </h2>

        	<div class="perk_wraper clearfix">

            	<?php query_posts( array( 'post_type' => 'perk',  'ASC', 'posts_per_page' => 6  ) );

					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <div class="single_perk">

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

            <a href="#contact"><img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png" /></a>

        </div>

    </div>

</div>
</div>