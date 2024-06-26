<?php
$ID = isset($args['post_id']) ? $args['post_id'] : get_the_ID();

$name = get_the_title($ID);
$special = get_field('job_position', $ID);
$biography = get_field('biography', $ID);
$image = wp_get_attachment_image(get_post_thumbnail_id($ID), 'full');

?>
<div clas="fade-in-down" anim-delay="0.3">
	<div class="employ-card flex  bg-black-2 rounded-3xl " style=" ">
		<div class="front flex flex-col content-start jc-center gap-4">
			<?= $image ?>
			<div class="employ-card__name-wrapper flex flex-col gap-4">
				<span class="h4">
					<?= $name ?>
				</span>
				<span class="employ-card__special">
					<?= $special ?>
				</span>
			</div>
		</div>

		<div class="  behind-card | flex-col justify-start gap-2	">
			<span class="behind-card_name h4">
				<?= $name ?>
			</span>
			<span class="employ-card__special">
				<?= $special ?>
			</span>
			<p class="employ-card__biography">
				<?= substr($biography, 0, 250) ?>
				<!-- <a class="custom_link" href="<?= get_permalink($ID) ?>">
				مشاهده بیشتر
			</a> -->
			</p>
		</div>
	</div>
</div>