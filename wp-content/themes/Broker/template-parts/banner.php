<?php
/**
 * Template part: Section Banner (Landing Page)
 * Dữ liệu lấy từ ACF (xem custom/acf-landing.php).
 * Có sẵn nội dung mặc định để không bị trống nếu chưa cấu hình.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid = get_the_ID();

$badges  = get_field( 'banner_badges', $pid );
$title   = get_field( 'banner_title', $pid );
$desc    = get_field( 'banner_desc', $pid );
$filters = get_field( 'banner_filters', $pid );
$stats   = get_field( 'banner_stats', $pid );
$ctas    = get_field( 'banner_ctas', $pid );

$card_title = get_field( 'card_title', $pid );
$card_intro = get_field( 'card_intro', $pid );
$card_items = get_field( 'card_items', $pid );

$bottom_features = get_field( 'bottom_features', $pid );

/* ---------- Nội dung mặc định (fallback) ---------- */
if ( empty( $badges ) ) {
	$badges = array(
		array( 'text' => 'UPDATED 2026' ),
		array( 'text' => 'Top 25 List' ),
		array( 'text' => 'Verified Discounts' ),
	);
}
if ( ! $title ) {
	$title = 'Top 25 Best Prop Firms & Funded Trading Programs';
}
if ( ! $desc ) {
	$desc = '<p>Looking for the best prop firm for <strong>futures</strong> or <strong>forex</strong>? FundedProgram ranks the top proprietary trading firms by <strong>rules</strong>, <strong>drawdown structure</strong>, <strong>payout potential</strong>, <strong>platform support</strong>, and overall <strong>value</strong>.</p>';
}
if ( empty( $filters ) ) {
	$filters = array(
		array( 'label' => 'Best Evaluation Programs', 'url' => '#' ),
		array( 'label' => 'Best 1-Step Funding', 'url' => '#' ),
		array( 'label' => 'Best Instant / Straight-To-Funded', 'url' => '#' ),
	);
}
if ( empty( $stats ) ) {
	$stats = array(
		array( 'number' => '25', 'label' => 'firms compared' ),
		array( 'number' => '5+', 'label' => 'ranking factors' ),
		array( 'number' => 'Fast', 'label' => 'shortlist format' ),
	);
}
if ( empty( $ctas ) ) {
	$ctas = array(
		array( 'label' => 'Explore the Top 25', 'url' => '#', 'style' => 'primary' ),
		array( 'label' => 'See Prop Firm Discounts', 'url' => '#', 'style' => 'outline' ),
	);
}
if ( ! $card_title ) {
	$card_title = 'How We Rank Prop Firms';
}
if ( ! $card_intro ) {
	$card_intro = 'We prioritize trader clarity. Every pick is reviewed for rule fairness, realistic risk limits, and payout conditions that actually make sense for most traders.';
}
if ( empty( $card_items ) ) {
	$card_items = array(
		array( 'title' => 'Trading Rules', 'desc' => 'Drawdown type, consistency limits, news/scalping flexibility' ),
		array( 'title' => 'Costs & Value', 'desc' => 'Pricing, resets, add-ons, and discount strength' ),
		array( 'title' => 'Payouts', 'desc' => 'Speed, thresholds, profit split, scaling potential' ),
		array( 'title' => 'Platforms', 'desc' => 'Futures-friendly software, data/routing options' ),
		array( 'title' => 'Best-Fit Matching', 'desc' => 'Beginner vs advanced, scalping vs swing, rule tolerance' ),
	);
}
if ( empty( $bottom_features ) ) {
	$bottom_features = array(
		array( 'text' => 'Clear rule summaries (no confusion)' ),
		array( 'text' => 'Updated rankings as firms change' ),
		array( 'text' => 'Quick picks for your trading style' ),
		array( 'text' => 'Discounts that reduce monthly cost' ),
	);
}
?>

<section class="lp-banner section">
	<div class="lp-banner__bg" aria-hidden="true"></div>

	<div class="hotel-container lp-banner__inner">
		<div class="lp-banner__grid">

			<!-- CỘT TRÁI -->
			<div class="lp-banner__main">

				<?php if ( $badges ) : ?>
					<div class="lp-banner__badges">
						<?php foreach ( $badges as $b ) :
							if ( empty( $b['text'] ) ) { continue; } ?>
							<span class="lp-badge"><?php echo esc_html( $b['text'] ); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<h1 class="lp-banner__title"><?php echo esc_html( $title ); ?></h1>

				<div class="lp-banner__desc"><?php echo wp_kses_post( $desc ); ?></div>

				<?php if ( $filters ) : ?>
					<div class="lp-banner__filters">
						<?php foreach ( $filters as $f ) :
							if ( empty( $f['label'] ) ) { continue; }
							$url = ! empty( $f['url'] ) ? $f['url'] : '#'; ?>
							<a class="lp-filter" href="<?php echo esc_url( $url ); ?>">
								<span class="lp-filter__dot" aria-hidden="true"></span>
								<?php echo esc_html( $f['label'] ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $stats ) : ?>
					<div class="lp-banner__stats">
						<?php foreach ( $stats as $s ) : ?>
							<div class="lp-stat">
								<span class="lp-stat__num"><?php echo esc_html( $s['number'] ); ?></span>
								<span class="lp-stat__label"><?php echo esc_html( $s['label'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $ctas ) : ?>
					<div class="lp-banner__ctas">
						<?php foreach ( $ctas as $c ) :
							if ( empty( $c['label'] ) ) { continue; }
							$url   = ! empty( $c['url'] ) ? $c['url'] : '#';
							$style = ! empty( $c['style'] ) ? $c['style'] : 'primary'; ?>
							<a class="lp-btn lp-btn--<?php echo esc_attr( $style ); ?>" href="<?php echo esc_url( $url ); ?>">
								<?php echo esc_html( $c['label'] ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<!-- CỘT PHẢI -->
			<aside class="lp-banner__card">
				<?php if ( $card_title ) : ?>
					<h2 class="lp-card__title"><?php echo esc_html( $card_title ); ?></h2>
				<?php endif; ?>

				<?php if ( $card_intro ) : ?>
					<p class="lp-card__intro"><?php echo esc_html( $card_intro ); ?></p>
				<?php endif; ?>

				<?php if ( $card_items ) : ?>
					<div class="lp-card__list">
						<?php foreach ( $card_items as $item ) :
							if ( empty( $item['title'] ) ) { continue; } ?>
							<div class="lp-card__item">
								<h3 class="lp-card__item-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<?php if ( ! empty( $item['desc'] ) ) : ?>
									<p class="lp-card__item-desc"><?php echo esc_html( $item['desc'] ); ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</aside>

		</div>

		<?php if ( $bottom_features ) : ?>
			<div class="lp-banner__features">
				<?php foreach ( $bottom_features as $feat ) :
					if ( empty( $feat['text'] ) ) { continue; } ?>
					<span class="lp-feature">
						<span class="lp-feature__check" aria-hidden="true">&#10003;</span>
						<?php echo esc_html( $feat['text'] ); ?>
					</span>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
