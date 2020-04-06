<?php
/**
 * The search form template
 *
 *
 * @package YourSpace
 */ ?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label for="s"><span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span></label>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" id="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button class="search-submit">Search</button>
</form>