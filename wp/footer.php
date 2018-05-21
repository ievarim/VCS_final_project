<!-- ========== Footer ========== -->

<div class="divider">
	<img src="<?php bloginfo('template_directory')?>/assets/images/divider.png" alt="divider" class="container">
</div>

<div class ="flex space-between footer-content">
	<div class="flex contacts">
		<ul>
			<li>
				<span class="icon-location"></span>
				<?php the_field('fc_address', 'option'); ?>
			</li>

			<li>
				<span class="icon-mobile"></span>
				<a href = "tel:<?php the_field('fc_phone', 'option'); ?>" id="tel"><?php the_field('fc_phone', 'option'); ?></a>
			</li>

			<li>
				<span class="icon-envelop"></span>
				<a href="mailto:<?php the_field('fc_email', 'option'); ?>" target="_top" id="email"><?php the_field('fc_email', 'option'); ?></a>
			</li>

		</ul>
	</div>

	<div class="newsletter">

		<ul>
			<li id="newsletter-title"><?php the_field ('fn_title', 'option'); ?></li>
			<li><?php the_field ('fn_description', 'option'); ?></li>
        </ul>

        <div class="flex newsletter-elements">
        	
    		<?php if (is_active_sidebar( 'sidebar-1' ) ) : ?>
    			<div id="footer-sidebar" role="complementary">
    				<?php dynamic_sidebar( 'sidebar-1' ); ?>	
    			</div> 
    		<?php endif; ?>
        
        </div>

    </div>

</div>

<div id="copyright">
	<span>&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></span>
</div>


<?php wp_footer(); ?>

</body>
</html>