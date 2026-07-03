<?php
/**
 * ACF setup and helpers for the casino review landing template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hosting_landing_render_parts' ) ) {
	function hosting_landing_render_parts() {
		get_template_part( 'template-parts/header' );
		get_template_part( 'template-parts/banner' );
		get_template_part( 'template-parts/firms-table' );
		get_template_part( 'template-parts/faq' );
		get_template_part( 'template-parts/editors-picks' );
		get_template_part( 'template-parts/bonus-popup' );
		get_template_part( 'template-parts/footer' );
		get_template_part( 'template-parts/sticky-offer' );
	}
}

if ( ! function_exists( 'hosting_landing_get_field' ) ) {
	function hosting_landing_get_field( $name, $post_id = null, $default = '' ) {
		$value = null;

		if ( function_exists( 'get_field' ) ) {
			$value = get_field( $name, $post_id ? $post_id : get_the_ID() );
		}

		if ( null === $value || '' === $value || array() === $value ) {
			return $default;
		}

		return $value;
	}
}

if ( ! function_exists( 'hosting_landing_default_providers' ) ) {
	function hosting_landing_default_providers() {
		return array(
			array(
				'name'           => 'Duelbits',
				'accent_color'   => '#ff8a00',
				'featured_badge' => 'Best esports casino overall',
				'deal_note'      => 'Get 500 free spins + $100 in free bets',
				'description'    => 'Duelbits is a bright esports betting and casino pick with popular esports markets, tournament coverage, and strong bonus value.',
				'pros'           => array(
					array( 'text' => 'Popular esports games' ),
					array( 'text' => 'All top esports tournaments' ),
					array( 'text' => 'Fantastic betting odds' ),
				),
				'cons'           => array(),
				'score'          => '9.8',
				'score_label'    => 'Excellent',
				'button_label'   => 'Visit site',
				'button_url'     => 'https://go.duelbits.net/visit/?bta=36979&brand=duelbits',
				'quote_text'     => 'Duelbits leads this casino review list with strong esports depth, clear bonus value, and a fast path from signup to play.',
				'quote_author'   => 'Casino Review Desk',
				'quote_role'     => 'Updated July 2026',
				'money_back'     => '500 spins + $100 bets',
				'storage'        => 'Esports + casino',
				'support'        => 'Tournament betting',
				'ssl'            => 'Competitive odds',
			),
			array(
				'name'         => 'Roobet',
				'accent_color' => '#00b67a',
				'deal_note'    => '$100,000 Weekly Raffle and Loyalty Rewards',
				'description'  => 'Roobet is a lively crypto casino and betting site with competitive odds, tournament action, and a large loyalty reward hook.',
				'pros'         => array(
					array( 'text' => '20+ games available' ),
					array( 'text' => 'Offers competitive odds' ),
					array( 'text' => 'Lots of tournaments' ),
				),
				'cons'         => array(),
				'score'        => '9.6',
				'score_label'  => 'Excellent',
				'button_label' => 'Visit site',
				'button_url'   => 'https://roobet.com/?ref=kevinmarker',
				'money_back'   => '$100,000 raffle',
				'storage'      => '20+ games',
				'support'      => 'Tournaments',
				'ssl'          => 'Loyalty rewards',
			),
			array(
				'name'         => 'Gamba',
				'accent_color' => '#f97316',
				'deal_note'    => '45% lifetime rakeback',
				'description'  => 'Gamba is a casino-first option with a generous signup offer, a deep slot catalog, and live casino games across varied categories.',
				'pros'         => array(
					array( 'text' => 'Generous sign-up bonus' ),
					array( 'text' => 'Over 1,000 slot games to play' ),
					array( 'text' => 'Live casino games from varied categories' ),
				),
				'cons'         => array(),
				'score'        => '9.5',
				'score_label'  => 'Excellent',
				'button_label' => 'Visit site',
				'button_url'   => 'https://gamba.com?c=sportbet',
				'money_back'   => '45% rakeback',
				'storage'      => '1,000+ slots',
				'support'      => 'Live casino',
				'ssl'          => 'Signup bonus',
			),
			array(
				'name'         => 'Rollbit',
				'accent_color' => '#6246ea',
				'deal_note'    => 'Check onsite offers',
				'description'  => 'Rollbit stands out for competitive betting odds, major tournament promos, and live betting availability.',
				'pros'         => array(
					array( 'text' => 'Very competitive odds' ),
					array( 'text' => 'Major tournaments promos' ),
					array( 'text' => 'Live betting available' ),
				),
				'cons'         => array(),
				'score'        => '9.4',
				'score_label'  => 'Very good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://rollbit.com/referral/500bonus',
				'money_back'   => 'Onsite offers',
				'storage'      => 'Sports + casino',
				'support'      => 'Live betting',
				'ssl'          => 'Tournament promos',
			),
			array(
				'name'         => 'BC.Game',
				'accent_color' => '#35df75',
				'deal_note'    => '120% up to $500 + 5 Free Spins',
				'description'  => 'BC.Game combines broad tournament coverage, top esports live betting, and a strong welcome bonus.',
				'pros'         => array(
					array( 'text' => 'Lots of tournaments covered' ),
					array( 'text' => 'Top esports live betting' ),
					array( 'text' => 'Great welcome bonus' ),
				),
				'cons'         => array(),
				'score'        => '9.3',
				'score_label'  => 'Very good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://bc.game/i-mq3kih7b-n/',
				'money_back'   => '120% up to $500',
				'storage'      => 'Esports live betting',
				'support'      => 'Tournament coverage',
				'ssl'          => '5 Free Spins',
			),
			array(
				'name'         => 'Stake',
				'accent_color' => '#ff9f1c',
				'deal_note'    => '200% up to $2000',
				'description'  => 'Stake is a casino heavyweight with exclusive games, excellent slot choice, and table plus live dealer experiences.',
				'pros'         => array(
					array( 'text' => 'Exclusive games' ),
					array( 'text' => 'Excellent choice of slots' ),
					array( 'text' => 'Table and live dealer games' ),
				),
				'cons'         => array(),
				'score'        => '9.2',
				'score_label'  => 'Very good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://stake.com/?c=IdyluVJW',
				'money_back'   => '200% up to $2000',
				'storage'      => 'Slots + table games',
				'support'      => 'Live dealer',
				'ssl'          => 'Exclusive games',
			),
			array(
				'name'         => 'Rainbet',
				'accent_color' => '#0ea5e9',
				'deal_note'    => '20% rakeback for 72 hours',
				'description'  => 'Rainbet is a crypto-ready sportsbook and casino with reliable live chat support and flexible payment options.',
				'pros'         => array(
					array( 'text' => 'Crypto-ready sportsbook and casino' ),
					array( 'text' => 'Reliable live chat support' ),
					array( 'text' => 'Flexible range of payment options' ),
				),
				'cons'         => array(),
				'score'        => '9.0',
				'score_label'  => 'Good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://rainbet.com/?r=stakrio',
				'money_back'   => '20% rakeback',
				'storage'      => 'Crypto sportsbook',
				'support'      => 'Live chat',
				'ssl'          => 'Flexible payments',
			),
			array(
				'name'         => 'Shuffle',
				'accent_color' => '#8b5cf6',
				'deal_note'    => '200% deposit bonus up to $1000',
				'description'  => 'Shuffle brings live betting and streaming together with dedicated sports bonuses across popular sports and leagues.',
				'pros'         => array(
					array( 'text' => 'Live betting and streaming' ),
					array( 'text' => 'Dedicated sports bonuses' ),
					array( 'text' => 'Popular sports and leagues' ),
				),
				'cons'         => array(),
				'score'        => '8.9',
				'score_label'  => 'Good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://shuffle.com?r=EKq5WBLqHV',
				'money_back'   => '200% up to $1000',
				'storage'      => 'Live streaming',
				'support'      => 'Sports bonuses',
				'ssl'          => 'Popular leagues',
			),
			array(
				'name'         => 'METAWIN',
				'accent_color' => '#111827',
				'deal_note'    => 'Get 30% extra free on each deposit',
				'description'  => 'METAWIN is a broad sportsbook and casino option with 35+ sports, simple bet placement, and live betting markets.',
				'pros'         => array(
					array( 'text' => 'Over 35 sports' ),
					array( 'text' => 'Easy to place bets' ),
					array( 'text' => 'Live betting markets' ),
				),
				'cons'         => array(),
				'score'        => '8.8',
				'score_label'  => 'Good',
				'button_label' => 'Visit site',
				'button_url'   => 'https://affiliates-link.metawin.com/opCXRprl',
				'money_back'   => '30% extra deposit',
				'storage'      => '35+ sports',
				'support'      => 'Easy bets',
				'ssl'          => 'Live markets',
			),
		);
	}
}

if ( ! function_exists( 'hosting_landing_get_providers' ) ) {
	function hosting_landing_get_providers( $post_id = null ) {
		$providers = hosting_landing_get_field( 'hosting_providers', $post_id, array() );

		if ( empty( $providers ) || ! is_array( $providers ) ) {
			$providers = hosting_landing_default_providers();
		}

		foreach ( $providers as $index => $provider ) {
			$providers[ $index ]['name']         = ! empty( $provider['name'] ) ? $provider['name'] : 'Casino Brand';
			$providers[ $index ]['accent_color'] = ! empty( $provider['accent_color'] ) ? $provider['accent_color'] : '#ff8a00';
			$providers[ $index ]['pros']         = ! empty( $provider['pros'] ) && is_array( $provider['pros'] ) ? $provider['pros'] : array();
			$providers[ $index ]['cons']         = ! empty( $provider['cons'] ) && is_array( $provider['cons'] ) ? $provider['cons'] : array();
			$providers[ $index ]['score']        = ! empty( $provider['score'] ) ? $provider['score'] : '9.0';
			$providers[ $index ]['score_label']  = ! empty( $provider['score_label'] ) ? $provider['score_label'] : 'Good';
			$providers[ $index ]['logo_svg']     = ! empty( $provider['logo_svg'] ) ? $provider['logo_svg'] : '';
			$providers[ $index ]['button_label'] = ! empty( $provider['button_label'] ) ? $provider['button_label'] : 'Visit site';
			$providers[ $index ]['button_url']   = ! empty( $provider['button_url'] ) ? $provider['button_url'] : '#';
		}

		return $providers;
	}
}

if ( ! function_exists( 'hosting_landing_score_value' ) ) {
	function hosting_landing_score_value( $score ) {
		$score = trim( (string) $score );

		if ( preg_match( '/([0-9]+(?:\.[0-9]+)?)\s*\/\s*([0-9]+(?:\.[0-9]+)?)/', $score, $matches ) ) {
			$earned = (float) $matches[1];
			$total  = (float) $matches[2];

			if ( $total > 0 ) {
				return max( 0, min( 10, ( $earned / $total ) * 10 ) );
			}
		}

		$value = (float) preg_replace( '/[^0-9.]/', '', $score );

		return max( 0, min( 10, $value ) );
	}
}

if ( ! function_exists( 'hosting_landing_render_stars' ) ) {
	function hosting_landing_render_stars( $score, $label = '' ) {
		$value   = hosting_landing_score_value( $score );
		$percent = round( $value * 10, 2 );
		$stars   = $value / 2;
		$aria    = number_format_i18n( $value, 1 ) . ' out of 10 rating';

		if ( $label ) {
			$aria .= ' - ' . $label;
		}
		?>
		<span class="hosting-stars" style="--rating-fill: <?php echo esc_attr( $percent . '%' ); ?>;" aria-label="<?php echo esc_attr( $aria ); ?>">
			<?php for ( $index = 1; $index <= 5; $index++ ) :
				$star_fill = max( 0, min( 1, $stars - ( $index - 1 ) ) ) * 100;
				?>
				<span class="hosting-star" style="--star-fill: <?php echo esc_attr( round( $star_fill, 2 ) . '%' ); ?>;" aria-hidden="true">
					<span class="hosting-star__base">&#9733;</span>
					<span class="hosting-star__fill">&#9733;</span>
				</span>
			<?php endfor; ?>
		</span>
		<?php
	}
}

if ( ! function_exists( 'hosting_landing_get_initials' ) ) {
	function hosting_landing_get_initials( $name ) {
		$words    = preg_split( '/\s+/', trim( (string) $name ) );
		$initials = '';

		foreach ( $words as $word ) {
			if ( '' === $word ) {
				continue;
			}
			$initials .= strtoupper( substr( $word, 0, 1 ) );
			if ( strlen( $initials ) >= 2 ) {
				break;
			}
		}

		return $initials ? $initials : strtoupper( substr( (string) $name, 0, 1 ) );
	}
}

if ( ! function_exists( 'hosting_landing_brand_key' ) ) {
	function hosting_landing_brand_key( $name ) {
		$key = strtolower( (string) $name );
		$key = preg_replace( '/[^a-z0-9]+/', '', $key );

		return $key ? $key : 'brand';
	}
}

if ( ! function_exists( 'hosting_landing_render_brand_svg' ) ) {
	function hosting_landing_render_brand_svg( $name, $accent_color = '#673de6' ) {
		$key      = hosting_landing_brand_key( $name );
		$color    = sanitize_hex_color( $accent_color );
		$color    = $color ? $color : '#673de6';
		$label    = trim( (string) $name );
		$label    = $label ? $label : 'Casino Brand';
		$initials = hosting_landing_get_initials( $label );
		?>
		<svg class="hosting-brand-svg hosting-brand-svg--<?php echo esc_attr( $key ); ?>" viewBox="0 0 300 78" role="img" aria-label="<?php echo esc_attr( $label ); ?>" xmlns="http://www.w3.org/2000/svg">
			<g class="hosting-brand-svg__mark">
				<?php if ( 'duelbits' === $key ) : ?>
					<rect x="17" y="33" width="48" height="12" rx="3" fill="<?php echo esc_attr( $color ); ?>" transform="rotate(45 41 39)" />
					<rect x="17" y="33" width="48" height="12" rx="3" fill="<?php echo esc_attr( $color ); ?>" transform="rotate(-45 41 39)" />
					<circle cx="41" cy="39" r="10" fill="#fff" />
					<circle cx="41" cy="39" r="4" fill="<?php echo esc_attr( $color ); ?>" />
					<circle cx="23" cy="21" r="4" fill="<?php echo esc_attr( $color ); ?>" />
					<circle cx="59" cy="21" r="4" fill="<?php echo esc_attr( $color ); ?>" />
					<circle cx="23" cy="57" r="4" fill="<?php echo esc_attr( $color ); ?>" />
					<circle cx="59" cy="57" r="4" fill="<?php echo esc_attr( $color ); ?>" />
				<?php elseif ( 'roobet' === $key ) : ?>
					<circle cx="41" cy="39" r="26" fill="none" stroke="<?php echo esc_attr( $color ); ?>" stroke-width="5" />
					<path d="M31 28h20v5c0 7-4 12-10 14-6-2-10-7-10-14v-5Z" fill="<?php echo esc_attr( $color ); ?>" />
					<path d="M27 31c-6 2-7 9-1 13l5-4c-3-2-2-5 1-6l-5-3Zm28 0-5 3c3 1 4 4 1 6l5 4c6-4 5-11-1-13Z" fill="<?php echo esc_attr( $color ); ?>" />
					<rect x="37" y="47" width="8" height="7" rx="1" fill="<?php echo esc_attr( $color ); ?>" />
					<rect x="32" y="54" width="18" height="4" rx="2" fill="<?php echo esc_attr( $color ); ?>" />
				<?php elseif ( 'gamba' === $key ) : ?>
					<rect x="14" y="13" width="54" height="54" rx="9" fill="<?php echo esc_attr( $color ); ?>" />
					<text x="41" y="48" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="25" font-weight="800" fill="#fff">G</text>
				<?php elseif ( 'rollbit' === $key ) : ?>
					<path d="M41 10 66 25v28L41 68 16 53V25L41 10Z" fill="<?php echo esc_attr( $color ); ?>" opacity=".18" />
					<path d="M41 15 61 27v23L41 62 21 50V27L41 15Zm0 8-12 7 12 7 12-7-12-7Zm-14 13v10l10 6V42l-10-6Zm28 0-10 6v10l10-6V36Z" fill="<?php echo esc_attr( $color ); ?>" />
				<?php elseif ( 'bcgame' === $key ) : ?>
					<rect x="12" y="14" width="58" height="50" rx="12" fill="<?php echo esc_attr( $color ); ?>" />
					<text x="41" y="47" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="20" font-weight="800" fill="#07150d">BC</text>
				<?php elseif ( 'stake' === $key ) : ?>
					<circle cx="41" cy="39" r="28" fill="<?php echo esc_attr( $color ); ?>" />
					<path d="M52 28c-3-4-8-6-14-5-7 1-12 5-12 11 0 7 6 9 13 10 5 1 7 2 7 5 0 2-2 4-6 4-5 0-8-2-11-5l-7 6c4 5 10 8 18 8 9 0 15-5 15-13 0-7-5-10-13-11-5-1-7-2-7-4s2-4 5-4c4 0 7 1 9 4l7-6Z" fill="#fff" />
				<?php elseif ( 'rainbet' === $key ) : ?>
					<path d="M41 9c13 16 24 30 24 43 0 10-10 17-24 17S17 62 17 52C17 39 28 25 41 9Z" fill="<?php echo esc_attr( $color ); ?>" />
					<path d="M32 51c5 5 14 5 19 0" fill="none" stroke="#fff" stroke-width="5" stroke-linecap="round" />
					<circle cx="32" cy="39" r="4" fill="#fff" />
					<circle cx="50" cy="39" r="4" fill="#fff" />
				<?php elseif ( 'shuffle' === $key ) : ?>
					<rect x="17" y="23" width="36" height="46" rx="6" fill="<?php echo esc_attr( $color ); ?>" opacity=".28" transform="rotate(-10 35 46)" />
					<rect x="29" y="12" width="36" height="46" rx="6" fill="<?php echo esc_attr( $color ); ?>" />
					<path d="M39 31h16M39 40h11" stroke="#fff" stroke-width="5" stroke-linecap="round" />
				<?php elseif ( 'metawin' === $key ) : ?>
					<rect x="12" y="15" width="58" height="48" rx="12" fill="<?php echo esc_attr( $color ); ?>" />
					<path d="M24 51V27h7l10 12 10-12h7v24h-8V39l-9 10-9-10v12h-8Z" fill="#fff" />
				<?php else : ?>
					<rect x="13" y="13" width="56" height="52" rx="12" fill="<?php echo esc_attr( $color ); ?>" />
					<text x="41" y="47" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="22" font-weight="800" fill="#fff"><?php echo esc_html( $initials ); ?></text>
				<?php endif; ?>
			</g>
			<text class="hosting-brand-svg__wordmark" x="86" y="49" font-family="Inter, Arial, sans-serif" font-size="34" font-weight="800" fill="#25272c"><?php echo esc_html( $label ); ?></text>
		</svg>
		<?php
	}
}

if ( ! function_exists( 'hosting_landing_allowed_svg_tags' ) ) {
	function hosting_landing_allowed_svg_tags() {
		$svg_attrs = array(
			'aria-hidden'           => true,
			'aria-label'            => true,
			'class'                 => true,
			'clip-path'             => true,
			'clip-rule'             => true,
			'cx'                    => true,
			'cy'                    => true,
			'd'                     => true,
			'fill'                  => true,
			'fill-rule'             => true,
			'focusable'             => true,
			'font-family'           => true,
			'font-size'             => true,
			'font-weight'           => true,
			'height'                => true,
			'href'                  => true,
			'id'                    => true,
			'offset'                => true,
			'opacity'               => true,
			'points'                => true,
			'preserveAspectRatio'   => true,
			'preserveaspectratio'   => true,
			'r'                     => true,
			'role'                  => true,
			'rx'                    => true,
			'ry'                    => true,
			'stop-color'            => true,
			'stop-opacity'          => true,
			'stroke'                => true,
			'stroke-dasharray'      => true,
			'stroke-linecap'        => true,
			'stroke-linejoin'       => true,
			'stroke-miterlimit'     => true,
			'stroke-width'          => true,
			'style'                 => true,
			'text-anchor'           => true,
			'transform'             => true,
			'viewBox'               => true,
			'viewbox'               => true,
			'width'                 => true,
			'x'                     => true,
			'x1'                    => true,
			'x2'                    => true,
			'xlink:href'            => true,
			'xmlns'                 => true,
			'xmlns:xlink'           => true,
			'y'                     => true,
			'y1'                    => true,
			'y2'                    => true,
		);

		return array(
			'svg'            => $svg_attrs,
			'g'              => $svg_attrs,
			'defs'           => $svg_attrs,
			'symbol'         => $svg_attrs,
			'use'            => $svg_attrs,
			'path'           => $svg_attrs,
			'rect'           => $svg_attrs,
			'circle'         => $svg_attrs,
			'ellipse'        => $svg_attrs,
			'line'           => $svg_attrs,
			'polygon'        => $svg_attrs,
			'polyline'       => $svg_attrs,
			'linearGradient' => $svg_attrs,
			'lineargradient' => $svg_attrs,
			'radialGradient' => $svg_attrs,
			'radialgradient' => $svg_attrs,
			'stop'           => $svg_attrs,
			'clipPath'       => $svg_attrs,
			'clippath'       => $svg_attrs,
			'mask'           => $svg_attrs,
			'title'          => $svg_attrs,
			'text'           => $svg_attrs,
			'tspan'          => $svg_attrs,
		);
	}
}

if ( ! function_exists( 'hosting_landing_sanitize_logo_svg' ) ) {
	function hosting_landing_sanitize_logo_svg( $svg ) {
		$svg = trim( (string) $svg );

		if ( '' === $svg ) {
			return '';
		}

		return wp_kses( $svg, hosting_landing_allowed_svg_tags() );
	}
}

if ( ! function_exists( 'hosting_landing_brand_logo' ) ) {
	function hosting_landing_brand_logo( $name, $logo = null, $accent_color = '#673de6', $class = 'hosting-brand-logo', $logo_svg = '' ) {
		$color = sanitize_hex_color( $accent_color );
		$style = $color ? ' style="--brand-color:' . esc_attr( $color ) . '"' : '';
		$logo_url = '';
		$svg_logo = hosting_landing_sanitize_logo_svg( $logo_svg );

		if ( is_array( $logo ) && ! empty( $logo['url'] ) ) {
			$logo_url = $logo['url'];
		} elseif ( is_numeric( $logo ) && function_exists( 'wp_get_attachment_image_url' ) ) {
			$logo_url = wp_get_attachment_image_url( absint( $logo ), 'full' );
		} elseif ( is_string( $logo ) && '' !== trim( $logo ) ) {
			$logo_url = $logo;
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?>"<?php echo $style; ?>>
			<?php if ( $logo_url ) : ?>
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
			<?php elseif ( $svg_logo ) : ?>
				<span class="hosting-logo-svg" role="img" aria-label="<?php echo esc_attr( $name ); ?>">
					<?php echo $svg_logo; ?>
				</span>
			<?php else : ?>
				<?php hosting_landing_render_brand_svg( $name, $color ? $color : '#673de6' ); ?>
			<?php endif; ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'hosting_landing_page_location' ) ) {
	function hosting_landing_page_location() {
		return array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-landing.php',
				),
			),
		);
	}
}

if ( ! function_exists( 'hosting_landing_field' ) ) {
	function hosting_landing_field( $key, $label, $name, $type = 'text', $extra = array() ) {
		return array_merge(
			array(
				'key'   => $key,
				'label' => $label,
				'name'  => $name,
				'type'  => $type,
			),
			$extra
		);
	}
}

if ( ! function_exists( 'hosting_landing_text_repeater' ) ) {
	function hosting_landing_text_repeater( $key, $label, $name, $button_label ) {
		return hosting_landing_field(
			$key,
			$label,
			$name,
			'repeater',
			array(
				'layout'       => 'table',
				'button_label' => $button_label,
				'sub_fields'   => array(
					hosting_landing_field( $key . '_text', 'Text', 'text' ),
				),
			)
		);
	}
}

add_action( 'acf/init', 'caia_register_hosting_landing_fields' );
function caia_register_hosting_landing_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'                   => 'group_hosting_landing_hero',
			'title'                 => 'Casino Landing - 01 Header & Hero',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_header_tab', 'Header', '', 'tab' ),
				hosting_landing_field( 'field_hosting_header_logo', 'Logo image', 'hosting_header_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				hosting_landing_field( 'field_hosting_header_logo_text', 'Logo text', 'hosting_header_logo_text', 'text', array( 'default_value' => 'CasinoReview*' ) ),
				hosting_landing_field( 'field_hosting_header_disclosure_label', 'Disclosure label', 'hosting_disclosure_label', 'text', array( 'default_value' => 'Advertiser disclosure', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_header_disclosure_url', 'Disclosure URL', 'hosting_disclosure_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_hero_tab', 'Hero copy', '', 'tab' ),
				hosting_landing_field( 'field_hosting_hero_updated', 'Updated label', 'hosting_hero_updated', 'text', array( 'default_value' => 'Updated: July 2026' ) ),
				hosting_landing_field( 'field_hosting_hero_title', 'Title', 'hosting_hero_title', 'textarea', array( 'rows' => 2, 'default_value' => 'Best Casino Review Sites' ) ),
				hosting_landing_field( 'field_hosting_hero_intro', 'Intro', 'hosting_hero_intro', 'textarea', array( 'rows' => 3, 'default_value' => 'Compare top casino and sportsbook brands by bonus value, esports coverage, live betting, game variety, and player-friendly rewards.' ) ),
				hosting_landing_field( 'field_hosting_top_tab', 'Hero top casino bar', '', 'tab' ),
				hosting_landing_field( 'field_hosting_top_logo', 'Brand logo image', 'hosting_top_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_top_logo_svg', 'Brand logo SVG markup', 'hosting_top_logo_svg', 'textarea', array( 'instructions' => 'Optional. Used only when Brand logo image is empty. Paste inline SVG markup, for example <svg><use xlink:href="#brand-logo"></use></svg>.', 'rows' => 4, 'new_lines' => '', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_top_name', 'Brand name', 'hosting_top_name', 'text', array( 'default_value' => 'Duelbits', 'wrapper' => array( 'width' => '35' ) ) ),
				hosting_landing_field( 'field_hosting_top_color', 'Brand color', 'hosting_top_color', 'color_picker', array( 'default_value' => '#ff8a00', 'wrapper' => array( 'width' => '15' ) ) ),
				hosting_landing_field( 'field_hosting_top_rank_label', 'Rank label', 'hosting_top_rank_label', 'text', array( 'default_value' => 'Casino ranking', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_rank', 'Rank value', 'hosting_top_rank', 'text', array( 'default_value' => '#1', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_score_label', 'Score label', 'hosting_top_score_label', 'text', array( 'default_value' => 'Score', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_score', 'Score value', 'hosting_top_score', 'text', array( 'default_value' => '9.8', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_deal_label', 'Deal label', 'hosting_top_deal_label', 'text', array( 'default_value' => 'Top bonus', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_deal', 'Deal value', 'hosting_top_deal', 'text', array( 'default_value' => '500 spins + $100 bets', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_cta_label', 'CTA label', 'hosting_top_cta_label', 'text', array( 'default_value' => 'Claim Duelbits bonus', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_top_cta_url', 'CTA URL', 'hosting_top_cta_url', 'text', array( 'default_value' => 'https://go.duelbits.net/visit/?bta=36979&brand=duelbits', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_promo_tab', 'Promo strip', '', 'tab' ),
				hosting_landing_field( 'field_hosting_promo_text', 'Promo text', 'hosting_promo_text', 'text', array( 'default_value' => 'Fresh casino bonuses, esports odds, and live betting picks updated for July 2026' ) ),
				hosting_landing_field( 'field_hosting_promo_url', 'Promo URL', 'hosting_promo_url', 'text', array( 'default_value' => '#' ) ),
			),
			'location'              => hosting_landing_page_location(),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_hosting_landing_providers',
			'title'                 => 'Casino Landing - 02 Brand Ranking',
			'fields'                => array(
				hosting_landing_field(
					'field_hosting_providers',
					'Casino brands',
					'hosting_providers',
					'repeater',
					array(
						'layout'       => 'block',
						'button_label' => 'Add casino brand',
						'sub_fields'   => array(
							hosting_landing_field( 'field_hosting_provider_name', 'Brand name', 'name', 'text', array( 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_provider_logo', 'Logo image', 'logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_provider_logo_svg', 'Logo SVG markup', 'logo_svg', 'textarea', array( 'instructions' => 'Optional. Used only when Logo image is empty. Paste inline SVG markup, for example <svg><use xlink:href="#brand-logo"></use></svg>.', 'rows' => 4, 'new_lines' => '', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_provider_color', 'Brand color', 'accent_color', 'color_picker', array( 'default_value' => '#ff8a00', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_provider_badge', 'Featured badge', 'featured_badge', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_deal_note', 'Bonus label', 'deal_note', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_desc', 'Description', 'description', 'textarea', array( 'rows' => 3 ) ),
							hosting_landing_text_repeater( 'field_hosting_provider_pros', 'Review highlights', 'pros', 'Add highlight' ),
							hosting_landing_text_repeater( 'field_hosting_provider_cons', 'Notes / limitations', 'cons', 'Add note' ),
							hosting_landing_field( 'field_hosting_provider_score', 'Score', 'score', 'text', array( 'default_value' => '9.0', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_score_label', 'Score label', 'score_label', 'text', array( 'default_value' => 'Good', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_button_label', 'Button label', 'button_label', 'text', array( 'default_value' => 'Visit Site', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_button_url', 'Button URL', 'button_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_quote_text', 'Featured quote text', 'quote_text', 'textarea', array( 'rows' => 2 ) ),
							hosting_landing_field( 'field_hosting_provider_quote_author', 'Quote author', 'quote_author', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_quote_role', 'Quote role', 'quote_role', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_money_back', 'Bonus', 'money_back', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_storage', 'Game coverage', 'storage', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_support', 'Live betting / support', 'support', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_ssl', 'Rewards / feature', 'ssl', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
						),
					)
				),
			),
			'location'              => hosting_landing_page_location(),
			'menu_order'            => 1,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_hosting_landing_faq',
			'title'                 => 'Casino Landing - 03 FAQ',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_faq_title', 'FAQ title', 'hosting_faq_title', 'text', array( 'default_value' => 'Casino Review FAQ' ) ),
				hosting_landing_field(
					'field_hosting_faqs',
					'FAQ items',
					'hosting_faqs',
					'repeater',
					array(
						'layout'       => 'block',
						'button_label' => 'Add FAQ',
						'sub_fields'   => array(
							hosting_landing_field( 'field_hosting_faq_question', 'Question', 'question' ),
							hosting_landing_field( 'field_hosting_faq_answer', 'Answer', 'answer', 'textarea', array( 'rows' => 3 ) ),
						),
					)
				),
			),
			'location'              => hosting_landing_page_location(),
			'menu_order'            => 2,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_hosting_landing_footer',
			'title'                 => 'Casino Landing - 04 Editor Picks, Footer & Sticky',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_editor_tab', 'Editor picks', '', 'tab' ),
				hosting_landing_field( 'field_hosting_editor_title', 'Section title', 'hosting_editor_title', 'text', array( 'default_value' => 'Top Casino Picks' ) ),
				hosting_landing_field(
					'field_hosting_editor_picks',
					'Custom editor cards',
					'hosting_editor_picks',
					'repeater',
					array(
						'instructions' => 'Leave empty to use the first 3 providers from the ranking.',
						'layout'       => 'block',
						'button_label' => 'Add editor card',
						'sub_fields'   => array(
							hosting_landing_field( 'field_hosting_editor_name', 'Brand name', 'name', 'text', array( 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_editor_logo', 'Logo image', 'logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_editor_logo_svg', 'Logo SVG markup', 'logo_svg', 'textarea', array( 'instructions' => 'Optional. Used only when Logo image is empty. Paste inline SVG markup, for example <svg><use xlink:href="#brand-logo"></use></svg>.', 'rows' => 4, 'new_lines' => '', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_editor_color', 'Brand color', 'accent_color', 'color_picker', array( 'default_value' => '#ff8a00', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_deal_note', 'Bonus badge', 'deal_note' ),
							hosting_landing_field( 'field_hosting_editor_score', 'Score', 'score', 'text', array( 'default_value' => '9.0', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_score_label', 'Score label', 'score_label', 'text', array( 'default_value' => 'Good', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_description', 'Description', 'description', 'textarea', array( 'rows' => 3 ) ),
							hosting_landing_field( 'field_hosting_editor_money_back', 'Bonus', 'money_back', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_storage', 'Game coverage', 'storage', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_support', 'Live betting / support', 'support', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_ssl', 'Rewards / feature', 'ssl', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_button_label', 'Button label', 'button_label', 'text', array( 'default_value' => 'Visit site', 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_editor_button_url', 'Button URL', 'button_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
						),
					)
				),
				hosting_landing_field( 'field_hosting_bonus_tab', 'Bonus popup cards', '', 'tab' ),
				hosting_landing_field( 'field_hosting_bonus_enabled', 'Show bonus popup', 'hosting_bonus_enabled', 'true_false', array( 'default_value' => 1, 'ui' => 1, 'ui_on_text' => 'Show', 'ui_off_text' => 'Hide' ) ),
				hosting_landing_field( 'field_hosting_bonus_title', 'Section title', 'hosting_bonus_title', 'text', array( 'default_value' => 'Exclusive casino bonuses' ) ),
				hosting_landing_field( 'field_hosting_bonus_subtitle', 'Section subtitle', 'hosting_bonus_subtitle', 'textarea', array( 'rows' => 2, 'default_value' => 'Fresh casino offers selected for bonus value, live betting, esports odds, and game variety.' ) ),
				hosting_landing_field( 'field_hosting_bonus_button_label', 'Button label', 'hosting_bonus_button_label', 'text', array( 'default_value' => 'Claim bonus', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_bonus_legal', 'Legal text', 'hosting_bonus_legal', 'text', array( 'default_value' => '18+ only. Terms apply. Play responsibly.', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_footer_tab', 'Footer', '', 'tab' ),
				hosting_landing_field( 'field_hosting_footer_logo', 'Footer logo', 'hosting_footer_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				hosting_landing_field( 'field_hosting_footer_logo_text', 'Footer logo text', 'hosting_footer_logo_text', 'text', array( 'default_value' => 'CasinoReview*' ) ),
				hosting_landing_field(
					'field_hosting_footer_links',
					'Footer links',
					'hosting_footer_links',
					'repeater',
					array(
						'layout'       => 'table',
						'button_label' => 'Add footer link',
						'sub_fields'   => array(
							hosting_landing_field( 'field_hosting_footer_link_label', 'Label', 'label' ),
							hosting_landing_field( 'field_hosting_footer_link_url', 'URL', 'url', 'text', array( 'default_value' => '#' ) ),
						),
					)
				),
				hosting_landing_field( 'field_hosting_footer_copyright', 'Copyright', 'hosting_footer_copyright', 'text', array( 'default_value' => '(c) 2026 CasinoReview - Casino reviews, sportsbook bonuses, and responsible play information.' ) ),
				hosting_landing_field( 'field_hosting_sticky_tab', 'Sticky casino offer', '', 'tab' ),
				hosting_landing_field( 'field_hosting_sticky_enabled', 'Enable sticky offer', 'hosting_sticky_enabled', 'true_false', array( 'default_value' => 1, 'ui' => 1 ) ),
				hosting_landing_field( 'field_hosting_sticky_logo', 'Sticky logo image', 'hosting_sticky_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_logo_svg', 'Sticky logo SVG markup', 'hosting_sticky_logo_svg', 'textarea', array( 'instructions' => 'Optional. Used only when Sticky logo image is empty. Paste inline SVG markup.', 'rows' => 4, 'new_lines' => '', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_name', 'Brand name', 'hosting_sticky_name', 'text', array( 'default_value' => 'Duelbits', 'wrapper' => array( 'width' => '35' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_color', 'Brand color', 'hosting_sticky_color', 'color_picker', array( 'default_value' => '#ff8a00', 'wrapper' => array( 'width' => '15' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_badge', 'Badge', 'hosting_sticky_badge', 'text', array( 'default_value' => 'Best casino bonus', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_text', 'Offer text', 'hosting_sticky_text', 'text', array( 'default_value' => 'Duelbits - Get 500 free spins + $100 in free bets', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_cta_label', 'Button label', 'hosting_sticky_cta_label', 'text', array( 'default_value' => 'Visit site', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_cta_url', 'Button URL', 'hosting_sticky_cta_url', 'text', array( 'default_value' => 'https://go.duelbits.net/visit/?bta=36979&brand=duelbits', 'wrapper' => array( 'width' => '50' ) ) ),
			),
			'location'              => hosting_landing_page_location(),
			'menu_order'            => 3,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'active'                => true,
		)
	);
}
