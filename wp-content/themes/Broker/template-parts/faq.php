<?php
/**
 * Hosting landing FAQ.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid   = get_the_ID();
$title = hosting_landing_get_field( 'hosting_faq_title', $pid, 'Frequently Asked Questions' );
$faqs  = hosting_landing_get_field( 'hosting_faqs', $pid, array() );

if ( empty( $faqs ) ) {
	$faqs = array(
		array(
			'question' => 'What is web hosting and why do we need it?',
			'answer'   => 'Web hosting stores your website files and makes them available online. A reliable host keeps your site fast, secure, and reachable for visitors.',
		),
		array(
			'question' => 'How do we decide which hosting providers to recommend?',
			'answer'   => 'We compare performance, pricing, security tools, support, ease of use, and real plan limitations before ranking each provider.',
		),
		array(
			'question' => 'Are these hosting solutions easy to use for beginners?',
			'answer'   => 'Yes. The list prioritizes providers with guided setup, simple dashboards, one-click WordPress tools, and responsive support.',
		),
		array(
			'question' => 'Is switching to one of your top hosts safe and easy?',
			'answer'   => 'Most recommended providers include migration tools or support-assisted transfer. Always back up your site before starting a move.',
		),
		array(
			'question' => 'How can I be sure I am getting the best performance and value?',
			'answer'   => 'Match your plan to your traffic, storage, and support needs. The best value is usually the plan that stays fast without forcing upgrades too soon.',
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
