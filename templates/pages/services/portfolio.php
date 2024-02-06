<?php
$projects = get_field( 'portfolios' );

?>

<div class="swiper-slide projects-con ">
	<div class="swiper"
		 id="portfolioServicePage">
		<div class="swiper-wrapper">
			<?php foreach ( $projects as $key => $project_ID ) : ?>

				<div class="swiper-slide">

					<?php
					get_template_part(
						'/templates/components/card/projects',
						null,
						[ 'project-id' => $project_ID, 'links' => true ] );
					?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

</div>