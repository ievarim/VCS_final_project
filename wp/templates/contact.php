<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<!-- ========== Contact form ========== -->

<div class="flex contact-form-container">
	<form class="flex contact-form">
		<span><?php the_field('cf_title')?></span>
		<?php the_content(); ?>
	</form>
</div>


<?php get_footer(); ?>