
<!-- ========== Collection section ========== -->

<div class="collection-heading">
	<h2><?php the_field('cs_title'); ?></h2>
	<img src="<?php bloginfo('template_directory')?>/assets/images/short-divider.png" alt="short-divider">
</div>

<div class="flex flex-wrap collection">

	<?php
	if( have_rows('cs_collection_image_repeater') ):
		while ( have_rows('cs_collection_image_repeater') ) : the_row();
			?>
			<div class="collection-img">
				<?php
				$image = get_sub_field('cs_collection_image');
				$link = get_sub_field('cs_link');
				?>
				<a href="<?php echo $link["url"]; ?>">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" id="collection-bracelets" />
					<div class="collection-overlay">
						<span><?php the_sub_field('cs_category_title'); ?></span>
					</div>
				</a>
			</div>
			<?php
		endwhile;
	endif;
	?>
</div>
