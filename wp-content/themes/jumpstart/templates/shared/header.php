<!doctype HTML>
<html class="no-js" lang="en">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name');?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<!-- <script src="/bower_components/normalize-css/normalize.css"></script> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri(); ?>/dist/css/styles.css">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div id="page">
		<header role="banner">

			<?php get_template_part('nav-btstrp'); ?>
			<?php //get_template_part('nav-btstrp'); ?>

		</header>
