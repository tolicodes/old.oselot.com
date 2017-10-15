<?php

/**

 * The template for displaying the footer

 *

 * Contains footer content and the closing of the #main and #page div elements.

 *

 * @package WordPress

 * @subpackage Twenty_Thirteen

 * @since Twenty Thirteen 1.0

 */

?>



		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

        	<div class="socials">

            	<ul>

                	<li><a href="<?php echo get_theme_mod( 'fb', 'http://facebook.com/' )."\n"; ?>"> <i class="fa fa-facebook"></i></a></li>

                    <li><a href="<?php echo get_theme_mod( 'tw', 'http://twitter.com/' )."\n"; ?>"> <i class="fa fa-twitter"></i></a></li>

                </ul>

            </div> 

			<div class="site-info">

            	Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> Oselot </a>

			</div><!-- .site-info -->
			<div class="top_btn">
            	<a href="#top"><img src="<?php bloginfo('template_url'); ?>/images/arrow_up.png" /></a>
            </div>
		</footer><!-- #colophon -->

	</div><!-- #page -->


	<?php wp_footer(); ?>

</body>

</html>