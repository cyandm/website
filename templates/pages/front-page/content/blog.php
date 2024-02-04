<?php
$blog_q = new WP_Query( [ 
	"post_type" => "post",
	"posts_per_page" => "3",
	'meta_query' => [ 
		[ 
			'key' => 'show_in_front',
			'value' => 1,
		]
	]
] )
	?>



<?php if ( $blog_q->have_posts() ) : ?>
	<section class="blog-con container">
		<div class="section-title">
			<h2 class="h1">با سایان همیشه به روز باشید</h2>
			<a class="primary-btn"
			   href=<?= get_post_type_archive_link( 'post' ); ?>>
				مشاهده همه
			</a>
		</div>

		<div class="content">
			<?php
			while ( $blog_q->have_posts() ) {
				$blog_q->the_post();
				get_template_part( 'templates/components/card/blog' );
			}
			wp_reset_postdata();
			?>
		</div>
	</section>
<?php endif; ?>