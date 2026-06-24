<?php
/**
 * Template part: Footer của Landing Page
 * Dữ liệu lấy từ ACF Options Page (xem custom/acf-landing.php).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ft_logo   = get_field( 'ft_logo', 'option' );
$logo      = get_field( 'hf_logo', 'option' );
$logo_text = get_field( 'hf_logo_text', 'option' );

$about     = get_field( 'ft_about', 'option' );
$address   = get_field( 'ft_address', 'option' );
$phone     = get_field( 'ft_phone', 'option' );
$email     = get_field( 'ft_email', 'option' );
$links     = get_field( 'ft_links', 'option' );
$socials   = get_field( 'ft_socials', 'option' );
$copyright = get_field( 'ft_copyright', 'option' );

if ( ! $logo_text ) { $logo_text = 'FundedProgram'; }
if ( ! $about ) { $about = 'We rank proprietary trading firms by rules, drawdown structure, payout potential and overall value — helping traders choose the right funding model.'; }
if ( ! $copyright ) { $copyright = '© 2026 FundedProgram. All rights reserved.'; }

$brand_logo = is_array( $ft_logo ) && ! empty( $ft_logo['url'] ) ? $ft_logo : $logo;
?>

<footer class="lp-footer">
	<div class="hotel-container lp-footer__inner">

		<div class="lp-footer__col lp-footer__col--brand">
			<a class="lp-footer__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( is_array( $brand_logo ) && ! empty( $brand_logo['url'] ) ) : ?>
					<img src="<?php echo esc_url( $brand_logo['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
				<?php else : ?>
					<span class="lp-footer__brand-text"><?php echo esc_html( $logo_text ); ?></span>
				<?php endif; ?>
			</a>
			<p class="lp-footer__about"><?php echo esc_html( $about ); ?></p>

			<?php if ( $socials ) : ?>
				<div class="lp-footer__socials">
					<?php foreach ( $socials as $s ) :
						if ( empty( $s['url'] ) ) { continue; }
						$icon = ! empty( $s['icon'] ) ? $s['icon'] : 'fas fa-link'; ?>
						<a href="<?php echo esc_url( $s['url'] ); ?>" target="_blank" rel="noopener" aria-label="social">
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $links ) : ?>
			<div class="lp-footer__col">
				<h3 class="lp-footer__title">Quick Links</h3>
				<ul class="lp-footer__links">
					<?php foreach ( $links as $l ) :
						if ( empty( $l['label'] ) ) { continue; }
						$url = ! empty( $l['url'] ) ? $l['url'] : '#'; ?>
						<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $l['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php if ( $address || $phone || $email ) : ?>
			<div class="lp-footer__col">
				<h3 class="lp-footer__title">Contact</h3>
				<ul class="lp-footer__contact">
					<?php if ( $address ) : ?>
						<li><i class="fas fa-location-dot"></i><span><?php echo esc_html( $address ); ?></span></li>
					<?php endif; ?>
					<?php if ( $phone ) : ?>
						<li><i class="fas fa-phone"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></li>
					<?php endif; ?>
					<?php if ( $email ) : ?>
						<li><i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>

	</div>

	<div class="lp-footer__bottom">
		<div class="hotel-container">
			<p><?php echo esc_html( $copyright ); ?></p>
		</div>
	</div>
</footer>
