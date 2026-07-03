<?php
/**
 * Hosting provider ranking cards.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pid        = get_the_ID();
$providers  = hosting_landing_get_providers( $pid );
$promo_text = hosting_landing_get_field( 'hosting_promo_text', $pid, 'Fresh casino bonuses, esports odds, and live betting picks updated for July 2026' );
$promo_url  = hosting_landing_get_field( 'hosting_promo_url', $pid, '#' );
?>

<section id="hosting-ranking" class="hosting-ranking">
	<div class="hosting-container">
		<?php if ( $promo_text ) : ?>
			<a class="hosting-button hosting-button--dark" href="<?php echo esc_url( $promo_url ? $promo_url : '#' ); ?>">
				<span aria-hidden="true"><i class="fa-solid fa-fire"></i></span>
				<?php echo esc_html( $promo_text ); ?>
				<i aria-hidden="true">&rsaquo;</i>
			</a>
		<?php endif; ?>

		<div class="hosting-provider-list">
			<?php foreach ( $providers as $index => $provider ) :
				$rank        = $index + 1;
				$name        = ! empty( $provider['name'] ) ? $provider['name'] : 'Casino Brand';
				$logo        = ! empty( $provider['logo'] ) ? $provider['logo'] : null;
				$logo_svg    = ! empty( $provider['logo_svg'] ) ? $provider['logo_svg'] : '';
				$color       = ! empty( $provider['accent_color'] ) ? $provider['accent_color'] : '#673de6';
				$description = ! empty( $provider['description'] ) ? $provider['description'] : '';
				$pros        = ! empty( $provider['pros'] ) ? $provider['pros'] : array();
				$cons        = ! empty( $provider['cons'] ) ? $provider['cons'] : array();
				$score       = ! empty( $provider['score'] ) ? $provider['score'] : '9.0';
				$score_label = ! empty( $provider['score_label'] ) ? $provider['score_label'] : 'Good';
				$button      = 'Visit site';
				$url         = ! empty( $provider['button_url'] ) ? $provider['button_url'] : '#';
				$is_featured = 1 === $rank;
				?>
				<article class="hosting-provider-card <?php echo $is_featured ? 'is-featured' : ''; ?>">
					<span class="hosting-provider-card__rank"><?php echo esc_html( $rank ); ?></span>

					<div class="hosting-provider-card__main">
						<div class="hosting-provider-card__logo">
							<?php hosting_landing_brand_logo( $name, $logo, $color, 'hosting-provider-logo', $logo_svg ); ?>
						</div>

						<div class="hosting-provider-card__content">
							<?php if ( $is_featured && ! empty( $provider['featured_badge'] ) ) : ?>
								<span class="hosting-provider-card__badge"><?php echo esc_html( $provider['featured_badge'] ); ?></span>
							<?php endif; ?>

							<?php if ( $description ) : ?>
								<p class="hosting-provider-card__description">
									<strong><?php echo esc_html( $name ); ?></strong>
									<?php echo esc_html( preg_replace( '/^' . preg_quote( $name, '/' ) . '\s*/i', '', $description ) ); ?>
								</p>
							<?php endif; ?>

							<?php if ( $pros || $cons ) : ?>
								<ul class="hosting-feature-list">
									<?php foreach ( $pros as $item ) :
										if ( empty( $item['text'] ) ) { continue; }
										?>
										<li class="is-positive"><?php echo esc_html( $item['text'] ); ?></li>
									<?php endforeach; ?>

									<?php foreach ( $cons as $item ) :
										if ( empty( $item['text'] ) ) { continue; }
										?>
										<li class="is-muted"><?php echo esc_html( $item['text'] ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>

						<aside class="hosting-score-box">
							<strong><?php echo esc_html( $score ); ?></strong>
							<?php hosting_landing_render_stars( $score, $score_label ); ?>
							<small><?php echo esc_html( $score_label ); ?></small>
							<a class="hosting-button <?php echo $is_featured ? 'hosting-button--dark' : 'hosting-button--outline'; ?>" href="<?php echo esc_url( $url ); ?>">
								<?php echo esc_html( $button ); ?> <i aria-hidden="true">›</i>
							</a>
						</aside>
					</div>

					<?php if ( $is_featured && ! empty( $provider['quote_text'] ) ) : ?>
						<footer class="hosting-provider-quote">
							<span class="hosting-provider-quote__avatar" aria-hidden="true">CR</span>
							<p>
								<em>"<?php echo esc_html( $provider['quote_text'] ); ?>"</em>
								<?php if ( ! empty( $provider['quote_author'] ) ) : ?>
									<strong><?php echo esc_html( $provider['quote_author'] ); ?></strong>
								<?php endif; ?>
								<?php if ( ! empty( $provider['quote_role'] ) ) : ?>
									<span><?php echo esc_html( $provider['quote_role'] ); ?></span>
								<?php endif; ?>
							</p>
						</footer>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
