<?php

require get_stylesheet_directory_uri() . 'inc/libs/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cyandm/website/',
	__FILE__,
	'cyandm'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch( 'main' );

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication( 'your-token-here' );