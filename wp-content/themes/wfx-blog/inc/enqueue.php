<?php

/**
 * Enqueue Styles.
 */
	function enqueue_style() {
		wp_enqueue_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css' );
		wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
		wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/dist/css/style.css' );
		wp_enqueue_style( 'blog-listing-css', get_stylesheet_directory_uri() . '/dist/css/blog.css' );
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_style' );

/**
 * Enqueue Scripts.
 */
	function enqueue_js() {
		wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), false, true );
		wp_enqueue_script( 'main-script-js', get_stylesheet_directory_uri() . '/dist/js/script.js', array(), false, true );
		wp_enqueue_script( 'blog-js', get_stylesheet_directory_uri() . '/dist/js/blog.js', array(), false, true );
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_js' );


// script to load asynchronously
// wp_register_script('firstscript-async', '//www.domain.com/somescript.js', '', 2, false);
// wp_enqueue_script('firstscript-async');

// // script to be deferred
// wp_register_script('secondscript-defer', '//www.domain.com/otherscript.js', '', 2, false);
// wp_enqueue_script('secondscript-defer');

// // standard script embed
// wp_register_script('thirdscript', '//www.domain.com/anotherscript.js', '', 2, false);
// wp_enqueue_script('thirdscript');