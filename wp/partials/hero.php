<!-- ========== Hero ========== -->

<!-- <div class="hero"> -->

<?php
if(get_field('h_hero_type') == 'image'){
	$hero_background = "<img src=" .get_field('h_hero_image')['url']. ">";

	echo '<div class="hero container" style="background-image: url('.get_field('h_hero_image')["url"].')">';

	} else {
		$hero_background_video = get_field ('h_hero_video')['url'];
		echo '<div class="hero">';
		echo '<video autoplay muted loop playsinline id="hero-video" class="container"> <source src = "'.get_field ('h_hero_video')['url'].'"></video>';
	}
?>

<div class="mobile-image" style="background-image: url(<?php echo get_field('h_hero_image_mobile')["url"]; ?>);"></div>


<div class="hero-content">
	<span><?php the_field('h_hero_text_first_line'); ?></span>
	<h2><?php the_field('h_hero_text_second_line'); ?></h2>
	<h1><?php the_field('h_hero_text_third_line'); ?></h1>
</div>
