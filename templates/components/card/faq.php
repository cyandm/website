<?php
$title = get_the_title();
$content = get_the_content();

?>


<div class="faq-card">
	<div class="faq-card__title-wrapper">

		<h3 class="faq-card__title">
			<?= $title ?>
		</h3>

		<i class="icon-arrow">

		</i>

	</div>

	<div class="faq-card__content-wrapper">
		<div>
			<p class="faq-card__content">
				<?= $content ?>
			</p>
		</div>
	</div>
</div>