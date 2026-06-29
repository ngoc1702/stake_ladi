<?php
/**
 * Template part: Review articles section (Landing Page).
 * Data comes from ACF fields registered in custom/acf-landing.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid = get_the_ID();

$reviews_title = get_field( 'reviews_title', $pid );
$reviews_intro = get_field( 'reviews_intro', $pid );
$reviews       = get_field( 'reviews_list', $pid );

if ( ! $reviews_title ) {
	$reviews_title = 'Prop Firm Reviews';
}

if ( empty( $reviews ) ) {
	$reviews = array(
		array(
			'title'            => 'Apex Trader Funding',
			'badge'            => "Editor's Pick - June 2026",
			'headline'         => 'Apex Trader Funding 90% Discount',
			'coupon'           => 'ONKAGNVZ',
			'intro_content'    => '<p><strong>Apex Trader Funding</strong> is a futures-only prop trading evaluation firm founded by Darrell Martin in 2021 and headquartered in Austin, Texas. The community has grown to more than 100,000 funded traders worldwide.</p><p>Apex 4.0 lets traders use major US futures contracts with a one-time evaluation fee, no daily drawdown, and a trailing threshold that tracks the peak balance in real time.</p>',
			'read_more_label'  => 'Read More',
			'read_more_url'    => '#',
			'blocks'           => array(
				array(
					'icon'    => 'fas fa-window-restore',
					'title'   => 'Trading Platforms',
					'content' => '<p>Apex Trader Funding supports Rithmic, Tradovate, TradingView charting, and WealthCharts. Traders select their preferred platform when purchasing the evaluation.</p>',
				),
				array(
					'icon'    => 'fas fa-shield-halved',
					'title'   => 'Credibility Check',
					'content' => '<p>The company discloses contact details, support channels, payout information, and public review signals so traders can compare risk before starting.</p>',
				),
				array(
					'icon'    => 'fas fa-dollar-sign',
					'title'   => 'Costs',
					'content' => '<p>Apex 4.0 uses one-time evaluation fees with no monthly billing. Active discounts can reduce entry prices dramatically.</p>',
					'prices'  => array(
						array( 'label' => '$25K Account', 'old_price' => '$199', 'price' => '$19.90' ),
						array( 'label' => '$50K Account', 'old_price' => '$249', 'price' => '$24.90' ),
						array( 'label' => '$100K Account', 'old_price' => '$399', 'price' => '$39.90' ),
						array( 'label' => '$150K Account', 'old_price' => '$599', 'price' => '$59.90' ),
					),
				),
				array(
					'icon'    => 'fas fa-credit-card',
					'title'   => 'Payments',
					'content' => '<p>Payments are made by credit card at checkout. Payout rules, drawdown requirements, and profit split terms should be reviewed before purchasing.</p>',
				),
			),
		),
	);
}
?>

<section id="reviews" class="lp-reviews section">
	<div class="hotel-container">
		<div class="lp-reviews__head">
			<h2 class="lp-reviews__title"><?php echo esc_html( $reviews_title ); ?></h2>
			<?php if ( $reviews_intro ) : ?>
				<p class="lp-reviews__intro"><?php echo esc_html( $reviews_intro ); ?></p>
			<?php endif; ?>
		</div>

		<div class="lp-reviews__list">
			<?php foreach ( $reviews as $index => $review ) :
				$title           = ! empty( $review['title'] ) ? $review['title'] : 'Prop Firm Review';
				$image           = ! empty( $review['image'] ) ? $review['image'] : '';
				$badge           = ! empty( $review['badge'] ) ? $review['badge'] : '';
				$headline        = ! empty( $review['headline'] ) ? $review['headline'] : $title;
				$coupon          = ! empty( $review['coupon'] ) ? $review['coupon'] : '';
				$intro_content   = ! empty( $review['intro_content'] ) ? $review['intro_content'] : '';
				$blocks          = ! empty( $review['blocks'] ) ? $review['blocks'] : array();
				$read_more_label = ! empty( $review['read_more_label'] ) ? $review['read_more_label'] : 'Read More';
				$read_more_url   = ! empty( $review['read_more_url'] ) ? $review['read_more_url'] : '';
				?>
				<article class="lp-review">
					<h3 class="lp-review__heading">
						<span><?php echo esc_html( $index + 1 ); ?>.</span>
						<?php echo esc_html( $title ); ?>
					</h3>

					<figure class="lp-review__image">
						<?php if ( is_array( $image ) && ! empty( $image['url'] ) ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" loading="lazy">
						<?php else : ?>
							<div class="lp-review__image-fallback">
								<span><?php echo esc_html( $title ); ?></span>
								<strong>Review Snapshot</strong>
							</div>
						<?php endif; ?>
					</figure>

					<div class="lp-review__summary">
						<?php if ( $badge ) : ?>
							<span class="lp-review__badge"><?php echo esc_html( $badge ); ?></span>
						<?php endif; ?>

						<h4 class="lp-review__summary-title">
							<?php echo esc_html( $headline ); ?>
							<?php if ( $coupon ) : ?>
								<span><?php echo esc_html( $coupon ); ?></span>
							<?php endif; ?>
						</h4>

						<?php if ( $intro_content ) : ?>
							<div class="lp-review__content">
								<?php echo wp_kses_post( $intro_content ); ?>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( $blocks ) : ?>
						<div class="lp-review__blocks">
							<?php foreach ( $blocks as $block ) :
								$icon    = ! empty( $block['icon'] ) ? $block['icon'] : 'fas fa-check';
								$b_title = ! empty( $block['title'] ) ? $block['title'] : '';
								$content = ! empty( $block['content'] ) ? $block['content'] : '';
								$prices  = ! empty( $block['prices'] ) ? $block['prices'] : array();

								if ( ! $b_title && ! $content && empty( $prices ) ) {
									continue;
								}
								?>
								<section class="lp-review-block">
									<?php if ( $b_title ) : ?>
										<h4 class="lp-review-block__title">
											<i class="<?php echo esc_attr( $icon ); ?>"></i>
											<?php echo esc_html( $b_title ); ?>
										</h4>
									<?php endif; ?>

									<?php if ( $content ) : ?>
										<div class="lp-review__content">
											<?php echo wp_kses_post( $content ); ?>
										</div>
									<?php endif; ?>

									<?php if ( $prices ) : ?>
										<div class="lp-review-prices">
											<?php foreach ( $prices as $price ) :
												$p_label = ! empty( $price['label'] ) ? $price['label'] : '';
												$p_old   = ! empty( $price['old_price'] ) ? $price['old_price'] : '';
												$p_new   = ! empty( $price['price'] ) ? $price['price'] : '';

												if ( ! $p_label && ! $p_new ) {
													continue;
												}
												?>
												<div class="lp-review-price">
													<?php if ( $p_label ) : ?><span><?php echo esc_html( $p_label ); ?></span><?php endif; ?>
													<?php if ( $p_old ) : ?><del><?php echo esc_html( $p_old ); ?></del><?php endif; ?>
													<?php if ( $p_new ) : ?><strong><?php echo esc_html( $p_new ); ?></strong><?php endif; ?>
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</section>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $read_more_url ) : ?>
						<div class="lp-review__more">
							<a class="lp-review__button" href="<?php echo esc_url( $read_more_url ); ?>">
								<?php echo esc_html( $read_more_label ); ?>
							</a>
						</div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
