<?php
/**
 * Hosting landing FAQ.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid   = get_the_ID();
$title = hosting_landing_get_field( 'hosting_faq_title', $pid, 'Casino Review FAQ' );
$faqs  = hosting_landing_get_field( 'hosting_faqs', $pid, array() );

if ( empty( $faqs ) ) {
	$faqs = array(
		array(
			'question' => 'How do we rank casino and sportsbook brands?',
			'answer'   => 'We compare bonus value, game variety, esports markets, live betting, payment options, support quality, and how clearly each offer explains its terms.',
		),
		array(
			'question' => 'Are these casino bonuses available to every player?',
			'answer'   => 'Bonus availability can vary by country, account status, and promotion period. Always check the operator terms before claiming an offer.',
		),
		array(
			'question' => 'Which brands are best for esports and live betting?',
			'answer'   => 'Duelbits, Rollbit, BC.Game, Shuffle, and METAWIN stand out for esports coverage, live betting markets, tournaments, or sports-focused promotions.',
		),
		array(
			'question' => 'Do these casinos support crypto payments?',
			'answer'   => 'Several listed brands are crypto-friendly, but supported coins and payment rules change by region. Review the cashier page before depositing.',
		),
		array(
			'question' => 'What should players check before joining?',
			'answer'   => 'Confirm age and location eligibility, wagering requirements, withdrawal limits, payment fees, and responsible gambling tools before you play.',
		),
	);
}
?>

<section class="hosting-faq">
	<div class="hosting-container">
		<div class="hosting-faq__panel">
			<h2><?php echo esc_html( $title ); ?></h2>

			<div class="hosting-faq__list">
				<?php foreach ( $faqs as $index => $faq ) :
					if ( empty( $faq['question'] ) ) {
						continue;
					}
					?>
					<details class="hosting-faq-item" <?php echo 0 === $index ? 'open' : ''; ?>>
						<summary><?php echo esc_html( $faq['question'] ); ?></summary>
						<?php if ( ! empty( $faq['answer'] ) ) : ?>
							<p><?php echo esc_html( $faq['answer'] ); ?></p>
						<?php endif; ?>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
