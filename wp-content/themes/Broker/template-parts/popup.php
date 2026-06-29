<?php
/**
 * Template part: Landing discount popup.
 * Data comes from ACF fields registered in custom/acf-landing.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid     = get_the_ID();
$enabled = get_field( 'popup_enabled', $pid );

if ( '' === get_post_meta( $pid, 'popup_enabled', true ) ) {
	$enabled = 1;
}

if ( ! $enabled ) {
	return;
}

$logo            = get_field( 'popup_logo', $pid );
$brand_text      = get_field( 'popup_brand_text', $pid );
$eyebrow         = get_field( 'popup_eyebrow', $pid );
$title           = get_field( 'popup_title', $pid );
$discount_number = get_field( 'popup_discount_number', $pid );
$discount_suffix = get_field( 'popup_discount_suffix', $pid );
$subtitle        = get_field( 'popup_subtitle', $pid );
$code_label      = get_field( 'popup_code_label', $pid );
$code            = get_field( 'popup_code', $pid );
$code_hint       = get_field( 'popup_code_hint', $pid );
$plans           = get_field( 'popup_plans', $pid );
$features        = get_field( 'popup_features', $pid );
$cta_label       = get_field( 'popup_cta_label', $pid );
$cta_note        = get_field( 'popup_cta_note', $pid );
$cta_url         = get_field( 'popup_cta_url', $pid );
$trust_text      = get_field( 'popup_trust_text', $pid );

if ( ! $brand_text ) { $brand_text = 'APEX TRADER FUNDING'; }
if ( ! $eyebrow ) { $eyebrow = 'Exclusive Limited Offer'; }
if ( ! $title ) { $title = 'Apex Trader Funding Discount'; }
if ( ! $discount_number ) { $discount_number = '90'; }
if ( ! $discount_suffix ) { $discount_suffix = '% OFF'; }
if ( ! $subtitle ) { $subtitle = 'Get funded for under $20, the #1 rated futures prop firm in 2026'; }
if ( ! $code_label ) { $code_label = 'Your exclusive discount code'; }
if ( ! $code ) { $code = 'ONKAGNVZ'; }
if ( ! $code_hint ) { $code_hint = 'Copy the code and apply it at checkout'; }
if ( ! $cta_label ) { $cta_label = 'Claim 90% Off, Get Funded Now'; }
if ( ! $cta_note ) { $cta_note = 'Apply the code at checkout - apextraderfunding.com'; }
if ( ! $cta_url ) { $cta_url = '#'; }
if ( ! $trust_text ) { $trust_text = '4.3/5 - 20,000+ Trustpilot reviews - 100k+ funded traders worldwide'; }

if ( empty( $plans ) ) {
	$plans = array(
		array( 'label' => '$25K Account', 'price' => '$19.90', 'old_price' => '$199' ),
		array( 'label' => '$50K Account', 'price' => '$24.90', 'old_price' => '$249' ),
		array( 'label' => '$100K Account', 'price' => '$39.90', 'old_price' => '$399' ),
	);
}

if ( empty( $features ) ) {
	$features = array(
		array( 'text' => 'Pass in 1 Day' ),
		array( 'text' => '100% Split' ),
		array( 'text' => '$812M+ Paid Out' ),
		array( 'text' => 'Metals Are Back' ),
	);
}
?>

<div class="lp-popup" data-lp-popup aria-hidden="true">
	<div class="lp-popup__overlay" data-lp-popup-close></div>

	<section class="lp-popup__dialog" role="dialog" aria-modal="true" aria-labelledby="lp-popup-title">
		<button class="lp-popup__close" type="button" data-lp-popup-close aria-label="Close popup">&times;</button>

		<div class="lp-popup__brand">
			<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $brand_text ); ?>">
			<?php else : ?>
				<span class="lp-popup__brand-mark" aria-hidden="true">
					<span></span>
					<span></span>
				</span>
				<span class="lp-popup__brand-text"><?php echo esc_html( $brand_text ); ?></span>
			<?php endif; ?>
		</div>

		<div class="lp-popup__body">
			<span class="lp-popup__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<h2 id="lp-popup-title" class="lp-popup__title"><?php echo esc_html( $title ); ?></h2>

			<div class="lp-popup__discount" aria-label="<?php echo esc_attr( $discount_number . $discount_suffix ); ?>">
				<span><?php echo esc_html( $discount_number ); ?></span>
				<strong><?php echo esc_html( $discount_suffix ); ?></strong>
			</div>

			<p class="lp-popup__subtitle"><?php echo esc_html( $subtitle ); ?></p>

			<div class="lp-popup__code-wrap">
				<span class="lp-popup__code-label"><?php echo esc_html( $code_label ); ?></span>
				<button class="lp-popup__code" type="button" data-copy-code="<?php echo esc_attr( $code ); ?>">
					<?php echo esc_html( $code ); ?>
				</button>
				<span class="lp-popup__code-hint"><?php echo esc_html( $code_hint ); ?></span>
			</div>

			<div class="lp-popup__plans">
				<?php foreach ( $plans as $plan ) :
					$plan_label = ! empty( $plan['label'] ) ? $plan['label'] : '';
					$price      = ! empty( $plan['price'] ) ? $plan['price'] : '';
					$old_price  = ! empty( $plan['old_price'] ) ? $plan['old_price'] : '';
					if ( ! $plan_label && ! $price ) { continue; }
					?>
					<div class="lp-popup__plan">
						<?php if ( $plan_label ) : ?><span><?php echo esc_html( $plan_label ); ?></span><?php endif; ?>
						<?php if ( $price ) : ?><strong><?php echo esc_html( $price ); ?></strong><?php endif; ?>
						<?php if ( $old_price ) : ?><del><?php echo esc_html( $old_price ); ?></del><?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="lp-popup__features">
				<?php foreach ( $features as $feature ) :
					if ( empty( $feature['text'] ) ) { continue; }
					?>
					<span><i class="fas fa-check"></i><?php echo esc_html( $feature['text'] ); ?></span>
				<?php endforeach; ?>
			</div>

			<a class="lp-popup__cta" href="<?php echo esc_url( $cta_url ); ?>">
				<strong><?php echo esc_html( $cta_label ); ?></strong>
				<span><?php echo esc_html( $cta_note ); ?></span>
			</a>

			<p class="lp-popup__trust"><?php echo esc_html( $trust_text ); ?></p>
		</div>
	</section>
</div>
