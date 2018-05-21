<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i%7Work+Sans:400,600,700&amp;subset=latin-ext" rel="stylesheet">

	<?php wp_head(); ?>

</head>

<body>
	<script>document.body.className += ' fade-out';</script>

<!-- ========== Header ========== -->
	<header>
		<div class="flex">

			<div class="logo">

				<?php

					$logo = '<img src="'.get_field('l_logo_image', 'option')["sizes"]["logo"].'" alt="'.get_bloginfo('name').'">'

				?>

				<a href="<?php echo home_url(); ?>"><?php echo $logo; ?></a>

			</div>

			<div id="toggle">
				<div class="span" id="one"></div>
				<div class="span" id="two"></div>
				<div class="span" id="three"></div>
			</div>

			<?php

			$args = ['theme_location' => 'primary-navigation', 'menu_class' => 'flex menu', 'container_class' => 'flex responsive-nav show-nav'];

			wp_nav_menu($args);

			?>

		</div>
	</header>
