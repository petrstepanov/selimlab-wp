<?php
/**
 * The template for displaying pages
 */

get_header(); ?>

<main role="main">
  <!-- <aside class="jumbotron jumbotron-fluid jumbotron-selimlab" style="background-image: url(<?php bloginfo('template_directory');?>/images/background-jumbotron.jpg)">
    <div class="container">
      <div class="row">
        <h2 class="col-md-10 col-lg-9 mb-5">Dr. Selim recognized for involving undergraduates in basic research</h1>
        <p class="col-12 date">Posted on Nov 14, 2016</p>
        <p class="col-lg-10 lead pb-3">Dr. Farida Selim, faculty member in the Department of Physics and Astronomy at Bowling Green State University, says she has been privileged to mentor nine undergraduate students...</p>
        <p class="col-12 lead mt-2 mt-sm-3 mt-md-4 mb-4">
          <a class="btn btn-success btn-lg" href="#" role="button">Learn More</a>
          <a class="btn btn-light btn-light-transparent btn-lg ml-4" href="#" role="button">Visit Blog</a>
        </p>
      </div>
    </div>
  </aside> -->
<?php
    // Variables we need to build the featured section
    $args = array( 'numberposts' => '1' );
    $recent_posts = wp_get_recent_posts($args);
    foreach( $recent_posts as $post ){
        $post_id = $post["ID"];
        $content = get_post_field('post_content', $post_id);
        $pieces = explode("<!--more-->", $content);
        $post_thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
        ?>
        <aside class="jumbotron jumbotron-fluid jumbotron-selimlab"
          <?php if(strlen($post_thumbnail_url) > 0) {
              echo "style='background-image: url(" . $post_thumbnail_url .")'";
          } else {
              echo "style='background-image: url(" . bloginfo('template_directory') . "/images/background-jumbotron.jpg)'";
          } ?>>
          <div class="container">
            <div class="row">
              <h2 class="col-md-10 col-lg-9 mb-4"><?php echo $post["post_title"]; ?></h1>
              <p class="col-12 date pt-2">Posted on <?php echo get_the_date('F j, Y', $post_id); ?></p>
              <p class="col-lg-10 lead pb-3"><?php echo $pieces[0]; ?></p>
              <p class="col-12 lead mt-2 mb-4">
                <a class="btn btn-success" href="<?php echo get_permalink($post_id); ?>" role="button">Learn More</a>
                <a class="btn btn-light btn-light-transparent ml-4" href="<?php echo get_permalink(get_option('page_for_posts')); ?>" role="button">Visit Blog</a>
              </p>
            </div>
          </div>
        </aside>
        <img class="stripe-jumbotron" src="<?php bloginfo('template_directory');?>/images/stripe-jumbotron.png" alt="Navbar Separator"/>
        <?php
    }
    wp_reset_query();
  ?>

  <?php
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
