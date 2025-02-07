<?php
	/**
	 * The header for our theme
	 *
	 * @package theme_name
	 */
	$t_options = get_option( 'tp_opt' );
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>

	<!-- External CSS -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="header"></header>