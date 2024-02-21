<?php

$logos = array_filter( get_field( 'logos' ) );

?>

<?php if ( count( $logos ) > 0 ) : ?>

	<section class=" container brands-con">
		<h2 class="h1">برندهایی که افتخار همکاری باهاشون را داشتیم</h2>

		<div class="brands-wrapper swiper"
			 id="brandsSwiper">
			<div class="swiper-wrapper">
				<?php foreach ( $logos as $logo ) : ?>
					<div class="img-wrapper swiper-slide">
						<?= wp_get_attachment_image( $logo, 'full' ) ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

<?php endif; ?>