<?php
/**
 * Hosting landing editor picks.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid       = get_the_ID();
$title     = hosting_landing_get_field( 'hosting_editor_title', $pid, "Editors' Picks" );
$providers = hosting_landing_get_providers( $pid );
$cards     = hosting_landing_get_field( 'hosting_editor_picks', $pid, array() );

if ( empty( $cards ) ) {
	$cards = array_slice( $providers, 0, 3 );
}
?>

<section class="hosting-editors">
	<div class="hosting-container">
		<h2><?php echo esc_html( $title ); ?></h2>

		<div class="hosting-editor-grid">
			<?php foreach ( $cards as $index => $card ) :
				$name        = ! empty( $card['name'] ) ? $card['name'] : 'Hosting Provider';
				$logo        = ! empty( $card['logo'] ) ? $card['logo'] : null;
				$color       = ! empty( $card['accent_color'] ) ? $card['accent_color'] : '#673de6';
				$deal        = ! empty( $card['deal_note'] ) ? $card['deal_note'] : '';
				$score       = ! empty( $card['score'] ) ? $card['score'] : '9.0';
				$score_label = ! empty( $card['score_label'] ) ? $card['score_label'] : 'Good';
				$desc        = ! empty( $card['description'] ) ? $card['description'] : '';
				$button      = ! empty( $card['button_label'] ) ? $card['button_label'] : 'Visit Site';
				$url         = ! empty( $card['button_url'] ) ? $card['button_url'] : '#';
				$specs       = array(
					'Money-back guarantee' => ! empty( $card['money_back'] ) ? $card['money_back'] : '30-days',
					'Storage space (from)' => ! empty( $card['storage'] ) ? $card['storage'] : '10GB SSD',
					'24/7 live support'    => ! empty( $card['support'] ) ? $card['support'] : 'Yes',
					'Free SSL certificate' => ! empty( $card['ssl'] ) ? $card['ssl'] : 'Yes',
				);
				?>
				<article class="hosting-editor-card">
					<div class="hosting-editor-card__top">
						<span class="hosting-editor-card__rank"><?php echo esc_html( $index + 1 ); ?></span>
						<?php if ( $deal ) : ?>
							<span class="hosting-editor-card__deal"><?php echo esc_html( $deal ); ?></span>
						<?php endif; ?>
					</div>

					<div class="hosting-editor-card__brand-row">
						<?php hosting_landing_brand_logo( $name, $logo, $color, 'hosting-editor-logo' ); ?>
						<div class="hosting-editor-card__score">
							<strong><?php echo esc_html( $score ); ?></strong>
							<span class="hosting-stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
							<small><?php echo esc_html( $score_label ); ?></small>
						</div>
					</div>

					<?php if ( $desc ) : ?>
						<p class="hosting-editor-card__desc"><?php echo esc_html( $desc ); ?></p>
					<?php endif; ?>

					<dl class="hosting-editor-card__specs">
						<?php foreach ( $specs as $label => $value ) : ?>
							<div>
								<dt><?php echo esc_html( $label ); ?></dt>
								<dd><?php echo esc_html( $value ); ?></dd>
							</div>
						<?php endforeach; ?>
					</dl>

					<a class="hosting-button hosting-button--outline hosting-editor-card__button" href="<?php echo esc_url( $url ); ?>">
						<?php echo esc_html( $button ); ?> <span aria-hidden="true">&rarr;</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
