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
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/selimlab.css?t=1509878478443">
        <link rel="shortcut icon" href="favicon.ico">
        <?php wp_head(); ?>
    </head>
    <body>
      <nav class="navbar navbar-selimlab navbar-expand-md navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="logo-vertical" src="<?php bloginfo('template_directory');?>/images/selimlab-logo-vertical.svg" />
            <img class="logo-horizontal" src="<?php bloginfo('template_directory');?>/images/selimlab-logo.svg" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <!-- <li class="nav-item active">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Welcome</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/research' ) ); ?>">Research</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/software' ) ); ?>">Software</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/facilities' ) ); ?>">Facilities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/publications' ) ); ?>">Publications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/teaching' ) ); ?>">Teaching</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url( home_url( '/people' ) ); ?>">People</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <img class="stripe-header" src="<?php bloginfo('template_directory');?>/images/stripe-header.png" alt="Navbar Separator"/>
