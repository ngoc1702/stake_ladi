<?php
/**
 * ACF cấu hình cho Landing Page (template: page-landing.php)
 *
 * - Đăng ký nhóm trường ACF cho Section Banner (dễ quản trị)
 * - Định nghĩa hàm render template parts cho landing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render các template-parts của trang landing.
 * Được gọi trong page-landing.php
 */
if ( ! function_exists( 'hotel_landing_render_parts' ) ) {
	function hotel_landing_render_parts() {
		// Mỗi section là 1 file trong /template-parts
		get_template_part( 'template-parts/header' );
		get_template_part( 'template-parts/banner' );
		get_template_part( 'template-parts/firms-table' );
		get_template_part( 'template-parts/footer' );
	}
}

/**
 * Đăng ký nhóm trường ACF cho Section Banner.
 */
add_action( 'acf/init', 'caia_register_landing_banner_fields' );
function caia_register_landing_banner_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_banner',
		'title'    => 'Landing Page — Section Banner',
		'fields'   => array(

			/* ============ CỘT TRÁI ============ */
			array(
				'key'     => 'field_banner_tab_left',
				'label'   => '◀ Nội dung chính (cột trái)',
				'name'    => '',
				'type'    => 'tab',
			),
			array(
				'key'          => 'field_banner_badges',
				'label'        => 'Nhãn nhỏ (badges)',
				'name'         => 'banner_badges',
				'type'         => 'repeater',
				'instructions' => 'Các nhãn nhỏ phía trên tiêu đề, ví dụ: UPDATED 2026, Top 25 List...',
				'layout'       => 'table',
				'button_label' => 'Thêm nhãn',
				'sub_fields'   => array(
					array(
						'key'   => 'field_banner_badge_text',
						'label' => 'Nội dung',
						'name'  => 'text',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'          => 'field_banner_title',
				'label'        => 'Tiêu đề lớn',
				'name'         => 'banner_title',
				'type'         => 'textarea',
				'instructions' => 'Tiêu đề chính của banner.',
				'rows'         => 3,
				'new_lines'    => '',
			),
			array(
				'key'          => 'field_banner_desc',
				'label'        => 'Mô tả',
				'name'         => 'banner_desc',
				'type'         => 'wysiwyg',
				'instructions' => 'Đoạn mô tả. Bôi đậm (Bold) những từ muốn nhấn mạnh.',
				'tabs'         => 'visual',
				'toolbar'      => 'basic',
				'media_upload' => 0,
			),
			array(
				'key'          => 'field_banner_filters',
				'label'        => 'Nút lọc nhanh',
				'name'         => 'banner_filters',
				'type'         => 'repeater',
				'instructions' => 'Các nút bo tròn có chấm tròn, ví dụ: Best Evaluation Programs...',
				'layout'       => 'table',
				'button_label' => 'Thêm nút lọc',
				'sub_fields'   => array(
					array(
						'key'   => 'field_banner_filter_label',
						'label' => 'Tên nút',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_banner_filter_url',
						'label' => 'Liên kết',
						'name'  => 'url',
						'type'  => 'text',
						'placeholder' => '#hoặc-link',
					),
				),
			),
			array(
				'key'          => 'field_banner_stats',
				'label'        => 'Số liệu nổi bật',
				'name'         => 'banner_stats',
				'type'         => 'repeater',
				'instructions' => 'Ví dụ: 25 / firms compared.',
				'layout'       => 'table',
				'button_label' => 'Thêm số liệu',
				'sub_fields'   => array(
					array(
						'key'   => 'field_banner_stat_number',
						'label' => 'Con số',
						'name'  => 'number',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_banner_stat_label',
						'label' => 'Mô tả',
						'name'  => 'label',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'          => 'field_banner_ctas',
				'label'        => 'Nút kêu gọi (CTA)',
				'name'         => 'banner_ctas',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Thêm nút CTA',
				'sub_fields'   => array(
					array(
						'key'   => 'field_banner_cta_label',
						'label' => 'Tên nút',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_banner_cta_url',
						'label' => 'Liên kết',
						'name'  => 'url',
						'type'  => 'text',
						'placeholder' => '#hoặc-link',
					),
					array(
						'key'     => 'field_banner_cta_style',
						'label'   => 'Kiểu',
						'name'    => 'style',
						'type'    => 'select',
						'choices' => array(
							'primary' => 'Nền đặc (chính)',
							'outline' => 'Viền (phụ)',
						),
						'default_value' => 'primary',
					),
				),
			),

			/* ============ CỘT PHẢI (CARD) ============ */
			array(
				'key'     => 'field_banner_tab_right',
				'label'   => '▶ Khung bên phải (card)',
				'name'    => '',
				'type'    => 'tab',
			),
			array(
				'key'     => 'field_card_title',
				'label'   => 'Tiêu đề card',
				'name'    => 'card_title',
				'type'    => 'text',
			),
			array(
				'key'     => 'field_card_intro',
				'label'   => 'Đoạn giới thiệu',
				'name'    => 'card_intro',
				'type'    => 'textarea',
				'rows'    => 3,
			),
			array(
				'key'          => 'field_card_items',
				'label'        => 'Danh sách tiêu chí',
				'name'         => 'card_items',
				'type'         => 'repeater',
				'instructions' => 'Mỗi mục là 1 ô có tiêu đề + mô tả.',
				'layout'       => 'block',
				'button_label' => 'Thêm tiêu chí',
				'sub_fields'   => array(
					array(
						'key'   => 'field_card_item_title',
						'label' => 'Tiêu đề',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_card_item_desc',
						'label' => 'Mô tả',
						'name'  => 'desc',
						'type'  => 'text',
					),
				),
			),

			/* ============ HÀNG DƯỚI CÙNG ============ */
			array(
				'key'     => 'field_banner_tab_bottom',
				'label'   => '▼ Hàng tính năng (dưới cùng)',
				'name'    => '',
				'type'    => 'tab',
			),
			array(
				'key'          => 'field_bottom_features',
				'label'        => 'Các mục tích xanh',
				'name'         => 'bottom_features',
				'type'         => 'repeater',
				'instructions' => 'Các pill có dấu tích ở cuối banner.',
				'layout'       => 'table',
				'button_label' => 'Thêm mục',
				'sub_fields'   => array(
					array(
						'key'   => 'field_bottom_feature_text',
						'label' => 'Nội dung',
						'name'  => 'text',
						'type'  => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-landing.php',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quản trị Section Banner của trang Landing.',
	) );
}

/**
 * Đăng ký nhóm trường ACF cho Section Bảng xếp hạng (Top 25 Prop Firms).
 */
add_action( 'acf/init', 'caia_register_landing_firms_fields' );
function caia_register_landing_firms_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_firms',
		'title'    => 'Landing Page — Section Bảng xếp hạng',
		'fields'   => array(
			array(
				'key'     => 'field_firms_title',
				'label'   => 'Tiêu đề bảng',
				'name'    => 'firms_title',
				'type'    => 'text',
				'default_value' => 'Top 25 Prop Trading Firms & Funding Programs',
			),
			array(
				'key'          => 'field_firms_list',
				'label'        => 'Danh sách công ty',
				'name'         => 'firms_list',
				'type'         => 'repeater',
				'instructions' => 'Mỗi dòng là 1 công ty. Số thứ tự (#) tự động tăng theo vị trí.',
				'layout'       => 'row',
				'button_label' => 'Thêm công ty',
				'sub_fields'   => array(
					array(
						'key'           => 'field_firm_logo',
						'label'         => 'Logo',
						'name'          => 'logo',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'library'       => 'all',
						'wrapper'       => array( 'width' => '20' ),
					),
					array(
						'key'          => 'field_firm_badge',
						'label'        => 'Nhãn nổi bật',
						'name'         => 'highlight_badge',
						'type'         => 'text',
						'instructions' => 'Ví dụ: #1 (để trống nếu không có).',
						'placeholder'  => '#1',
						'wrapper'      => array( 'width' => '20' ),
					),
					array(
						'key'     => 'field_firm_name',
						'label'   => 'Tên công ty',
						'name'    => 'name',
						'type'    => 'text',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'           => 'field_firm_type',
						'label'         => 'Loại',
						'name'          => 'type',
						'type'          => 'text',
						'default_value' => 'Futures',
						'wrapper'       => array( 'width' => '30' ),
					),
					array(
						'key'         => 'field_firm_score',
						'label'       => 'Điểm',
						'name'        => 'score',
						'type'        => 'text',
						'placeholder' => '9.7 / 10',
						'wrapper'     => array( 'width' => '25' ),
					),
					array(
						'key'          => 'field_firm_grade',
						'label'        => 'Hạng',
						'name'         => 'grade',
						'type'         => 'text',
						'instructions' => 'A+, A, A-, B+...',
						'placeholder'  => 'A+',
						'wrapper'      => array( 'width' => '25' ),
					),
					array(
						'key'         => 'field_firm_split',
						'label'       => 'Profit Split',
						'name'        => 'profit_split',
						'type'        => 'text',
						'placeholder' => '100%',
						'wrapper'     => array( 'width' => '25' ),
					),
					array(
						'key'         => 'field_firm_capital',
						'label'       => 'Max Capital',
						'name'        => 'max_capital',
						'type'        => 'text',
						'placeholder' => '$150k',
						'wrapper'     => array( 'width' => '25' ),
					),
					array(
						'key'         => 'field_firm_review_url',
						'label'       => 'Link Read Review',
						'name'        => 'review_url',
						'type'        => 'text',
						'placeholder' => '#',
						'wrapper'     => array( 'width' => '50' ),
					),
					array(
						'key'         => 'field_firm_challenge_url',
						'label'       => 'Link Start Challenge',
						'name'        => 'challenge_url',
						'type'        => 'text',
						'placeholder' => '#',
						'wrapper'     => array( 'width' => '50' ),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'page-landing.php',
				),
			),
		),
		'menu_order'            => 1,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quản trị bảng xếp hạng Top Prop Firms.',
	) );
}

/**
 * Trang tùy chọn (Options Page) cho Header & Footer của Landing.
 */
add_action( 'acf/init', 'caia_register_landing_options_page' );
function caia_register_landing_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}
	acf_add_options_page( array(
		'page_title' => 'Landing — Header & Footer',
		'menu_title' => 'Landing H/F',
		'menu_slug'  => 'landing-hf-settings',
		'capability' => 'edit_theme_options',
		'icon_url'   => 'dashicons-layout',
		'position'   => 59,
		'redirect'   => false,
	) );
}

/**
 * Đăng ký field group cho HEADER & FOOTER (gắn vào Options Page).
 */
add_action( 'acf/init', 'caia_register_landing_hf_fields' );
function caia_register_landing_hf_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_hf',
		'title'    => 'Landing — Header & Footer',
		'fields'   => array(

			/* ============ HEADER ============ */
			array(
				'key'   => 'field_hf_tab_header',
				'label' => 'HEADER',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_hf_logo',
				'label'         => 'Logo',
				'name'          => 'hf_logo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'          => 'field_hf_logo_text',
				'label'        => 'Tên thương hiệu (nếu không dùng logo ảnh)',
				'name'         => 'hf_logo_text',
				'type'         => 'text',
				'placeholder'  => 'FundedProgram',
			),
			array(
				'key'          => 'field_hf_menu',
				'label'        => 'Menu',
				'name'         => 'hf_menu',
				'type'         => 'repeater',
				'instructions' => 'Các mục menu trên header.',
				'layout'       => 'table',
				'button_label' => 'Thêm mục menu',
				'sub_fields'   => array(
					array(
						'key'   => 'field_hf_menu_label',
						'label' => 'Tên',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'         => 'field_hf_menu_url',
						'label'       => 'Liên kết',
						'name'        => 'url',
						'type'        => 'text',
						'placeholder' => '#hoặc-link',
					),
				),
			),
			array(
				'key'     => 'field_hf_btn_label',
				'label'   => 'Nút Contact — Tên',
				'name'    => 'hf_btn_label',
				'type'    => 'text',
				'default_value' => 'Contact',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'         => 'field_hf_btn_url',
				'label'       => 'Nút Contact — Liên kết',
				'name'        => 'hf_btn_url',
				'type'        => 'text',
				'placeholder' => '#contact',
				'wrapper'     => array( 'width' => '50' ),
			),

			/* ============ FOOTER ============ */
			array(
				'key'   => 'field_hf_tab_footer',
				'label' => 'FOOTER',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_ft_logo',
				'label'         => 'Logo footer (tuỳ chọn)',
				'name'          => 'ft_logo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Để trống sẽ dùng logo/tên ở header.',
			),
			array(
				'key'     => 'field_ft_about',
				'label'   => 'Giới thiệu ngắn',
				'name'    => 'ft_about',
				'type'    => 'textarea',
				'rows'    => 3,
			),
			array(
				'key'         => 'field_ft_address',
				'label'       => 'Địa chỉ',
				'name'        => 'ft_address',
				'type'        => 'text',
				'wrapper'     => array( 'width' => '50' ),
			),
			array(
				'key'         => 'field_ft_phone',
				'label'       => 'Điện thoại',
				'name'        => 'ft_phone',
				'type'        => 'text',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_ft_email',
				'label'       => 'Email',
				'name'        => 'ft_email',
				'type'        => 'text',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'          => 'field_ft_links',
				'label'        => 'Liên kết nhanh',
				'name'         => 'ft_links',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Thêm liên kết',
				'sub_fields'   => array(
					array(
						'key'   => 'field_ft_link_label',
						'label' => 'Tên',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'         => 'field_ft_link_url',
						'label'       => 'Liên kết',
						'name'        => 'url',
						'type'        => 'text',
						'placeholder' => '#',
					),
				),
			),
			array(
				'key'          => 'field_ft_socials',
				'label'        => 'Mạng xã hội',
				'name'         => 'ft_socials',
				'type'         => 'repeater',
				'instructions' => 'Icon dùng class Font Awesome, ví dụ: fab fa-facebook-f, fab fa-x-twitter, fab fa-telegram...',
				'layout'       => 'table',
				'button_label' => 'Thêm mạng xã hội',
				'sub_fields'   => array(
					array(
						'key'         => 'field_ft_social_icon',
						'label'       => 'Icon (class)',
						'name'        => 'icon',
						'type'        => 'text',
						'placeholder' => 'fab fa-facebook-f',
					),
					array(
						'key'         => 'field_ft_social_url',
						'label'       => 'Liên kết',
						'name'        => 'url',
						'type'        => 'text',
						'placeholder' => 'https://',
					),
				),
			),
			array(
				'key'           => 'field_ft_copyright',
				'label'         => 'Dòng bản quyền',
				'name'          => 'ft_copyright',
				'type'          => 'text',
				'default_value' => '© 2026 FundedProgram. All rights reserved.',
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'landing-hf-settings',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quản trị Header & Footer của Landing.',
	) );
}
