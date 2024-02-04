<?php
$employs_Q = new WP_Query( [ 
	'post_type' => 'employ',
	'posts_per_page' => '3',
	'meta_query' => [ 
		[ 
			'key' => 'show_in_front',
			'value' => 1,
		]
	]
] );


?>

<?php if ( $employs_Q->have_posts() ) : ?>
	<section class="team-con container">

		<div class="section-title">
			<h2 class="h1">
				کارای خفن یه تیم خفن هم میخواد
			</h2>

			<a href=<?= get_post_type_archive_link( 'employ' ) ?>
			   class="primary-btn">
				مشاهده همه
			</a>
		</div>


		<div class="team-wrapper">
			<div class="profile-wrapper">



				<?php
				while ( $employs_Q->have_posts() ) :
					$employs_Q->the_post();

					get_template_part( '/templates/components/card/employ', null, [ 'post_id' => get_the_ID() ] );
				endwhile;

				wp_reset_postdata();
				?>


			</div>
		</div>
	</section>
<?php endif; ?>