<?php
/**
 * Template part: Section Bảng xếp hạng Top Prop Firms (Landing Page)
 * Dữ liệu lấy từ ACF (xem custom/acf-landing.php).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid = get_the_ID();

$firms_title = get_field( 'firms_title', $pid );
$firms       = get_field( 'firms_list', $pid );

if ( ! $firms_title ) {
	$firms_title = 'Top 25 Prop Trading Firms & Funding Programs';
}

/* ---------- Nội dung mặc định (fallback) ---------- */
if ( empty( $firms ) ) {
	$firms = array(
		array( 'highlight_badge' => '#1', 'name' => 'Apex Trader Funding', 'type' => 'Futures', 'score' => '9.7 / 10', 'grade' => 'A+', 'profit_split' => '100%', 'max_capital' => '$150k' ),
		array( 'highlight_badge' => '#2', 'name' => 'PropShopTrader', 'type' => 'Futures', 'score' => '9.5 / 10', 'grade' => 'A+', 'profit_split' => '80%', 'max_capital' => '$100k' ),
		array( 'highlight_badge' => '#3', 'name' => 'Lucid Trading', 'type' => 'Futures', 'score' => '9.2 / 10', 'grade' => 'A', 'profit_split' => '80%', 'max_capital' => '$100k' ),
		array( 'highlight_badge' => '', 'name' => 'Top One Futures', 'type' => 'Futures', 'score' => '9.1 / 10', 'grade' => 'A', 'profit_split' => '85%', 'max_capital' => '$100k' ),
		array( 'highlight_badge' => '', 'name' => 'Tradeify', 'type' => 'Futures', 'score' => '9.3 / 10', 'grade' => 'A', 'profit_split' => '80%', 'max_capital' => '$150k' ),
		array( 'highlight_badge' => '', 'name' => 'Alpha Futures', 'type' => 'Futures', 'score' => '8.8 / 10', 'grade' => 'A-', 'profit_split' => '80%', 'max_capital' => '$120k' ),
		array( 'highlight_badge' => '', 'name' => 'Take Profit Trader', 'type' => 'Futures', 'score' => '9.0 / 10', 'grade' => 'A', 'profit_split' => '85%', 'max_capital' => '$100k' ),
		array( 'highlight_badge' => '', 'name' => 'Bulenox', 'type' => 'Futures', 'score' => '8.6 / 10', 'grade' => 'B+', 'profit_split' => '75%', 'max_capital' => '$100k' ),
	);
}

/**
 * Map ký tự hạng -> class màu.
 */
if ( ! function_exists( 'lp_grade_class' ) ) {
	function lp_grade_class( $grade ) {
		$g = strtoupper( trim( (string) $grade ) );
		if ( strpos( $g, 'A' ) === 0 ) { return 'is-a'; }
		if ( strpos( $g, 'B' ) === 0 ) { return 'is-b'; }
		if ( strpos( $g, 'C' ) === 0 ) { return 'is-c'; }
		return 'is-d';
	}
}
?>

<section class="lp-firms section">
	<div class="hotel-container">

		<h2 class="lp-firms__title"><?php echo esc_html( $firms_title ); ?></h2>

		<div class="lp-firms__scroll">
			<table class="lp-firms__table">
				<thead>
					<tr>
						<th class="lp-col-rank">#</th>
						<th class="lp-col-firm">Prop Firm</th>
						<th>Type</th>
						<th>Score</th>
						<th>Grade</th>
						<th>Profit Split</th>
						<th>Max Capital</th>
						<th class="lp-col-actions">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $firms as $i => $firm ) :
						$rank      = $i + 1;
						$logo      = isset( $firm['logo'] ) ? $firm['logo'] : '';
						$badge     = ! empty( $firm['highlight_badge'] ) ? $firm['highlight_badge'] : '';
						$review    = ! empty( $firm['review_url'] ) ? $firm['review_url'] : '#';
						$challenge = ! empty( $firm['challenge_url'] ) ? $firm['challenge_url'] : '#';
						?>
						<tr>
							<td class="lp-col-rank" data-label="#"><?php echo esc_html( $rank ); ?></td>

							<td class="lp-col-firm" data-label="Prop Firm">
								<div class="lp-firm">
									<span class="lp-firm__logo">
										<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
											<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $firm['name'] ); ?>" loading="lazy">
										<?php else : ?>
											<span class="lp-firm__logo-fallback"><?php echo esc_html( strtoupper( substr( $firm['name'], 0, 1 ) ) ); ?></span>
										<?php endif; ?>
									</span>
									<?php if ( $badge ) : ?>
										<span class="lp-firm__badge">🔥 <?php echo esc_html( $badge ); ?></span>
									<?php endif; ?>
									<span class="lp-firm__name"><?php echo esc_html( $firm['name'] ); ?></span>
								</div>
							</td>

							<td data-label="Type"><?php echo esc_html( $firm['type'] ); ?></td>
							<td data-label="Score"><span class="lp-score"><?php echo esc_html( $firm['score'] ); ?></span></td>
							<td data-label="Grade">
								<span class="lp-grade <?php echo esc_attr( lp_grade_class( $firm['grade'] ) ); ?>"><?php echo esc_html( $firm['grade'] ); ?></span>
							</td>
							<td data-label="Profit Split"><?php echo esc_html( $firm['profit_split'] ); ?></td>
							<td data-label="Max Capital"><?php echo esc_html( $firm['max_capital'] ); ?></td>

							<td class="lp-col-actions" data-label="Actions">
								<div class="lp-firm__actions">
									<a class="lp-btn-sm lp-btn-sm--ghost" href="<?php echo esc_url( $review ); ?>">Read Review</a>
									<a class="lp-btn-sm lp-btn-sm--solid" href="<?php echo esc_url( $challenge ); ?>">Start Challenge</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
