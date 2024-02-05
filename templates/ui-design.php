<?php
/* Template Name: UI Design */?>


<?php get_header( args: [ 'start_color' => '#FFC806', 'end_color' => '#CB5500' ] ); ?>


<main class="ui-design">
	<div class="swiper"
		 id="uiDesignSwiper">
		<div class="swiper-wrapper">
			<?php get_template_part( '/templates/pages/services/ui-design/slide-0' ) ?>
		</div>
	</div>
</main>


<div class="bottom-fire ui-fire">

</div>

<?php get_footer( args: [ 'render' => false ] ); ?>