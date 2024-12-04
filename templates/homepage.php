<?php
/**
 * Template Name: Homepage
 * @package CyanTheme
 */

use Cyan\Theme\Helpers\Templates;

get_header();

Templates::getPage( 'homepage/hero' );

get_footer();
