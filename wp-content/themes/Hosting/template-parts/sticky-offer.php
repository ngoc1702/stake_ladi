<?php
/**
 * Hosting landing sticky offer bar.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid     = get_the_ID();
$enabled = hosting_landing_get_field( 'hosting_sticky_enabled', $pid, 1 );

if ( ! $enabled ) {
	return;
}

$logo      = hosting_landing_get_field( 'hosting_sticky_logo', $pid );
$name      = hosting_landing_get_field( 'hosting_sticky_name', $pid, 'Duelbits' );
$color     = hosting_landing_get_field( 'hosting_sticky_color', $pid, '#ff8a00' );
$badge     = hosting_landing_get_field( 'hosting_sticky_badge', $pid, 'Best casino bonus' );
$text      = hosting_landing_get_field( 'hosting_sticky_text', $pid, 'Duelbits - Get 500 free spins + $100 in free bets' );
$cta_label = hosting_landing_get_field( 'hosting_sticky_cta_label', $pid, 'Claim bonus' );
$cta_url   = hosting_landing_get_field( 'hosting_sticky_cta_url', $pid, 'https://go.duelbits.net/visit/?bta=36979&brand=duelbits' );
?>

<aside class="hosting-sticky-offer" data-hosting-sticky>
	<div class="hosting-container hosting-sticky-offer__inner">
		<?php hosting_landing_brand_logo( $name, $logo, $color, 'hosting-sticky-logo' ); ?>

		<div class="hosting-sticky-offer__copy">
			<?php if ( $badge ) : ?>
				<span><?php echo esc_html( $badge ); ?></span>
			<?php endif; ?>
			<strong><?php echo esc_html( $text ); ?></strong>
		</div>

		<a class="hosting-button hosting-button--dark" href="<?php echo esc_url( $cta_url ); ?>">
			<?php echo esc_html( $cta_label ); ?> <span aria-hidden="true">&rsaquo;</span>
		</a>
	</div>
</aside>
