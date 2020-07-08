<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Header --> 
	<header class="header">
		<div class="container">
			<?php

				the_custom_logo();

				if (is_front_page() && is_home()){ ?>
					<div class="logo"><?php bloginfo('name'); ?></div>
				<?php  } else{ ?>
					<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></div>
				<?php } 
			?>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle"><?php esc_html_e( 'Menu', 'twentytwenty'); ?></button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'main-menu',
								'container'       => false, 
							)
						);
					?>
			</nav>
		</div>		
	</header>
	<main>