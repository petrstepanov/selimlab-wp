<?php
/**
 * Custom template tags for Twenty Fifteen
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

if ( ! function_exists( 'twentyfifteen_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfifteen' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'twentyfifteen' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'twentyfifteen' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'twentyfifteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'twentyfifteen' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'twentyfifteen' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		// Petr Stepanov: remove updated time

		// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		// }

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		// printf( '<p class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></p>',
		// 	_x( 'Posted on', 'Used before publish date.', 'twentyfifteen' ),
		// 	esc_url( get_permalink() ),
		// 	$time_string
		// );
	}

	if ( 'post' == get_post_type() ) {

		// Petr Stepanov: remove post Author

		// if ( is_singular() || is_multi_author() ) {
		// 	printf( '<p class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></p>',
		// 		_x( 'Author', 'Used before post author name.', 'twentyfifteen' ),
		// 		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		// 		get_the_author()
		// 	);
		// }

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
		if ( $categories_list && twentyfifteen_categorized_blog() ) {
			printf( '<p class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</p>',
				_x( 'Categories', 'Used before category names.', 'twentyfifteen' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfifteen' ) );
		if ( $tags_list ) {
			printf( '<p class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</p>',
				_x( 'Tags', 'Used before tag names.', 'twentyfifteen' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'twentyfifteen' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */

		// Petr Stepanov: remove "Leave Comment"
		// comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentyfifteen' ), get_the_title() ) );
		echo '</span>';
	}
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function twentyfifteen_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'twentyfifteen_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'twentyfifteen_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentyfifteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentyfifteen_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see twentyfifteen_categorized_blog()}.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'twentyfifteen_categories' );
}
add_action( 'edit_category', 'twentyfifteen_category_transient_flusher' );
add_action( 'save_post',     'twentyfifteen_category_transient_flusher' );

if ( ! function_exists( 'selimtheme_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Twenty Fifteen 1.0
 */
function selimtheme_post_thumbnail() {
	if ( post_password_required() || is_attachment()) {
		return;
	}
	if ( is_front_page() ) {
		return;
	}
	?>

	<div class="title-banner <?php if (is_single() && !is_page()){echo "is_post";} if (has_post_thumbnail()){echo " has_thumbnail";} else {echo " no_thumbnail";} ?> font-size-controller" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8">
					<?php
						the_title( '<h1><span class="plate">', '</span></h1>' );
						if (strlen(get_the_subtitle( get_the_ID() , '' , '', false)) > 0) :
							the_subtitle( '<p class="subtitle"><span class="plate">', '</span></p>' );
						endif;

						// if it's a post
						if (is_single() && !is_page()){
							echo "<p class='post-date'>" . get_the_date('F j, Y', $post_id) . "</p>";

							$post_id = $post["ID"];
							$content = get_post_field('post_content', $post_id);
							$pieces = explode("<!--more-->", $content);

							echo "<p class='post-excerpt'>" . $pieces[0] . "</p>";
						}
					?>
                </div>
            </div>
        </div>
    </div>
	<?php
}
endif;

if ( ! function_exists( 'selimtheme_post_titile' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Twenty Fifteen 1.0
 */
function selimtheme_post_title() {
	if (!( post_password_required() || is_attachment() || ! has_post_thumbnail() )) {
		return;
	}

    the_title( '<h1>', '</h1>' );
	if (strlen(get_the_subtitle( get_the_ID() , '' , '', false)) > 0) :
		the_subtitle( '<p class="subtitle"><span class="plate">', '</span></p>' );
	endif;

}
endif;

if ( ! function_exists( 'twentyfifteen_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function twentyfifteen_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;

if ( ! function_exists( 'twentyfifteen_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyfifteen_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'twentyfifteen' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyfifteen_excerpt_more' );
endif;

if ( ! function_exists( 'twentyfifteen_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Fifteen 1.5
 */
function twentyfifteen_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
