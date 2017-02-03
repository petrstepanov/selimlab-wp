<?php
/**
 * The template for displaying the header
 */
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/selimlab.css?t=1486102208502">
        <link rel="shortcut icon" href="favicon.ico">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="selim-navbar-container">
            <header class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="selim-navbar">
                            <a href="<?php bloginfo( 'wpurl' );?>" title="Go Home">
                                <img class="visible-xs visible-md visible-lg logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-horizontal-smaller.png" alt="SelimLab Logo Horizontal"/>
                                <img class="visible-sm logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo-vertical-smaller.png" alt="SelimLab Logo Vertical"/>
                                <!-- <img class="visible-md logo" src="<?php bloginfo('template_directory');?>/img/logo-vertical.png" alt="SelimLab Logo Vertical Smaller"/> -->
                            </a>
                            <a class="toggle-menu js-toggle-menu" href="#">
                                <svg class="icon"><use xlink:href="<?php bloginfo('template_directory');?>/img/icons.svg#icon-menu"></use></svg>
                            </a>
                            <ul class="navigation js-navigation">
                                <li id="index"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Welcome</a></li>
                                <li id="research"><a href="<?php echo esc_url( home_url( '/research' ) ); ?>">Research</a></li>
                                <li id="software"><a href="<?php echo esc_url( home_url( '/software' ) ); ?>">Software</a></li>
                                <li id="facilities"><a href="<?php echo esc_url( home_url( '/facilities' ) ); ?>">Facilities</a></li>
                                <li id="publications"><a href="<?php echo esc_url( home_url( '/publications' ) ); ?>">Publications</a></li>
                                <li id="teaching" class="hidden-sm hidden-md hidden-lg"><a href="<?php echo esc_url( home_url( '/teaching' ) ); ?>">Teaching</a></li>
                                <li id="people"><a href="<?php echo esc_url( home_url( '/people' ) ); ?>">People</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
