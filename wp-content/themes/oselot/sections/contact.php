<div data-anchor="contact" id="contact">
<div id="navbar" class="navbar">

    <div class="header_inner">

        <nav id="site-navigation" class="navigation main-navigation" role="navigation">

            <button class="menu-toggle contact"><?php _e( 'Menu', 'oselot' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu contact', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

    </div>

</div><!-- #navbar -->	
	<div class="container">

        <h1> Contact Us </h1>

        <div class="contact_wraper">

        	<div class="left_contact">

            	<div class="single_address">

                	<span class="address_img"> <img src="<?php bloginfo('template_url'); ?>/images/call.png" /> </span>

                    <span class="address_detail">

                    	<strong> Call Us </strong>

                        <strong class="larger_text"><a href="tel:<?php echo get_theme_mod( 'fn', '(000) 111 222' )."\n"; ?>"> <?php echo get_theme_mod( 'fn', 'default_value' )."\n"; ?> </a></strong>

                    </span>

                </div>

                <div class="single_address">

                	<span class="address_img"> <img src="<?php bloginfo('template_url'); ?>/images/write_us.png" /> </span>

                    <span class="address_detail">

                    	<strong> Write Us </strong>

                        <strong class="larger_text"> <a href="mailto:<?php echo get_theme_mod( 'email', 'inquiries@oselot.com' )."\n"; ?>"><?php echo get_theme_mod( 'email', 'inquiries@oselot.com' )."\n"; ?></a></strong>

                    </span>

                </div>

                <div class="single_address">

                	<span class="address_img"> <img src="<?php bloginfo('template_url'); ?>/images/office.png" /> </span>

                    <span class="address_detail">

                    	<strong> Office 1 </strong>

                        <strong class="larger_text"> <?php echo get_theme_mod( 'ad1', '11 42nd St Suite 1121 Newyork, NY 11201' )."\n"; ?> </strong>

                    </span>

                </div>

                <div class="single_address">

                	<span class="address_img"> <img src="<?php bloginfo('template_url'); ?>/images/office.png" /> </span>

                    <span class="address_detail">

                    	<strong> Office 2 </strong>

                        <strong class="larger_text"> <?php echo get_theme_mod( 'ad2', '11 42nd St Suite 1121 Newyork, NY 11201' )."\n"; ?> </strong>

                    </span>

                </div>

            </div>

            <div class="right_contact">
            	<?php dynamic_sidebar('map'); ?>
        	</div>

            <div class="clear"></div>

        </div>

        <div class="down_arrow_section">

            <a href="#colophon"><img src="<?php bloginfo('template_url'); ?>/images/arrow_down.png" /></a>

        </div>

    </div>

</div>