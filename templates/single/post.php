<?php get_header() ?>

<?php get_template_part( '/templates/components/breadcrumb' ) ?>

<main class="post-single container">
	<?php get_template_part( '/templates/components/sidebar', 'post' ) ?>

	<article class="post-single-container">
		<div class="img-wrapper post-single-thumbnail">
			<?= wp_get_attachment_image( get_post_thumbnail_id(), 'full' ) ?>
		</div>

		<div class="post-single-information">

		</div>

		<div class="post-single-title">
			<h1>
				<?= get_the_title() ?>
			</h1>
		</div>

		<div class="post-single-content">
			<?php the_content() ?>
		</div>

		<div class="post-single-comment">

		</div>

	</article>


</main>

<?php get_footer() ?>