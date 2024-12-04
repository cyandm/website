<?php
use Cyan\Theme\Helpers\Icon;
?>

<a href="<?php printf( '%s/?s=', get_site_url() ) ?>"
   data-modal="search">
	<div class="btn-icon size-9 p-1.5">
		<?php echo Icon::get( 'Search' ); ?>
	</div>
</a>