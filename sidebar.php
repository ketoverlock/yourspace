<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package YourSpace
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar">
    
    <?php if (get_theme_mod('profile_display')) : ?>
    <div id="profile" class="profile-info">
        <h2 class="profile-title"><?php echo esc_attr(get_theme_mod('profile_title')); ?></h2>
        
        <div class="profile-content">
            
            <img src="<?php echo wp_get_attachment_url(get_theme_mod('profile_photo')); ?>" alt="<?php echo esc_attr(get_theme_mod('profile_title')); ?>" class="profile-photo">
            
        </div>
        
    </div>
    <?php endif; ?>
    
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
