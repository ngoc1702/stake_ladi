<?php
/**
 * Template part: Featured offer section below banner.
 * Data comes from ACF fields registered in custom/acf-landing.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid     = get_the_ID();
$enabled = get_field( 'featured_offer_enabled', $pid );

if ( '' === get_post_meta( $pid, 'featured_offer_enabled', true ) ) {
	$enabled = 1;
}

if ( ! $enabled ) {
	return;
}

$eyebrow        = get_field( 'featured_offer_eyebrow', $pid );
$highlight      = get_field( 'featured_offer_highlight', $pid );
$title          = get_field( 'featured_offer_title', $pid );
$desc           = get_field( 'featured_offer_desc', $pid );
$coupon_label   = get_field( 'featured_offer_coupon_label', $pid );
$coupon_badge   = get_field( 'featured_offer_coupon_badge', $pid );
$coupon_code    = get_field( 'featured_offer_coupon_code', $pid );
$coupon_button  = get_field( 'featured_offer_coupon_button', $pid );
$coupon_url     = get_field( 'featured_offer_coupon_url', $pid );
$prices         = get_field( 'featured_offer_prices', $pid );
$visual         = get_field( 'featured_offer_visual', $pid );
$visual_title   = get_field( 'featured_offer_visual_title', $pid );
$visual_sub     = get_field( 'featured_offer_visual_subtitle', $pid );
$rating         = get_field( 'featured_offer_rating', $pid );
$metric         = get_field( 'featured_offer_metric', $pid );
$metric_label   = get_field( 'featured_offer_metric_label', $pid );
$progress_label = get_field( 'featured_offer_progress_label', $pid );
$progress_value = get_field( 'featured_offer_progress_value', $pid );
$stats          = get_field( 'featured_offer_stats', $pid );
$review_button  = get_field( 'featured_offer_review_button', $pid );
$review_url     = get_field( 'featured_offer_review_url', $pid );

if ( ! $eyebrow ) { $eyebrow = '#1 Trader-Rated Prop Firm'; }
if ( ! $highlight ) { $highlight = 'Apex Trader Funding'; }
if ( ! $title ) { $title = 'The Smartest Way To Get Funded In 2026'; }
if ( ! $desc ) {
	$desc = '<p><strong>Apex Trader Funding</strong> is the most trusted futures prop firm on the planet. Unlock up to <strong>$150,000</strong> in buying power, keep <strong>100% of every approved payout</strong> with no profit cut, and join over <strong>$812 Million paid</strong> to real funded traders since 2022.</p>';
}
if ( ! $coupon_label ) { $coupon_label = 'Apex Trader Funding Code'; }
if ( ! $coupon_badge ) { $coupon_badge = 'Up To 90% Off'; }
if ( ! $coupon_code ) { $coupon_code = 'ONKAGNVZ'; }
if ( ! $coupon_button ) { $coupon_button = 'Get Apex Trader Funding Discount'; }
if ( ! $coupon_url ) { $coupon_url = '#'; }
if ( ! $visual_title ) { $visual_title = 'Apex Trader Funding'; }
if ( ! $visual_sub ) { $visual_sub = 'The #1 Futures Prop Firm'; }
if ( ! $rating ) { $rating = '4.3/5 - 20,000+ Trustpilot Reviews'; }
if ( ! $metric ) { $metric = '$812M+'; }
if ( ! $metric_label ) { $metric_label = 'Paid By Apex Trader Funding Since 2022'; }
if ( ! $progress_label ) { $progress_label = 'Avg Monthly Payouts To Traders'; }
if ( ! $progress_value ) { $progress_value = '$14.91M'; }
if ( ! $review_button ) { $review_button = 'Read Full Apex Trader Funding Review'; }
if ( ! $review_url ) { $review_url = '#'; }

if ( empty( $prices ) ) {
	$prices = array(
		array( 'label' => '$50K Account', 'price' => '$24.90', 'old_price' => '$249' ),
		array( 'label' => '$100K Account', 'price' => '$39.90', 'old_price' => '$399' ),
	);
}

if ( empty( $stats ) ) {
	$stats = array(
		array( 'value' => '$150K', 'label' => 'Max Account Size' ),
		array( 'value' => '30 Days', 'label' => 'Eval Window' ),
		array( 'value' => '20', 'label' => 'Max Accounts' ),
		array( 'value' => '1 Day', 'label' => 'Min To Pass' ),
	);
}
?>

<section id="featured-offer" class="lp-featured-offer section">
	<div class="hotel-container lp-featured-offer__inner">
		<div class="lp-featured-offer__main">
			<?php if ( $eyebrow ) : ?>
				<span class="lp-featured-offer__eyebrow">
					<span aria-hidden="true"></span>
					<?php echo esc_html( $eyebrow ); ?>
				</span>
			<?php endif; ?>

			<h2 class="lp-featured-offer__title">
				<?php if ( $highlight ) : ?>
					<span><?php echo esc_html( $highlight ); ?></span>
				<?php endif; ?>
				<?php echo esc_html( $title ); ?>
			</h2>

			<div class="lp-featured-offer__desc">
				<?php echo wp_kses_post( $desc ); ?>
			</div>

			<div class="lp-featured-coupon">
				<div class="lp-featured-coupon__head">
					<span class="lp-featured-coupon__label"><?php echo esc_html( $coupon_label ); ?></span>
					<?php if ( $coupon_badge ) : ?>
						<span class="lp-featured-coupon__badge"><?php echo esc_html( $coupon_badge ); ?></span>
					<?php endif; ?>
				</div>

				<button class="lp-featured-coupon__code" type="button" data-copy-code="<?php echo esc_attr( $coupon_code ); ?>">
					<?php echo esc_html( $coupon_code ); ?>
				</button>

				<?php if ( $prices ) : ?>
					<div class="lp-featured-coupon__prices">
						<?php foreach ( $prices as $price ) :
							$p_label = ! empty( $price['label'] ) ? $price['label'] : '';
							$p_price = ! empty( $price['price'] ) ? $price['price'] : '';
							$p_old   = ! empty( $price['old_price'] ) ? $price['old_price'] : '';

							if ( ! $p_label && ! $p_price ) {
								continue;
							}
							?>
							<div class="lp-featured-coupon__price">
								<?php if ( $p_label ) : ?><span><?php echo esc_html( $p_label ); ?></span><?php endif; ?>
								<?php if ( $p_price ) : ?><strong><?php echo esc_html( $p_price ); ?></strong><?php endif; ?>
								<?php if ( $p_old ) : ?><del><?php echo esc_html( $p_old ); ?></del><?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<a class="lp-featured-coupon__button" href="<?php echo esc_url( $coupon_url ); ?>">
					<i class="fas fa-bolt"></i>
					<?php echo esc_html( $coupon_button ); ?>
					<i class="fas fa-arrow-right"></i>
				</a>
			</div>
		</div>

		<aside class="lp-featured-proof">
			<div class="lp-featured-proof__card">
				<div class="lp-featured-proof__pills">
					<span>Apex Live Payouts</span>
					<span>100k+ Traders</span>
				</div>

				<div class="lp-featured-proof__brand">
					<?php if ( is_array( $visual ) && ! empty( $visual['url'] ) ) : ?>
						<img src="<?php echo esc_url( $visual['url'] ); ?>" alt="<?php echo esc_attr( $visual_title ); ?>" loading="lazy">
					<?php else : ?>
						<span class="lp-featured-proof__mark" aria-hidden="true">
							<span></span>
							<span></span>
						</span>
						<strong><?php echo esc_html( $visual_title ); ?></strong>
					<?php endif; ?>
					<em><?php echo esc_html( $visual_sub ); ?></em>
					<span class="lp-featured-proof__stars" aria-hidden="true">
						<span></span><span></span><span></span><span></span><span></span>
					</span>
					<small><?php echo esc_html( $rating ); ?></small>
				</div>

				<div class="lp-featured-proof__metric">
					<strong><?php echo esc_html( $metric ); ?></strong>
					<span><?php echo esc_html( $metric_label ); ?></span>
				</div>

				<div class="lp-featured-proof__progress" aria-hidden="true">
					<span></span>
				</div>
				<div class="lp-featured-proof__progress-text">
					<span><?php echo esc_html( $progress_label ); ?></span>
					<strong><?php echo esc_html( $progress_value ); ?></strong>
				</div>

				<?php if ( $stats ) : ?>
					<div class="lp-featured-proof__stats">
						<?php foreach ( $stats as $stat ) :
							if ( empty( $stat['value'] ) ) { continue; }
							?>
							<div>
								<strong><?php echo esc_html( $stat['value'] ); ?></strong>
								<?php if ( ! empty( $stat['label'] ) ) : ?>
									<span><?php echo esc_html( $stat['label'] ); ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<a class="lp-featured-proof__button" href="<?php echo esc_url( $review_url ); ?>">
				<?php echo esc_html( $review_button ); ?>
				<i class="fas fa-arrow-right"></i>
			</a>
		</aside>
	</div>
</section>
