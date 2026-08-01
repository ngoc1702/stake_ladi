<?php
/*
Template Name: Stake Landing Page
*/

add_filter( 'genesis_site_layout', 'caia_landing_layout' );
function caia_landing_layout() {
	return 'full-width-content';
}

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_before_footer', 'caia_add_content_after_footer', 8 );
remove_action( 'genesis_before_footer', 'caia_add_content_after_footer2' );
remove_action( 'genesis_after_footer', 'caia_add_content_fix' );

add_action( 'genesis_after_header', 'caia_add_page_landing' );
function caia_add_page_landing() {
	?>
	<main id="main-landing" class="landing-page stake-landing">
		<?php stake_landing_render_parts(); ?>
	</main>
	<?php
}

genesis();
 