<?php
/****************************** Required Files */
require_once( __DIR__ . '/inc/classes/cyn-theme-init.php' );
require_once( __DIR__ . '/inc/classes/cyn-acf.php' );
require_once( __DIR__ . '/inc/classes/cyn-register.php' );
require_once( __DIR__ . '/inc/classes/cyn-ajax.php' );

/***************************** Instance Classes */
$cyn_theme_init = new cyn_theme_init();
$cyn_acf = new cyn_acf();
$cyn_register = new cyn_register();
$cyn_ajax = new cyn_ajax();