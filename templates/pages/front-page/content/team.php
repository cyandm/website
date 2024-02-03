<?php
$employs_Q = new WP_Query( [ 
	'post_type' => 'employ'
] )

	?>

<?php if ( $employs_Q->have_posts() ) : ?>
	<section class="team-con container">

		<div class="section-title">
			<h2 class="h1">
				کارای خفن یه تیم خفن هم میخواد
			</h2>

			<a href=<?= get_post_type_archive_link( 'employ' ) ?> class="primary-btn">
				مشاهده همه
			</a>
		</div>


		<div class="team-wrapper">
			<div class="profile-wrapper">

				<?php for ( $i = 0; $i < 3; $i++ ) : ?>

					<?php while ( $employs_Q->have_posts() ) :
						$employs_Q->the_post();
						?>

						<div class="img-wrapper profile" data-post-id=<?= get_the_ID() ?>>
							<?= get_the_post_thumbnail() ?>
						</div>

					<?php endwhile; ?>

				<?php endfor; ?>
			</div>
			<div class="content">

			</div>
		</div>
	</section>
<?php endif; ?>