<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<main role="main">

<?php
    // Variables we need to build the featured section
    $args = array( 'numberposts' => '1' );
    $recent_posts = wp_get_recent_posts($args);
    foreach( $recent_posts as $post ){
        $post_id = $post["ID"];
        $content = get_post_field('post_content', $post_id);
        $pieces = explode("<!--more-->", $content);
        ?>

        <aside class="title-banner"  style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?>)">
            <div class="container font-size-controller">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-md-8">
                        <h2><?php echo $post["post_title"]; ?></h2>
                        <p class="post-date"><?php echo get_the_date('F j, Y', $post_id); ?></p>
                        <p class="post-excerpt"><?php echo $pieces[0]; ?></p>
                        <div class="post-buttonbar">
                            <a class="btn btn-success" href="<?php echo get_permalink($post_id); ?>">Learn More</a>
                            <a class="btn btn-default" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Visit Our Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <?php
    }
    wp_reset_query();

	// Start the loop.
	while ( have_posts() ) : the_post();

		// Include the page content template.
		get_template_part( 'content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	// End the loop.
	endwhile;
	?>

</main><!-- .site-main -->

<?php get_footer(); ?>
