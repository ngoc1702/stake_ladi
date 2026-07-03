<?php
/**
 * ACF setup and helpers for the Hosting Landing template.
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
				'name'           => 'Hostinger',
				'accent_color'   => '#673de6',
				'featured_badge' => 'Best Hosting Service Overall',
				'deal_note'      => 'GET 81% OFF + free months',
				'description'    => 'Hostinger is among the best website hosting providers for WordPress, offering quick setup, strong security, and fast loading speeds. It is a reliable choice for users looking for efficient and hassle-free web hosting.',
				'pros'           => array(
					array( 'text' => 'DDoS and malware protection' ),
					array( 'text' => 'Free domain, email backups, and SSL' ),
					array( 'text' => 'AI Website Builder included' ),
					array( 'text' => '24/7 expert support' ),
					array( 'text' => 'Data centers covering 4 continents' ),
				),
				'cons'           => array(),
				'score'          => '9.9',
				'score_label'    => 'Outstanding',
				'button_label'   => 'Get the deal',
				'button_url'     => '#',
				'quote_text'     => 'After benchmarking 40+ providers, Hostinger consistently delivers the best performance-to-price ratio I have seen in 10 years.',
				'quote_author'   => 'Jonathan Roland',
				'quote_role'     => 'Senior tech writer',
				'money_back'     => '30-days',
				'storage'        => '25GB SSD',
				'support'        => 'Yes',
				'ssl'            => 'Yes (unlimited)',
			),
			array(
				'name'         => 'IONOS',
				'accent_color' => '#003d8f',
				'description'  => 'IONOS is a dependable hosting provider, delivering fast, user-friendly, and affordable solutions. With versatile features, it is among the best web hosting options for personal and business sites.',
				'pros'         => array(
					array( 'text' => 'Free domain, SSL, DDoS protection' ),
					array( 'text' => 'Low introductory rates' ),
					array( 'text' => 'Daily backups and recovery' ),
					array( 'text' => 'Intuitive control panel and interface' ),
				),
				'cons'         => array(),
				'score'        => '9.4',
				'score_label'  => 'Very good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
				'money_back'   => '30-days',
				'storage'      => '10GB SSD',
				'support'      => 'Yes',
				'ssl'          => 'Yes',
			),
			array(
				'name'         => 'Bluehost',
				'accent_color' => '#0b78bd',
				'description'  => 'Bluehost is a reliable and highly recommended hosting provider, offering affordable plans, user-friendly tools, and solid performance for websites of all sizes.',
				'pros'         => array(
					array( 'text' => 'Modern, intuitive interface' ),
					array( 'text' => 'Excellent website performance' ),
					array( 'text' => 'Versatile hosting options' ),
				),
				'cons'         => array(
					array( 'text' => 'Limited payment options' ),
				),
				'score'        => '9.3',
				'score_label'  => 'Very good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
				'money_back'   => '30-days',
				'storage'      => '10GB SSD',
				'support'      => 'Yes',
				'ssl'          => 'Yes',
			),
			array(
				'name'         => 'DreamHost',
				'accent_color' => '#6aaec5',
				'description'  => 'DreamHost offers a robust web hosting service with good security, fast speeds, and a simplified native panel for seamless website management.',
				'pros'         => array(
					array( 'text' => 'Free domain and SSL' ),
					array( 'text' => 'Automated daily backups' ),
					array( 'text' => 'Free domain privacy' ),
				),
				'cons'         => array(
					array( 'text' => 'Some security tools cost extra' ),
				),
				'score'        => '9.2',
				'score_label'  => 'Very good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'Liquid Web',
				'accent_color' => '#111111',
				'description'  => 'Fully managed, affordable, and secure VPS hosting with huge discounts. Liquid Web separates itself from the pack with 100% network and power uptime.',
				'pros'         => array(
					array( 'text' => 'Faster than top competitors' ),
					array( 'text' => 'Integrated firewall' ),
					array( 'text' => '24/7 phone, chat, and email support' ),
				),
				'cons'         => array(
					array( 'text' => 'Premium-level prices' ),
				),
				'score'        => '9.0',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'Namecheap',
				'accent_color' => '#f05f2a',
				'description'  => 'Namecheap is a solid option for beginners and small projects. With an easy-to-use cPanel and reliable resources, it is a practical choice for simple web hosting.',
				'pros'         => array(
					array( 'text' => 'Free domain, SSL, and CDN' ),
					array( 'text' => 'Native user interface and classic cPanel' ),
					array( 'text' => 'Automated backups twice a week' ),
				),
				'cons'         => array(
					array( 'text' => 'Unreliable performance' ),
				),
				'score'        => '8.9',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'SiteGround',
				'accent_color' => '#74b72e',
				'description'  => 'SiteGround is a good web hosting for WordPress users, designed to improve site speed and security while simplifying website-building processes.',
				'pros'         => array(
					array( 'text' => 'Innovative speed-boosting tech' ),
					array( 'text' => 'Servers in 4 continents' ),
					array( 'text' => 'Free domain and free daily backups' ),
				),
				'cons'         => array(
					array( 'text' => 'Limited scalability' ),
				),
				'score'        => '8.8',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'InMotion Hosting',
				'accent_color' => '#d91f2c',
				'description'  => 'InMotion Hosting is a reliable option for those seeking the best web hosting, with a strong focus on security and performance for business or personal websites.',
				'pros'         => array(
					array( 'text' => 'Performance-enhancing features' ),
					array( 'text' => 'BoldGrid website builder for WordPress' ),
					array( 'text' => 'Free SSL and DDoS protection' ),
				),
				'cons'         => array(
					array( 'text' => 'High prices' ),
				),
				'score'        => '8.6',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'WIX',
				'accent_color' => '#111111',
				'description'  => 'Wix is amazing when it comes to getting your website online with secure hosting, fast load times, built-in SEO tools, customizable templates, and 24/7 support.',
				'pros'         => array(
					array( 'text' => 'Free domain, SSL' ),
					array( 'text' => 'Automated backups' ),
					array( 'text' => 'Advanced security monitoring' ),
				),
				'cons'         => array(
					array( 'text' => 'Limited hosting options' ),
				),
				'score'        => '8.5',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
			),
			array(
				'name'         => 'Elementor',
				'accent_color' => '#92003b',
				'description'  => 'Elementor excels in beginner-friendly, fully-managed WordPress hosting, ensuring fast-loading sites with custom caching tools for optimal performance.',
				'pros'         => array(
					array( 'text' => 'Firewall protection' ),
					array( 'text' => '14-day backups' ),
					array( 'text' => 'SSL certificate is included' ),
				),
				'cons'         => array(
					array( 'text' => 'Limited free version' ),
				),
				'score'        => '8.4',
				'score_label'  => 'Good',
				'button_label' => 'Visit Site',
				'button_url'   => '#',
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
			$providers[ $index ]['name']         = ! empty( $provider['name'] ) ? $provider['name'] : 'Hosting Provider';
			$providers[ $index ]['accent_color'] = ! empty( $provider['accent_color'] ) ? $provider['accent_color'] : '#673de6';
			$providers[ $index ]['pros']         = ! empty( $provider['pros'] ) && is_array( $provider['pros'] ) ? $provider['pros'] : array();
			$providers[ $index ]['cons']         = ! empty( $provider['cons'] ) && is_array( $provider['cons'] ) ? $provider['cons'] : array();
			$providers[ $index ]['score']        = ! empty( $provider['score'] ) ? $provider['score'] : '9.0';
			$providers[ $index ]['score_label']  = ! empty( $provider['score_label'] ) ? $provider['score_label'] : 'Good';
			$providers[ $index ]['button_label'] = ! empty( $provider['button_label'] ) ? $provider['button_label'] : 'Visit Site';
			$providers[ $index ]['button_url']   = ! empty( $provider['button_url'] ) ? $provider['button_url'] : '#';
		}

		return $providers;
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

if ( ! function_exists( 'hosting_landing_brand_logo' ) ) {
	function hosting_landing_brand_logo( $name, $logo = null, $accent_color = '#673de6', $class = 'hosting-brand-logo' ) {
		$color = sanitize_hex_color( $accent_color );
		$style = $color ? ' style="--brand-color:' . esc_attr( $color ) . '"' : '';
		?>
		<div class="<?php echo esc_attr( $class ); ?>"<?php echo $style; ?>>
			<?php if ( is_array( $logo ) && ! empty( $logo['url'] ) ) : ?>
				<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
			<?php else : ?>
				<span class="<?php echo esc_attr( $class ); ?>__mark"><?php echo esc_html( hosting_landing_get_initials( $name ) ); ?></span>
				<strong><?php echo esc_html( $name ); ?></strong>
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
			'title'                 => 'Hosting Landing - 01 Header & Hero',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_header_tab', 'Header', '', 'tab' ),
				hosting_landing_field( 'field_hosting_header_logo', 'Logo image', 'hosting_header_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				hosting_landing_field( 'field_hosting_header_logo_text', 'Logo text', 'hosting_header_logo_text', 'text', array( 'default_value' => 'cybernews*' ) ),
				hosting_landing_field( 'field_hosting_header_disclosure_label', 'Disclosure label', 'hosting_disclosure_label', 'text', array( 'default_value' => 'Advertiser disclosure', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_header_disclosure_url', 'Disclosure URL', 'hosting_disclosure_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_hero_tab', 'Hero copy', '', 'tab' ),
				hosting_landing_field( 'field_hosting_hero_updated', 'Updated label', 'hosting_hero_updated', 'text', array( 'default_value' => 'Updated: July 2026' ) ),
				hosting_landing_field( 'field_hosting_hero_title', 'Title', 'hosting_hero_title', 'textarea', array( 'rows' => 2, 'default_value' => 'Best Web Hosting Services' ) ),
				hosting_landing_field( 'field_hosting_hero_intro', 'Intro', 'hosting_hero_intro', 'textarea', array( 'rows' => 3, 'default_value' => 'If you are looking to run a personal blog, business landing page, or even an online store, a reliable and affordable hosting service is what you need. Check our list of best web hosting solutions to find the one best suited for your needs.' ) ),
				hosting_landing_field( 'field_hosting_top_tab', 'Hero top provider bar', '', 'tab' ),
				hosting_landing_field( 'field_hosting_top_logo', 'Provider logo', 'hosting_top_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				hosting_landing_field( 'field_hosting_top_name', 'Provider name', 'hosting_top_name', 'text', array( 'default_value' => 'Hostinger', 'wrapper' => array( 'width' => '35' ) ) ),
				hosting_landing_field( 'field_hosting_top_color', 'Brand color', 'hosting_top_color', 'color_picker', array( 'default_value' => '#673de6', 'wrapper' => array( 'width' => '15' ) ) ),
				hosting_landing_field( 'field_hosting_top_rank_label', 'Rank label', 'hosting_top_rank_label', 'text', array( 'default_value' => 'Hosting ranking', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_rank', 'Rank value', 'hosting_top_rank', 'text', array( 'default_value' => '#1', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_score_label', 'Score label', 'hosting_top_score_label', 'text', array( 'default_value' => 'Score', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_score', 'Score value', 'hosting_top_score', 'text', array( 'default_value' => '9.9', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_deal_label', 'Deal label', 'hosting_top_deal_label', 'text', array( 'default_value' => 'Current deal', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_deal', 'Deal value', 'hosting_top_deal', 'text', array( 'default_value' => '81% OFF', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_top_cta_label', 'CTA label', 'hosting_top_cta_label', 'text', array( 'default_value' => 'Get Hostinger deal now', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_top_cta_url', 'CTA URL', 'hosting_top_cta_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_promo_tab', 'Yellow promo strip', '', 'tab' ),
				hosting_landing_field( 'field_hosting_promo_text', 'Promo text', 'hosting_promo_text', 'text', array( 'default_value' => 'Free domain for the 1st year + get 81% OFF + free months' ) ),
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
			'title'                 => 'Hosting Landing - 02 Provider Ranking',
			'fields'                => array(
				hosting_landing_field(
					'field_hosting_providers',
					'Hosting providers',
					'hosting_providers',
					'repeater',
					array(
						'layout'       => 'block',
						'button_label' => 'Add provider',
						'sub_fields'   => array(
							hosting_landing_field( 'field_hosting_provider_name', 'Provider name', 'name', 'text', array( 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_provider_logo', 'Logo', 'logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_provider_color', 'Brand color', 'accent_color', 'color_picker', array( 'default_value' => '#673de6', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_provider_badge', 'Featured badge', 'featured_badge', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_deal_note', 'Small deal label', 'deal_note', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_desc', 'Description', 'description', 'textarea', array( 'rows' => 3 ) ),
							hosting_landing_text_repeater( 'field_hosting_provider_pros', 'Green checklist items', 'pros', 'Add green item' ),
							hosting_landing_text_repeater( 'field_hosting_provider_cons', 'Gray limitation items', 'cons', 'Add limitation' ),
							hosting_landing_field( 'field_hosting_provider_score', 'Score', 'score', 'text', array( 'default_value' => '9.0', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_score_label', 'Score label', 'score_label', 'text', array( 'default_value' => 'Good', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_button_label', 'Button label', 'button_label', 'text', array( 'default_value' => 'Visit Site', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_button_url', 'Button URL', 'button_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_quote_text', 'Featured quote text', 'quote_text', 'textarea', array( 'rows' => 2 ) ),
							hosting_landing_field( 'field_hosting_provider_quote_author', 'Quote author', 'quote_author', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_quote_role', 'Quote role', 'quote_role', 'text', array( 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_provider_money_back', 'Money-back guarantee', 'money_back', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_storage', 'Storage', 'storage', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_support', '24/7 support', 'support', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_provider_ssl', 'Free SSL certificate', 'ssl', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
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
			'title'                 => 'Hosting Landing - 03 FAQ',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_faq_title', 'FAQ title', 'hosting_faq_title', 'text', array( 'default_value' => 'Frequently Asked Questions' ) ),
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
			'title'                 => 'Hosting Landing - 04 Editor Picks, Footer & Sticky',
			'fields'                => array(
				hosting_landing_field( 'field_hosting_editor_tab', 'Editor picks', '', 'tab' ),
				hosting_landing_field( 'field_hosting_editor_title', 'Section title', 'hosting_editor_title', 'text', array( 'default_value' => "Editors' Picks" ) ),
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
							hosting_landing_field( 'field_hosting_editor_name', 'Provider name', 'name', 'text', array( 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_editor_logo', 'Logo', 'logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail', 'wrapper' => array( 'width' => '35' ) ) ),
							hosting_landing_field( 'field_hosting_editor_color', 'Brand color', 'accent_color', 'color_picker', array( 'default_value' => '#673de6', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_deal_note', 'Top badge', 'deal_note' ),
							hosting_landing_field( 'field_hosting_editor_score', 'Score', 'score', 'text', array( 'default_value' => '9.0', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_score_label', 'Score label', 'score_label', 'text', array( 'default_value' => 'Good', 'wrapper' => array( 'width' => '30' ) ) ),
							hosting_landing_field( 'field_hosting_editor_description', 'Description', 'description', 'textarea', array( 'rows' => 3 ) ),
							hosting_landing_field( 'field_hosting_editor_money_back', 'Money-back guarantee', 'money_back', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_storage', 'Storage', 'storage', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_support', '24/7 support', 'support', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_ssl', 'Free SSL certificate', 'ssl', 'text', array( 'wrapper' => array( 'width' => '25' ) ) ),
							hosting_landing_field( 'field_hosting_editor_button_label', 'Button label', 'button_label', 'text', array( 'default_value' => 'Visit Site', 'wrapper' => array( 'width' => '50' ) ) ),
							hosting_landing_field( 'field_hosting_editor_button_url', 'Button URL', 'button_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
						),
					)
				),
				hosting_landing_field( 'field_hosting_footer_tab', 'Footer', '', 'tab' ),
				hosting_landing_field( 'field_hosting_footer_logo', 'Footer logo', 'hosting_footer_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'medium' ) ),
				hosting_landing_field( 'field_hosting_footer_logo_text', 'Footer logo text', 'hosting_footer_logo_text', 'text', array( 'default_value' => 'cybernews*' ) ),
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
				hosting_landing_field( 'field_hosting_footer_copyright', 'Copyright', 'hosting_footer_copyright', 'text', array( 'default_value' => '(c) 2026 Cybernews - Latest Cybersecurity and Tech News, Research & Analysis' ) ),
				hosting_landing_field( 'field_hosting_sticky_tab', 'Sticky bottom offer', '', 'tab' ),
				hosting_landing_field( 'field_hosting_sticky_enabled', 'Enable sticky offer', 'hosting_sticky_enabled', 'true_false', array( 'default_value' => 1, 'ui' => 1 ) ),
				hosting_landing_field( 'field_hosting_sticky_logo', 'Sticky logo', 'hosting_sticky_logo', 'image', array( 'return_format' => 'array', 'preview_size' => 'thumbnail' ) ),
				hosting_landing_field( 'field_hosting_sticky_name', 'Provider name', 'hosting_sticky_name', 'text', array( 'default_value' => 'Hostinger', 'wrapper' => array( 'width' => '35' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_color', 'Brand color', 'hosting_sticky_color', 'color_picker', array( 'default_value' => '#673de6', 'wrapper' => array( 'width' => '15' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_badge', 'Badge', 'hosting_sticky_badge', 'text', array( 'default_value' => 'Best overall', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_text', 'Offer text', 'hosting_sticky_text', 'text', array( 'default_value' => 'Best deal in hosting - GET 81% OFF + free months', 'wrapper' => array( 'width' => '25' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_cta_label', 'Button label', 'hosting_sticky_cta_label', 'text', array( 'default_value' => 'Get Hostinger', 'wrapper' => array( 'width' => '50' ) ) ),
				hosting_landing_field( 'field_hosting_sticky_cta_url', 'Button URL', 'hosting_sticky_cta_url', 'text', array( 'default_value' => '#', 'wrapper' => array( 'width' => '50' ) ) ),
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
