<?php
/**
 * Hosting landing hero.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid       = get_the_ID();
$providers = hosting_landing_get_providers( $pid );
$first     = ! empty( $providers[0] ) ? $providers[0] : array();

$updated    = hosting_landing_get_field( 'hosting_hero_updated', $pid, 'Updated: July 2026' );
$title      = hosting_landing_get_field( 'hosting_hero_title', $pid, 'Best Web Hosting Services' );
$intro      = hosting_landing_get_field( 'hosting_hero_intro', $pid, 'If you are looking to run a personal blog, business landing page, or even an online store, a reliable and affordable hosting service is what you need. Check our list of best web hosting solutions to find the one best suited for your needs.' );
$name       = hosting_landing_get_field( 'hosting_top_name', $pid, ! empty( $first['name'] ) ? $first['name'] : 'Hostinger' );
$logo       = hosting_landing_get_field( 'hosting_top_logo', $pid, ! empty( $first['logo'] ) ? $first['logo'] : null );
$color      = hosting_landing_get_field( 'hosting_top_color', $pid, ! empty( $first['accent_color'] ) ? $first['accent_color'] : '#673de6' );
$rank_label = hosting_landing_get_field( 'hosting_top_rank_label', $pid, 'Hosting ranking' );
$rank       = hosting_landing_get_field( 'hosting_top_rank', $pid, '#1' );
$score_lbl  = hosting_landing_get_field( 'hosting_top_score_label', $pid, 'Score' );
$score      = hosting_landing_get_field( 'hosting_top_score', $pid, ! empty( $first['score'] ) ? $first['score'] : '9.9' );
$deal_lbl   = hosting_landing_get_field( 'hosting_top_deal_label', $pid, 'Current deal' );
$deal       = hosting_landing_get_field( 'hosting_top_deal', $pid, '81% OFF' );
$cta_label  = hosting_landing_get_field( 'hosting_top_cta_label', $pid, 'Get Hostinger deal now' );
$cta_url    = hosting_landing_get_field( 'hosting_top_cta_url', $pid, '#' );
?>

<section class="hosting-hero">
	<div class="hosting-hero__panel">
		<div class="hosting-container hosting-hero__inner">
			<?php if ( $updated ) : ?>
				<p class="hosting-hero__updated"><?php echo esc_html( $updated ); ?></p>
			<?php endif; ?>

			<h1 class="hosting-hero__title"><?php echo esc_html( $title ); ?></h1>

			<?php if ( $intro ) : ?>
				<p class="hosting-hero__intro"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>

			<div class="hosting-hero-deal">
				<div class="hosting-hero-deal__brand">
					<?php hosting_landing_brand_logo( $name, $logo, $color, 'hosting-hero-brand' ); ?>
				</div>

				<div class="hosting-hero-deal__metric">
					<span><?php echo esc_html( $rank_label ); ?></span>
					<strong><?php echo esc_html( $rank ); ?></strong>
				</div>

				<div class="hosting-hero-deal__metric">
					<span><?php echo esc_html( $score_lbl ); ?></span>
					<strong><?php echo esc_html( $score ); ?> <em aria-hidden="true">&#9733;</em></strong>
				</div>

				<div class="hosting-hero-deal__metric">
					<span><?php echo esc_html( $deal_lbl ); ?></span>
					<strong><?php echo esc_html( $deal ); ?></strong>
				</div>

				<a class="hosting-button hosting-button--green" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
