<?php
$projects_Q = new WP_Query( [ 
	'post_type' => 'project',
	'meta_query' => [ 
		[ 
			'key' => 'show_in_front',
			'value' => 1,
		]
	]
] );

?>


<?php if ( $projects_Q->have_posts() ) : ?>
	<section class="projects-con">
		<div class="section-title container">
			<h2 class="h1">گوشه ای از پروژه‌های موفق سایان</h2>
		</div>

		<div class="projects-wrapper swiper">
			<div class="swiper-wrapper">
				<?php for ( $i = 0; $i < 2; $i++ ) { ?>

					<?php
					while ( $projects_Q->have_posts() ) :
						$projects_Q->the_post();
						get_template_part(
							'templates/components/card/projects',
							null,
							[ 'additional_class' => 'swiper-slide' ] );
					endwhile;

					wp_reset_postdata();

					?>

				<?php } ?>
			</div>
		</div>

	</section>
<?php endif; ?>