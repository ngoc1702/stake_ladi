<?php
/**
 * Template part: Section Discounts (Landing Page)
 * Data comes from ACF fields registered in custom/acf-landing.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid = get_the_ID();

$discounts_title = get_field( 'discounts_title', $pid );
$discounts       = get_field( 'discounts_list', $pid );

if ( ! $discounts_title ) {
	$discounts_title = 'Best Prop Firm Discounts';
}

if ( empty( $discounts ) ) {
	$discounts = array(
		array( 'name' => 'Apex Trader Funding', 'amount' => '90%', 'code' => 'ONKAGNV2', 'button_label' => 'Get Discount', 'url' => '#' ),
		array( 'name' => 'PropShopTrader', 'amount' => '90%', 'code' => 'FUNDEDPROGRAM', 'button_label' => 'Get Discount', 'url' => '#' ),
		array( 'name' => 'Lucid Trading', 'amount' => '40%', 'code' => 'IPOM3SGL07', 'button_label' => 'Get Discount', 'url' => '#' ),
		array( 'name' => 'Top One Futures', 'amount' => '50%', 'code' => 'PAYOUT', 'button_label' => 'Get Discount', 'url' => '#' ),
		array( 'name' => 'Bulenox', 'amount' => '35%', 'code' => 'TRADEREVIEWS', 'button_label' => 'Get Discount', 'url' => '#' ),
		array( 'name' => 'Take Profit Trader', 'amount' => '40%', 'code' => 'FUNDEDPROGRAM', 'button_label' => 'Get Discount', 'url' => '#' ),
	);
}
?>

<section id="discounts" class="lp-discounts section">
	<div class="hotel-container">
		<h2 class="lp-discounts__title"><?php echo esc_html( $discounts_title ); ?></h2>

		<div class="lp-discounts__viewport" tabindex="0" aria-label="<?php echo esc_attr( $discounts_title ); ?>">
			<div class="lp-discounts__track">
				<?php foreach ( $discounts as $discount ) :
					$name         = ! empty( $discount['name'] ) ? $discount['name'] : 'Prop Firm';
					$amount       = ! empty( $discount['amount'] ) ? $discount['amount'] : 'Save';
					$code         = ! empty( $discount['code'] ) ? $discount['code'] : 'FUNDEDPROGRAM';
					$logo         = ! empty( $discount['logo'] ) ? $discount['logo'] : '';
					$image        = ! empty( $discount['image'] ) ? $discount['image'] : '';
					$button_label = ! empty( $discount['button_label'] ) ? $discount['button_label'] : 'Get Discount';
					$url          = ! empty( $discount['url'] ) ? $discount['url'] : '#';
					$initials     = '';

					foreach ( preg_split( '/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY ) as $word ) {
						$initials .= strtoupper( substr( $word, 0, 1 ) );
						if ( strlen( $initials ) >= 3 ) {
							break;
						}
					}

					if ( ! $initials ) {
						$initials = strtoupper( substr( $name, 0, 2 ) );
					}
					?>
					<article class="lp-discount-card">
						<div class="lp-discount-card__logo">
							<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
								<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
							<?php else : ?>
								<span class="lp-discount-card__logo-fallback"><?php echo esc_html( $initials ); ?></span>
							<?php endif; ?>
						</div>

						<h3 class="lp-discount-card__name"><?php echo esc_html( $name ); ?></h3>

						<div class="lp-discount-card__media">
							<?php if ( is_array( $image ) && ! empty( $image['url'] ) ) : ?>
								<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $name . ' discount' ); ?>" loading="lazy">
							<?php else : ?>
								<div class="lp-discount-card__coupon" aria-label="<?php echo esc_attr( $name . ' ' . $amount . ' off' ); ?>">
									<span class="lp-discount-card__mini-name"><?php echo esc_html( $name ); ?></span>
									<strong><span><?php echo esc_html( $amount ); ?></span> OFF</strong>
									<span class="lp-discount-card__coupon-label">Coupon Code</span>
									<span class="lp-discount-card__code"><?php echo esc_html( $code ); ?></span>
									<span class="lp-discount-card__qr" aria-hidden="true"></span>
								</div>
							<?php endif; ?>
						</div>

						<a class="lp-discount-card__button" href="<?php echo esc_url( $url ); ?>">
							<?php echo esc_html( $button_label ); ?>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
