<?php
/**
 * Template part: Header của Landing Page
 * Dữ liệu lấy từ ACF Options Page (xem custom/acf-landing.php).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo      = get_field( 'hf_logo', 'option' );
$logo_text = get_field( 'hf_logo_text', 'option' );
$menu      = get_field( 'hf_menu', 'option' );
$btn_label = get_field( 'hf_btn_label', 'option' );
$btn_url   = get_field( 'hf_btn_url', 'option' );

if ( ! $logo_text ) { $logo_text = 'FundedProgram'; }
if ( ! $btn_label ) { $btn_label = 'Contact'; }
$btn_url = $btn_url ? $btn_url : '#contact';

if ( empty( $menu ) ) {
	$menu = array(
		array( 'label' => 'Home', 'url' => '#' ),
		array( 'label' => 'Top Firms', 'url' => '#' ),
		array( 'label' => 'Discounts', 'url' => '#' ),
		array( 'label' => 'Reviews', 'url' => '#' ),
	);
}
?>

<header class="lp-header">
	<div class="hotel-container lp-header__inner">

		<a class="lp-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo_text ); ?>">
			<?php else : ?>
				<span class="lp-header__brand-text"><?php echo esc_html( $logo_text ); ?></span>
			<?php endif; ?>
		</a>

		<input type="checkbox" id="lp-nav-toggle" class="lp-header__toggle-input" hidden>
		<label for="lp-nav-toggle" class="lp-header__toggle" aria-label="Menu">
			<span></span><span></span><span></span>
		</label>

		<nav class="lp-header__nav">
			<?php if ( $menu ) : ?>
				<ul class="lp-header__menu">
					<?php foreach ( $menu as $m ) :
						if ( empty( $m['label'] ) ) { continue; }
						$url = ! empty( $m['url'] ) ? $m['url'] : '#'; ?>
						<li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $m['label'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<a class="lp-header__cta" href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_html( $btn_label ); ?></a>
		</nav>

	</div>
</header>
