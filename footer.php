<?php
$render = isset( $args['render'] ) ? $args['render'] : true;

$front_page_ID = get_option( 'page_on_front' );

$col_1_title = get_field( 'column_1_title', $front_page_ID );
$col_2_title = get_field( 'column_2_title', $front_page_ID );

$col_3_title = get_field( 'column_3_title', $front_page_ID );
$address_text = get_field( 'address_text', $front_page_ID );
$address_html = get_field( 'address_map', $front_page_ID );

$col_4_title = get_field( 'column_4_title', $front_page_ID );
$phone_num_1 = get_field( 'phone_num_1', $front_page_ID );
$phone_num_2 = get_field( 'phone_num_2', $front_page_ID );
$phone_num_3 = get_field( 'phone_num_3', $front_page_ID );

$footer_image = wp_get_attachment_image( get_field( 'footer_image', $front_page_ID ), [ 600, 600 ] );


?>

<?php if ( $render === true ) : ?>

	<footer>
		<div class="container">
			<div class="columns">
				<div class="column-1">
					<span class="footer-title h4">
						<?= $col_1_title ?>
					</span>

					<div class="footer-menu">
						<?php wp_nav_menu( [ 
							'theme_location' => 'footer_col_1'
						] ) ?>
					</div>
				</div>
				<div class="column-2">
					<span class="footer-title h4">
						<?= $col_2_title ?>
					</span>

					<div class="footer-menu">
						<?php wp_nav_menu( [ 
							'theme_location' => 'footer_col_2'
						] ) ?>
					</div>
				</div>
				<div class="column-3">
					<span class="footer-title h4">
						<?= $col_3_title ?>
					</span>

					<p class="footer-address-text">
						<?= $address_text ?>
					</p>

					<div class="footer-address-map">
						<?= $address_html ?>
					</div>
				</div>
				<div class="column-4">
					<span class="footer-title h4">
						<?= $col_4_title ?>
					</span>

					<div class="footer-phones">
						<a href="tel:<?= $phone_num_1 ?>">
							<?= $phone_num_1 ?>
						</a>
						<a href="tel:<?= $phone_num_1 ?>">
							<?= $phone_num_2 ?>
						</a>
						<a href="tel:<?= $phone_num_1 ?>">
							<?= $phone_num_3 ?>
						</a>
					</div>

				</div>
			</div>
			<div class="social-media">

			</div>
		</div>
		<div class="footer-image">
			<?= $footer_image ?>
		</div>
	</footer>

<?php endif; ?>

<?php get_template_part( '/templates/components/popup' ) ?>

<div class="wp-scripts">
	<?php wp_footer() ?>
</div>


</body>

</html>