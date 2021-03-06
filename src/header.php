<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until the main content
 *
 * @package OMP
 * @subpackage Theme
 * @copyright 1997-2012 Alistair Wooldrige
 * @author Alistair Wooldrige <alistair@wooldrige.co.uk>
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title('-', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " - $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' - ' . sprintf('Page %s', max($paged, $page));

    ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php get_bloginfo('description'); ?>">
    <meta name="author" content="Alistair Wooldrige">

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="author" href="https://plus.google.com/103905050175116936578/posts"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Average' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-57-precomposed.png">
    <?php wp_head(); ?>
</head>

<body <?php //body_class(); ?>>

<div class="navbar navbar-static-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand-logo" href="<?php echo esc_url(home_url('/')); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-navbar.png"></a>
            <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li<?php if(is_home()) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li<?php if(is_page('About')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('/')); ?>about">About</a></li>
                    <li<?php if(is_page('Contact')) { echo ' class="active"'; } ?>><a href="<?php echo esc_url(home_url('/')); ?>contact">Contact</a></li>
                </ul>
                <form class="navbar-search pull-right"
                      role="search"
                      method="get"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" class="search-query" name="s" id="s" placeholder="Search">
                </form>
            <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div id="primary">
        <div id="content" role="main">
            <div class="container">
