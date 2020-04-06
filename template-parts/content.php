<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourSpace
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				yourspace_posted_on();
				yourspace_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php yourspace_post_thumbnail(); 
        
		if (is_home() || is_archive()) :
        
            the_excerpt(); ?>
        
            <a href="<?php the_permalink(); ?>" class="more-link"><?php _e('Read More', 'yourspace'); ?></a>
        
        <?php else:
        
            the_content();
        endif;

		the_posts_pagination();
        
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php yourspace_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
