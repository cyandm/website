<?php
$ID = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();

$name = get_the_title( $ID );
$special = get_field( 'job_position', $ID );
$biography = get_field( 'biography', $ID );
$color = get_field( 'color_1', $ID );
$image = wp_get_attachment_image( get_post_thumbnail_id( $ID ), 'full' );

?>

<div class="employ-card"
	 style="--employ-color:<?= $color ?>">
	<div class="employ-card__container">
		<div class="employ-card__name-wrapper">
			<span class="employ-card__name">
				<?= $name ?>
			</span>
			<span class="employ-card__special">
				<?= $special ?>
			</span>
		</div>

		<div class="employ-card__image">
			<?= $image ?>
		</div>
	</div>

	<div class="employ-card__biography-wrapper">
		<span class="employ-card__name">
			<?= $name ?>
		</span>
		<p class="employ-card__biography">
			<?= substr( $biography, 0, 250 ) ?>
		</p>
	</div>
</div>