<?php
$bg_img_desktop = get_field( 'bg_image_desktop' );
$bg_img_mobile = get_field( 'bg_image_mobile' );



?>

<?php get_header( null, [ 'render' => false ] ) ?>

<main div="single-project">
	<picture>
		<source media="(min-width:768px)"
				srcset="<?= $bg_img_desktop ?>">
		<source media="(max-width:768px)"
				srcset="<?= $bg_img_mobile ?>">

		<img src="<?= $bg_img_desktop ?>"
			 alt="<?= get_the_title() ?>">
	</picture>
</main>


<?php get_footer( null, [ 'render' => false ] ) ?>