<?php
$title = get_field( 'contact_title' );
$slogan = get_field( 'contact_slogan' );
$btn = get_field( 'contact_btn' );

$image_tr = wp_get_attachment_image( get_field( 'top_right' ), [ 300, 300 ] );
$image_tl = wp_get_attachment_image( get_field( 'top_left' ), [ 300, 300 ] );
$image_br = wp_get_attachment_image( get_field( 'bottom_right' ), [ 300, 300 ] );
$image_bl = wp_get_attachment_image( get_field( 'bottom_left' ), [ 300, 300 ] );


function cyn_render_content( $title, $slogan, $btn ) {

	$btn_url = $btn['url'];
	$btn_title = $btn['title'];
	echo "<div class=\"service-contact-content\">

		<div class=\"t2\">
			$title
		</div>

		<div class=\"body_2\">
			$slogan
		</div>
		
		<a class=\"primary-btn\"
		   href=\"$btn_url \">
			$btn_title
		</a>

	</div>";


}


?>


<div class="swiper-slide service-contact">

	<div class="container">
		<div class="service-contact-top">
			<?= $image_tr ?>

			<div class="only-desktop">
				<?php cyn_render_content( $title, $slogan, $btn ) ?>
			</div>

			<?= $image_tl ?>
		</div>

		<div class="service-contact-bottom">
			<?= $image_br ?>
			<?= $image_bl ?>
		</div>

		<div class="only-mobile">
			<?php cyn_render_content( $title, $slogan, $btn ) ?>
		</div>
	</div>

</div>