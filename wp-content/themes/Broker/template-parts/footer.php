<?php
/**
 * Hosting landing footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid        = get_the_ID();
$logo       = hosting_landing_get_field( 'hosting_footer_logo', $pid );
$logo_text  = hosting_landing_get_field( 'hosting_footer_logo_text', $pid, 'cybernews*' );
$links      = hosting_landing_get_field( 'hosting_footer_links', $pid, array() );
$copyright  = hosting_landing_get_field( 'hosting_footer_copyright', $pid, '(c) 2026 Cybernews - Latest Cybersecurity and Tech News, Research & Analysis' );

if ( empty( $links ) ) {
	$links = array(
		array( 'label' => 'Privacy Policy', 'url' => '#' ),
		array( 'label' => 'Terms & Conditions', 'url' => '#' ),
		array( 'label' => 'Cookie policy', 'url' => '#' ),
	);
}
?>

<footer class="hosting-footer">
	<div class="hosting-container">
		<div class="hosting-footer__brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
					<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
				<?php else : ?>
					<span aria-hidden="true">C</span>
					<strong><?php echo esc_html( $logo_text ); ?></strong>
				<?php endif; ?>
			</a>
		</div>

		<div class="hosting-footer__bottom">
			<nav class="hosting-footer__links" aria-label="Footer">
				<?php foreach ( $links as $link ) :
					if ( empty( $link['label'] ) ) {
						continue;
					}
					$url = ! empty( $link['url'] ) ? $link['url'] : '#';
					?>
					<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
				<?php endforeach; ?>
			</nav>

			<p><?php echo esc_html( $copyright ); ?></p>
		</div>
	</div>
</footer>
