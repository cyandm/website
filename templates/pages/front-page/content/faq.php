<?php
$faq_Q = new WP_Query( [ 
	'post_type' => 'faq',
	'posts_per_page' => 5,
	'meta_query' => [ 
		[ 
			'key' => 'show_in_front',
			'value' => 1,
		]
	]
] );

$faq_image = wp_get_attachment_image( get_field( 'faq_section_image' ), 'full' );

?>


<?php if ( $faq_Q->have_posts() ) : ?>
	<section class="faq-con container">

		<div class="section-title">
			<h2 class="h1">
				سوالات متداول
			</h2>

			<a href=<?= get_post_type_archive_link( 'faq' ) ?>
			   class="primary-btn">
				مشاهده همه
			</a>
		</div>

		<div class="faq-content">


			<div class="faq-posts">
				<?php
				while ( $faq_Q->have_posts() ) {
					$faq_Q->the_post();
					get_template_part( '/templates/components/card/faq' );
				}

				wp_reset_postdata();

				?>
			</div>

			<div class="faq-image">
				<?= $faq_image ?>
			</div>
		</div>
	</section>
<?php endif; ?>