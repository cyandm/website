<?php
$id = isset( $args['post-id'] ) ? $args['post-id'] : get_the_ID();
$terms = get_the_terms( $id, 'project-type' );
$feature_img = get_post_thumbnail_id( $id ) ?? null;
$gallery = get_field( 'gallery', $id );
$gallery_show = [ 'pic_1', 'pic_2', 'pic_3', 'pic_4' ];

?>

<div class="project-on-hover">

	<div class="head">
		<div class="right-col">
			<h3>
				<?= get_the_title( $id ) ?>
			</h3>
			<div>
				<?= get_field( 'short_desc', $id ) ?>
			</div>
		</div>
		<div class="left-col">
			<?php foreach ( $terms as $term ) : ?>
				<a href=<?= get_term_link( $term->term_id ) ?>
					style="<?= '--taxonomy-color: ' . get_field( 'color_1', $term->taxonomy . '_' . $term->term_id ) ?>">
					<?= $term->name ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="project-content">
		<div class="img-con">
			<?=
				$feature_img ? wp_get_attachment_image( $feature_img, 'large' ) : "<img src='" . get_stylesheet_directory_uri() . "/assets/imgs/placeholder.png' />";
			?>
		</div>

		<a href=<?= get_permalink( $id ) ?> class="primary-btn">
			مشاهده پروژه
		</a>
	</div>

	<div class="gallery">
		<?php foreach ( $gallery as $index => $img ) {
			if ( in_array( $index, $gallery_show ) && $img )
				printf( '<div class="img-wrapper">%s</div>', wp_get_attachment_image( $img, 'full' ) );
		} ?>
	</div>
</div>