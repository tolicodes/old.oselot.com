<div id="whatwedo">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle whatwedo"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu whatwedo', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<h1> What We Do </h1>
    <!----------------- anees --------------------->		
    <div class="container_wider">
    <div class="whatwedo_data_text">
	<?php dynamic_sidebar('whatwedo_data_text');?>
    </div>
    <div class="whatwedo_complex_thumbs clearfix">
    <!--- for smaller -->
    <div class="whatwedo_complex_thumbs_centeral_clearer">
      <div class="whatwedo_complex_thumbs_centeral">
     
     <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_post_centeral',  'ASC', 'posts_per_page' => 1  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="whatwedo_post_centeral">
					<?php the_post_thumbnail(); ?>
                    <h1>
					<?php the_title(); ?>
                    </h1>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends -----------------> 
     
     </div>
     </div>
     
     
     <div class="whatwedo_complex_thumbs_left">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_post_left', 'order'=>'ASC',   'posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="whatwedo_post_left">
					<?php the_post_thumbnail(); ?>
                    <h3>
					<?php the_title(); ?>
                    </h3>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->           
     </div>
     <div class="whatwedo_complex_thumbs_centeral">
     
     <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_post_centeral',  'ASC', 'posts_per_page' => 1  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="whatwedo_post_centeral">
					<?php the_post_thumbnail(); ?>
                    <h1>
					<?php the_title(); ?>
                    </h1>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends -----------------> 
     
     </div>
     <div class="whatwedo_complex_thumbs_right">
     <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_post_right',  'ASC', 'posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="whatwedo_post_right">
					<?php the_post_thumbnail(); ?>
                    <h3>
					<?php the_title(); ?>
                    </h3>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends -----------------> 
     </div>
    </div>
    <!----------- bricks start ------------>
    <div class="bricks_line_one">
     <div class="clearfix">
      <div class="brick_modal brick_modal_left">
       <h2>
        where do recruit engineers from?
       </h2>
       <ul class="brick_figure_list">
        <li><img src="<?php bloginfo('template_url'); ?>/images/recruit icon 1.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/recruit icon 2.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/recruit icon 3.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/recruit icon 4.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/recruit icon 5.png" alt=""  /></li>
       </ul>
       <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_post_one',  'DESC', 'posts_per_page' => 1  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_one_data">
					<?php the_post_thumbnail(); ?>
                    <h3>
					<?php the_title(); ?>
                    </h3>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     
      </div>
      <div class="brick_modal brick_modal_right">
       <h2>
        how employers find us
       </h2>
       <ul class="brick_figure_list">
        <li><img src="<?php bloginfo('template_url'); ?>/images/employers find icon 1.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/employers find icon 2.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/employers find icon 3.png" alt=""  /></li>
        <li><img src="<?php bloginfo('template_url'); ?>/images/employers find icon 4.png" alt=""  /></li>
       </ul>
       <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_post_two',  'DESC', 'posts_per_page' => 1  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_data">
					<?php the_post_thumbnail(); ?>
                    <h3>
					<?php the_title(); ?>
                    </h3>
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
      </div>
     </div>
    </div>
    <div class="clearfix">
    <div class="bricks_line_two">
     <div class="brick_modal">
     <h1 align="center">
      our processes
     </h1>
     <div class="clearfix">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_line_two', 'order'=>'ASC', 'posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_post">
                    <figure>
					<?php the_post_thumbnail(); ?>
                    </figure>
                    
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     </div>
     </div>
    </div>
    </div>
    <div class="bricks_line_three">
     <div class="brick_modal">
     <h1 align="center">
      contract with oslet on trial bases
     </h1>
     <div class="clearfix">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_line_three',  'order'=>'ASC', 'posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_post">
                    <figure>
					<?php the_post_thumbnail(); ?>
                    </figure>
                    
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     </div>
     </div>
    </div>
    <div class="clearfix">
    <div class="bricks_line_four">
     <div class="brick_modal">
     <h1 align="center">
      hire to oselot (if international)
     </h1>
     <div class="clearfix">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_line_four',  'DESC', 'posts_per_page' => 2  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_post">
                    <figure>
					<?php the_post_thumbnail(); ?>
                    </figure>
                    
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     </div>
     </div>
    </div>
    </div>
    <div class="bricks_line_five">
    <div class="brick_modal">
     <h1 align="center">
      hire to oselot
     </h1>
     <div class="clearfix">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_line_five',  'order'=>'ASC', 'posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_post">
                    <figure>
					<?php the_post_thumbnail(); ?>
                    </figure>
                    
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     </div>
     </div>
    </div>
    <div class="clearfix">
    <div class="bricks_line_six">
    <div class="brick_modal">
     <h1 align="center">
      how you can hire our engineer
     </h1>
     <div class="clearfix">
      <!--------- fetching ------>
      <?php query_posts( array( 'post_type' => 'wwd_brick_line_six','order'=>'ASC','posts_per_page' => 3  ) );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        			<div class="bricks_line_two_post">
                    <figure>
					<?php the_post_thumbnail(); ?>
                    </figure>
                    
                    
                    <p> <?php the_content(); ?> </p>

            		</div>

                <?php endwhile; endif; wp_reset_query(); ?>
                
                
     <!----------- fetching ends ----------------->
     </div>
     </div>
    </div>
    </div>
   <!----------- bricks end ------------>     
        
<!----------------- anees ends--------------------->  



<div class="down_arrow_section">
					<a href="#whyweexist">
                	<img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png">
                    </a>

                </div>      
        
        
        <!--<div class="whatwedo_wraper">
        	<div class="top_what_sectoion">
                <img src="<?php bloginfo('template_url'); ?>/images/whatwedo.png" />
                <div class="top_img_text">
                    <div> Lorem ipsum dolor sit amet, consectetur adipisicing elit </div>
                    <div> Lorem ipsum dolor sit amet, consectetur adipisicing elit </div>
                    <div> Lorem ipsum dolor sit amet, consectetur adipisicing elit </div>
                    <div> Lorem ipsum dolor sit amet, consectetur adipisicing elit </div>
            	</div>
        	</div>
            <div class="last_what_sectoion">
            	<h2> OUR STEPS AND WHAT'S MAKES US UNIQUE </h2>
                <img src="<?php bloginfo('template_url'); ?>/images/dir_arrows.png" />
                <div class="last_what_img_text">
                    <div> <strong> 1 </strong> SED VEHICULA, Tellus </div>
                    <div> DONEC AC LACUS VEL <strong> 2 </strong> </div>
                    <div> <strong> 3 </strong> MORBI RISUS MAURIS </div>
                    <div> ALIQUA US MAGNA <strong> 4 </strong> </div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            	</div>
        	</div>
        </div>-->
    </div>
</div>