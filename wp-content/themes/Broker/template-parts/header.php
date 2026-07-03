<?php
/**
 * Hosting landing top bar.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid              = get_the_ID();
$logo             = hosting_landing_get_field( 'hosting_header_logo', $pid );
$logo_text        = hosting_landing_get_field( 'hosting_header_logo_text', $pid, 'cybernews*' );
$disclosure_label = hosting_landing_get_field( 'hosting_disclosure_label', $pid, 'Advertiser disclosure' );
$disclosure_url   = hosting_landing_get_field( 'hosting_disclosure_url', $pid, '#' );
?>

<header class="hosting-topbar">
	<div class="hosting-container hosting-topbar__inner">
		<a class="hosting-topbar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
			<?php else : ?>
				<span class="hosting-topbar__brand-icon" aria-hidden="true">C</span>
				<strong><?php echo esc_html( $logo_text ); ?></strong>
			<?php endif; ?>
		</a>

		<?php if ( $disclosure_label ) : ?>
			<a class="hosting-topbar__disclosure" href="<?php echo esc_url( $disclosure_url ? $disclosure_url : '#' ); ?>">
				<?php echo esc_html( $disclosure_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</header>
