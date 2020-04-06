<?php
/**
 * The front page template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourSpace
 */

get_header();
?>

	<div id="primary" class="content">
        
        <?php if (is_active_sidebar('extended-network')): ?>
        <div class="extended-network">
            <?php dynamic_sidebar('extended-network'); ?>
        </div>
        <?php endif; ?>
        
        <?php if (is_active_sidebar('blurbs')): ?>
        <div class="blurbs">
            <?php if (get_theme_mod('blurbs_title')) : ?>
                <h2 class="blurbs-title"><?php echo esc_attr(get_theme_mod('blurbs_title')); ?></h2>
            <?php endif; ?>
            <div class="blurbs-content">
                <?php dynamic_sidebar('blurbs'); ?>
            </div>
        </div>
        <?php endif; ?>
        
		<main id="main" class="site-main">
            
        <?php if (get_option('show_on_front') == 'posts') :

            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                the_posts_pagination();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            
        else: 
            
            while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
            
        endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
