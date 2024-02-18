<?php
cyn_under_construction();

$logo_svg_hard_code = true;

$start_color = isset( $args['start_color'] ) ? $args['start_color'] : '#15EDED';
$end_color = isset( $args['end_color'] ) ? $args['end_color'] : '#04B2E9';

$render = isset( $args['render'] ) ? $args['render'] : true;

?>



<!DOCTYPE html>
<html <?php language_attributes() ?>>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<?php wp_head() ?>
	</head>

	<body <?php body_class() ?>>
		<?php wp_body_open() ?>

		<?php if ( $render === true ) : ?>
			<header class="container"
					style="--start-color: <?= $start_color ?> ; --end-color: <?= $end_color ?>;">

				<?php get_template_part( '/templates/components/mobile-menu' ) ?>

				<div class="right-col">
					<div class="logo">
						<?php
						if ( $logo_svg_hard_code ) :
							get_template_part( '/templates/components/logo' );
						elseif ( has_custom_logo() ) :
							the_custom_logo();
						else : ?>
							<img src=<?= get_stylesheet_directory_uri() . '/assets/imgs/placeholder.png' ?>
								 alt="">
						<?php endif; ?>
					</div>

					<div class="header-menu desktop-menu">
						<?php
						wp_nav_menu( [ 
							'theme-location' => 'header'
						] )
							?>
					</div>
				</div>

				<div class="left-col">

					<a href="#"
					   class="primary-btn">
						یه پروژه بساز
					</a>

					<a href="#"
					   class="icon-btn">
						<i class="icon-call">

						</i>
					</a>

				</div>

			</header>
		<?php endif; ?>