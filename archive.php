<?php
$current_Q = get_queried_object();


?>



<?php get_header(); ?>

<main class="container">

	<?php
	echo $current_Q->name
		?>
</main>

<? get_footer(); ?>