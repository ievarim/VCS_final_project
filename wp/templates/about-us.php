<?php /* Template Name: About */ ?>
<?php get_header(); ?>

<!-- ========== About content ========== -->

<?php
if ( have_posts()) :
	while ( have_posts()) :
		the_post();
		?>

		<section class="flex about-content">

			<div class="about-img">
				<img src="<?php the_post_thumbnail_url(); ?>">
			</div>

			<div class="about-txt">
				<p><?php the_content(); ?></p>
			</div>

		</section>

		<?php

	endwhile;
endif;
?>

<?php get_footer(); ?>