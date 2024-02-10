<?php
/* Template Name: Front Page */?>

<?php get_header(); ?>

<div class="container preloader">
	<?php get_template_part( '/templates/pages/front-page/preloader/__index' ) ?>
	<div class="bottom-fire home-page-fire">

	</div>
</div>

<main class="front-page">
	<?php get_template_part( '/templates/pages/front-page/content/__index' ) ?>
</main>

<?php get_footer(); ?>