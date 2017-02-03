<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<div class="container font-size-controller">
		<div class="row">
			<section class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="spacer-4em"></div>
                <img class="full-width" src="<?php bloginfo('template_directory');?>/img/404.svg#icon-menu"></use></svg>
                <div class="spacer-2em"></div>
				<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h1>

				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p>
                <div class="spacer-2em"></div>

				<?php get_search_form(); ?>
			</section>
        </div>
    <div>
</main><!-- .site-main -->

<?php get_footer(); ?>
