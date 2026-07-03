<?php
/**
 * Bright bonus-style offer cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid        = get_the_ID();
$enabled    = hosting_landing_get_field( 'hosting_bonus_enabled', $pid, 1 );
$providers  = array_slice( hosting_landing_get_providers( $pid ), 0, 3 );
$title      = hosting_landing_get_field( 'hosting_bonus_title', $pid, 'Exclusive casino bonuses' );
$subtitle   = hosting_landing_get_field( 'hosting_bonus_subtitle', $pid, 'Fresh casino offers selected for bonus value, live betting, esports odds, and game variety.' );
$button     = hosting_landing_get_field( 'hosting_bonus_button_label', $pid, 'Claim bonus' );
$legal_text = hosting_landing_get_field( 'hosting_bonus_legal', $pid, '18+ only. Terms apply. Play responsibly.' );

if ( ! $enabled ) {
	return;
}

if ( empty( $providers ) ) {
	return;
}
?>

<section class="hosting-bonus-popup" id="hosting-bonus-deals" data-hosting-popup aria-hidden="true">
	<button class="hosting-bonus-popup__backdrop" type="button" data-hosting-popup-close aria-label="<?php esc_attr_e( 'Close popup', 'caia' ); ?>"></button>
	<div class="hosting-container">
		<div class="hosting-bonus-popup__shell" role="dialog" aria-modal="true" aria-labelledby="hosting-bonus-title">
			<button class="hosting-bonus-popup__close" type="button" data-hosting-popup-close aria-label="<?php esc_attr_e( 'Close popup', 'caia' ); ?>">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="hosting-bonus-popup__header">
				<span>Limited casino offers</span>
				<h2 id="hosting-bonus-title"><?php echo esc_html( $title ); ?></h2>
				<?php if ( $subtitle ) : ?>
					<p><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>
			</div>

			<div class="hosting-bonus-grid">
				<?php foreach ( $providers as $index => $provider ) :
					$name             = ! empty( $provider['name'] ) ? $provider['name'] : 'Casino Brand';
					$logo             = ! empty( $provider['logo'] ) ? $provider['logo'] : null;
					$logo_svg         = ! empty( $provider['logo_svg'] ) ? $provider['logo_svg'] : '';
					$color            = sanitize_hex_color( ! empty( $provider['accent_color'] ) ? $provider['accent_color'] : '#673de6' );
					$deal             = ! empty( $provider['deal_note'] ) ? $provider['deal_note'] : 'Casino bonus';
					$deal             = preg_replace( '/^get\s+/i', '', $deal );
					$score            = ! empty( $provider['score'] ) ? $provider['score'] : '9.0';
					$score_label      = ! empty( $provider['score_label'] ) ? $provider['score_label'] : 'Good';
					$score_out_of_100 = round( hosting_landing_score_value( $score ) * 10 );
					$url              = ! empty( $provider['button_url'] ) ? $provider['button_url'] : '#';
					$style            = $color ? ' style="--card-color:' . esc_attr( $color ) . '"' : '';
					?>
					<article class="hosting-bonus-card <?php echo 0 === $index ? 'is-leading' : ''; ?>"<?php echo $style; ?>>
						<div class="hosting-bonus-card__brand">
							<?php hosting_landing_brand_logo( $name, $logo, $color ? $color : '#673de6', 'hosting-bonus-logo', $logo_svg ); ?>
						</div>

						<div class="hosting-bonus-card__deal">
							<span>bonus</span>
							<strong><?php echo esc_html( $deal ); ?></strong>
						</div>

						<div class="hosting-bonus-card__rating">
							<span><?php echo esc_html( $score_out_of_100 ); ?>/100</span>
							<?php hosting_landing_render_stars( $score, $score_label ); ?>
						</div>

						<a class="hosting-bonus-card__button" href="<?php echo esc_url( $url ); ?>">
							<?php echo esc_html( $button ); ?>
						</a>

						<?php if ( $legal_text ) : ?>
							<small><?php echo esc_html( $legal_text ); ?></small>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
