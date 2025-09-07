<?php

function gamestore_styles()
{
	wp_enqueue_style(
		'gamestore-general',
		get_template_directory_uri() . "/assets/css/gamestore.css",
		[],
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'gamestore-theme-related',
		get_template_directory_uri() . "/assets/css/gamestore.js",
		[],
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'gamestore_styles');


function gamestore_google_font()
{
	$font = 'Urbanist';
	$font_extra = 'wght@400;500;600;700';

	// Allow theme to disable font loading via translation filter
	if ('off' !== _x('on', 'Google font: on or off', 'gamestore')) {
		$query_args = array(
			'family' => $font . ':' . $font_extra,
			'subset' => 'latin,latin-ext',
			'display' => 'swap',
		);

		// Google Fonts API endpoint must include `?`
		$font_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css2');

		return $font_url;
	}

	return '';
}

function gamestore_google_font_script()
{
	$font_url = gamestore_google_font();

	if (!empty($font_url)) {
		wp_enqueue_style(
			'gamestore-google-font',
			$font_url,
			array(),
			null
		);
	}
}
add_action('wp_enqueue_scripts', 'gamestore_google_font_script');

