<?php
/**
 * The default template for displaying content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header content content.php">
		<?php
			selimtheme_post_thumbnail();
		?>
	</header><!-- .entry-header -->

	<div class="container font-size-controller">
		<div class="row">
			<div class="col-xs-12">
				<div class="entry-content">
					<?php
						/* translators: %s: Name of current post */
						// the_content( sprintf(
						// 	__( 'Continue reading %s', 'twentyfifteen' ),
						// 	the_title( '<span class="screen-reader-text">', '</span>', false )
						// ) );

						the_content(__( 'Continue reading →', 'twentyfifteen' ), true);

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div><!-- .entry-content -->

				<?php
					// Author bio.
					if ( is_single() && get_the_author_meta( 'description' ) ) :
						get_template_part( 'author-bio' );
					endif;
				?>

				<footer class="entry-footer">
					<?php twentyfifteen_entry_meta(); ?>
					<!-- <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?> -->
				</footer><!-- .entry-footer -->

			</div>
		</div>
	</div>
</article><!-- #post-## -->
		</div>
	</div>
</div>
