<?php
/**
 * Template part for displaying single posts.
 *
 * @package Adventure Time
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-single"); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php adventure_time_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail('post-thumb');
    } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adventure-time' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php adventure_time_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

