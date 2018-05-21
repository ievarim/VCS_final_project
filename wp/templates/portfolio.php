<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

<!-- ========== Portfolio filter ========== -->

<div class = "flex filter">

	<?php

	$terms = get_field('p_jewellery_categories');

	if( $terms ): ?>

	<ul class = "flex categories">

		<li>
			<a href="#" class="all"><?php _e( 'All products'); ?></a>
        </li>

        <?php $category_ids=[]; ?>

        <?php foreach( $terms as $term ):

        $category_ids[]=$term->term_id; 

        ?>

        <li>
        	<a href="#" class="category-<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
        </li>

   	 	<?php endforeach; ?>

	</ul>

<?php endif; ?>

</div>

<?php $args = array(

	'post_type' => 'jewellery',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'jewellery-category',
            'field'    => 'id',
            'terms'    => $category_ids,
        ),
    ),
);

$query = new WP_Query( $args );

?>

<!-- ========== Portfolio images ========== -->


<div class="flex flex-wrap portfolio">

	<?php
	if ($query -> have_posts() ) :

		while ($query -> have_posts() ) :

			$query -> the_post();

			$categories = get_the_terms( $post->ID, 'jewellery-category' );
			foreach( $categories as $category );

			?>

			<div class="product-img category-<?php echo $category->slug; ?>">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				<h3><?php the_title(); ?></h3>
			</div>

			<?php
		endwhile;
	endif;
	?>

</div>


<?php get_footer(); ?>