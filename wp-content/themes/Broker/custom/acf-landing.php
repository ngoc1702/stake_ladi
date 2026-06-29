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
		get_template_part( 'template-parts/featured-offer' );
		get_template_part( 'template-parts/discounts' );
		get_template_part( 'template-parts/firms-table' );
		get_template_part( 'template-parts/reviews' );
		get_template_part( 'template-parts/footer' );
		get_template_part( 'template-parts/popup' );
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
/**
 * Dang ky nhom truong ACF cho Section Discounts.
 */
add_action( 'acf/init', 'caia_register_landing_featured_offer_fields' );
function caia_register_landing_featured_offer_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_featured_offer',
		'title'    => 'Landing Page - Featured Offer',
		'fields'   => array(
			array(
				'key'           => 'field_featured_offer_enabled',
				'label'         => 'Hien section',
				'name'          => 'featured_offer_enabled',
				'type'          => 'true_false',
				'default_value' => 1,
				'ui'            => 1,
			),
			array(
				'key'           => 'field_featured_offer_eyebrow',
				'label'         => 'Nhan nho',
				'name'          => 'featured_offer_eyebrow',
				'type'          => 'text',
				'default_value' => '#1 Trader-Rated Prop Firm',
			),
			array(
				'key'           => 'field_featured_offer_highlight',
				'label'         => 'Dong tieu de mau mint',
				'name'          => 'featured_offer_highlight',
				'type'          => 'text',
				'default_value' => 'Apex Trader Funding',
				'wrapper'       => array( 'width' => '40' ),
			),
			array(
				'key'           => 'field_featured_offer_title',
				'label'         => 'Tieu de chinh',
				'name'          => 'featured_offer_title',
				'type'          => 'textarea',
				'rows'          => 2,
				'default_value' => 'The Smartest Way To Get Funded In 2026',
				'wrapper'       => array( 'width' => '60' ),
			),
			array(
				'key'          => 'field_featured_offer_desc',
				'label'        => 'Mo ta',
				'name'         => 'featured_offer_desc',
				'type'         => 'wysiwyg',
				'tabs'         => 'visual',
				'toolbar'      => 'basic',
				'media_upload' => 0,
			),
			array(
				'key'           => 'field_featured_offer_coupon_label',
				'label'         => 'Label coupon',
				'name'          => 'featured_offer_coupon_label',
				'type'          => 'text',
				'default_value' => 'Apex Trader Funding Code',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_featured_offer_coupon_badge',
				'label'         => 'Badge coupon',
				'name'          => 'featured_offer_coupon_badge',
				'type'          => 'text',
				'default_value' => 'Up To 90% Off',
				'wrapper'       => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_featured_offer_coupon_code',
				'label'         => 'Coupon code',
				'name'          => 'featured_offer_coupon_code',
				'type'          => 'text',
				'default_value' => 'ONKAGNVZ',
				'wrapper'       => array( 'width' => '20' ),
			),
			array(
				'key'         => 'field_featured_offer_coupon_url',
				'label'       => 'Link nut discount',
				'name'        => 'featured_offer_coupon_url',
				'type'        => 'text',
				'placeholder' => '#',
				'wrapper'     => array( 'width' => '20' ),
			),
			array(
				'key'           => 'field_featured_offer_coupon_button',
				'label'         => 'Text nut discount',
				'name'          => 'featured_offer_coupon_button',
				'type'          => 'text',
				'default_value' => 'Get Apex Trader Funding Discount',
			),
			array(
				'key'          => 'field_featured_offer_prices',
				'label'        => 'Gia trong coupon card',
				'name'         => 'featured_offer_prices',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Them gia',
				'sub_fields'   => array(
					array(
						'key'   => 'field_featured_offer_price_label',
						'label' => 'Ten goi',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_featured_offer_price',
						'label' => 'Gia moi',
						'name'  => 'price',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_featured_offer_old_price',
						'label' => 'Gia cu',
						'name'  => 'old_price',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'           => 'field_featured_offer_visual',
				'label'         => 'Anh/logo ben phai',
				'name'          => 'featured_offer_visual',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'library'       => 'all',
			),
			array(
				'key'           => 'field_featured_offer_visual_title',
				'label'         => 'Ten thuong hieu ben phai',
				'name'          => 'featured_offer_visual_title',
				'type'          => 'text',
				'default_value' => 'Apex Trader Funding',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_featured_offer_visual_subtitle',
				'label'         => 'Dong phu ben phai',
				'name'          => 'featured_offer_visual_subtitle',
				'type'          => 'text',
				'default_value' => 'The #1 Futures Prop Firm',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_featured_offer_rating',
				'label'         => 'Dong rating/review',
				'name'          => 'featured_offer_rating',
				'type'          => 'text',
				'default_value' => '4.3/5 - 20,000+ Trustpilot Reviews',
			),
			array(
				'key'           => 'field_featured_offer_metric',
				'label'         => 'So thong ke lon',
				'name'          => 'featured_offer_metric',
				'type'          => 'text',
				'default_value' => '$812M+',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_featured_offer_metric_label',
				'label'         => 'Mo ta so thong ke lon',
				'name'          => 'featured_offer_metric_label',
				'type'          => 'text',
				'default_value' => 'Paid By Apex Trader Funding Since 2022',
				'wrapper'       => array( 'width' => '65' ),
			),
			array(
				'key'           => 'field_featured_offer_progress_label',
				'label'         => 'Label thanh tien do',
				'name'          => 'featured_offer_progress_label',
				'type'          => 'text',
				'default_value' => 'Avg Monthly Payouts To Traders',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_featured_offer_progress_value',
				'label'         => 'Gia tri thanh tien do',
				'name'          => 'featured_offer_progress_value',
				'type'          => 'text',
				'default_value' => '$14.91M',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_featured_offer_stats',
				'label'        => 'O thong ke ben phai',
				'name'         => 'featured_offer_stats',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Them thong ke',
				'sub_fields'   => array(
					array(
						'key'   => 'field_featured_offer_stat_value',
						'label' => 'Gia tri',
						'name'  => 'value',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_featured_offer_stat_label',
						'label' => 'Mo ta',
						'name'  => 'label',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'           => 'field_featured_offer_review_button',
				'label'         => 'Text nut review',
				'name'          => 'featured_offer_review_button',
				'type'          => 'text',
				'default_value' => 'Read Full Apex Trader Funding Review',
				'wrapper'       => array( 'width' => '45' ),
			),
			array(
				'key'         => 'field_featured_offer_review_url',
				'label'       => 'Link nut review',
				'name'        => 'featured_offer_review_url',
				'type'        => 'text',
				'placeholder' => '#',
				'wrapper'     => array( 'width' => '55' ),
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
		'description'           => 'Quan tri section offer noi bat ngay duoi banner.',
	) );
}

add_action( 'acf/init', 'caia_register_landing_discounts_fields' );
function caia_register_landing_discounts_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_discounts',
		'title'    => 'Landing Page - Section Discounts',
		'fields'   => array(
			array(
				'key'           => 'field_discounts_title',
				'label'         => 'Tieu de section',
				'name'          => 'discounts_title',
				'type'          => 'text',
				'default_value' => 'Best Prop Firm Discounts',
			),
			array(
				'key'          => 'field_discounts_list',
				'label'        => 'Danh sach discount',
				'name'         => 'discounts_list',
				'type'         => 'repeater',
				'instructions' => 'Moi dong la 1 card discount. Upload logo va anh coupon neu co; de trong se dung fallback mac dinh.',
				'layout'       => 'row',
				'button_label' => 'Them discount',
				'sub_fields'   => array(
					array(
						'key'           => 'field_discount_logo',
						'label'         => 'Logo',
						'name'          => 'logo',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'medium',
						'library'       => 'all',
						'wrapper'       => array( 'width' => '30' ),
					),
					array(
						'key'     => 'field_discount_name',
						'label'   => 'Ten firm',
						'name'    => 'name',
						'type'    => 'text',
						'wrapper' => array( 'width' => '35' ),
					),
					array(
						'key'         => 'field_discount_amount',
						'label'       => 'Muc giam',
						'name'        => 'amount',
						'type'        => 'text',
						'placeholder' => '90%',
						'wrapper'     => array( 'width' => '15' ),
					),
					array(
						'key'         => 'field_discount_code',
						'label'       => 'Coupon code',
						'name'        => 'code',
						'type'        => 'text',
						'placeholder' => 'FUNDEDPROGRAM',
						'wrapper'     => array( 'width' => '20' ),
					),
					array(
						'key'           => 'field_discount_image',
						'label'         => 'Anh coupon',
						'name'          => 'image',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'medium',
						'library'       => 'all',
						'instructions'  => 'Ty le khuyen nghi 16:9 hoac gan 750x395 nhu anh mau.',
						'wrapper'       => array( 'width' => '50' ),
					),
					array(
						'key'           => 'field_discount_button_label',
						'label'         => 'Text nut',
						'name'          => 'button_label',
						'type'          => 'text',
						'default_value' => 'Get Discount',
						'wrapper'       => array( 'width' => '25' ),
					),
					array(
						'key'         => 'field_discount_url',
						'label'       => 'Link nut',
						'name'        => 'url',
						'type'        => 'text',
						'placeholder' => '#',
						'wrapper'     => array( 'width' => '25' ),
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
		'menu_order'            => 2,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quan tri section Best Prop Firm Discounts.',
	) );
}

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
		'menu_order'            => 3,
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
add_action( 'acf/init', 'caia_register_landing_reviews_fields' );
function caia_register_landing_reviews_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_reviews',
		'title'    => 'Landing Page - Reviews',
		'fields'   => array(
			array(
				'key'           => 'field_reviews_title',
				'label'         => 'Tieu de section',
				'name'          => 'reviews_title',
				'type'          => 'text',
				'default_value' => 'Prop Firm Reviews',
			),
			array(
				'key'          => 'field_reviews_intro',
				'label'        => 'Mo ta ngan',
				'name'         => 'reviews_intro',
				'type'         => 'textarea',
				'rows'         => 2,
				'new_lines'    => '',
			),
			array(
				'key'          => 'field_reviews_list',
				'label'        => 'Danh sach bai review',
				'name'         => 'reviews_list',
				'type'         => 'repeater',
				'instructions' => 'Moi dong la 1 bai review. Co the them anh, thong tin chung, nhieu block noi dung va link Read More.',
				'layout'       => 'block',
				'button_label' => 'Them bai review',
				'sub_fields'   => array(
					array(
						'key'           => 'field_review_title',
						'label'         => 'Ten bai / ten firm',
						'name'          => 'title',
						'type'          => 'text',
						'default_value' => 'Apex Trader Funding',
					),
					array(
						'key'           => 'field_review_image',
						'label'         => 'Anh lon',
						'name'          => 'image',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'large',
						'library'       => 'all',
						'instructions'  => 'Anh screenshot/khoi lon nhu hinh mau.',
					),
					array(
						'key'           => 'field_review_badge',
						'label'         => 'Nhan thong tin chung',
						'name'          => 'badge',
						'type'          => 'text',
						'default_value' => "Editor's Pick - June 2026",
						'wrapper'       => array( 'width' => '35' ),
					),
					array(
						'key'           => 'field_review_headline',
						'label'         => 'Tieu de thong tin chung',
						'name'          => 'headline',
						'type'          => 'text',
						'default_value' => 'Apex Trader Funding 90% Discount',
						'wrapper'       => array( 'width' => '45' ),
					),
					array(
						'key'           => 'field_review_coupon',
						'label'         => 'Coupon code',
						'name'          => 'coupon',
						'type'          => 'text',
						'default_value' => 'ONKAGNVZ',
						'wrapper'       => array( 'width' => '20' ),
					),
					array(
						'key'          => 'field_review_intro_content',
						'label'        => 'Noi dung thong tin chung',
						'name'         => 'intro_content',
						'type'         => 'wysiwyg',
						'tabs'         => 'visual',
						'toolbar'      => 'basic',
						'media_upload' => 0,
					),
					array(
						'key'          => 'field_review_blocks',
						'label'        => 'Cac muc noi dung',
						'name'         => 'blocks',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Them muc',
						'sub_fields'   => array(
							array(
								'key'         => 'field_review_block_icon',
								'label'       => 'Icon Font Awesome',
								'name'        => 'icon',
								'type'        => 'text',
								'placeholder' => 'fas fa-shield-halved',
								'wrapper'     => array( 'width' => '25' ),
							),
							array(
								'key'     => 'field_review_block_title',
								'label'   => 'Tieu de muc',
								'name'    => 'title',
								'type'    => 'text',
								'wrapper' => array( 'width' => '75' ),
							),
							array(
								'key'          => 'field_review_block_content',
								'label'        => 'Noi dung muc',
								'name'         => 'content',
								'type'         => 'wysiwyg',
								'tabs'         => 'visual',
								'toolbar'      => 'basic',
								'media_upload' => 0,
							),
							array(
								'key'          => 'field_review_block_prices',
								'label'        => 'Bang gia trong muc (tuy chon)',
								'name'         => 'prices',
								'type'         => 'repeater',
								'layout'       => 'table',
								'button_label' => 'Them gia',
								'sub_fields'   => array(
									array(
										'key'   => 'field_review_price_label',
										'label' => 'Ten goi',
										'name'  => 'label',
										'type'  => 'text',
									),
									array(
										'key'   => 'field_review_price_old',
										'label' => 'Gia cu',
										'name'  => 'old_price',
										'type'  => 'text',
									),
									array(
										'key'   => 'field_review_price_new',
										'label' => 'Gia moi',
										'name'  => 'price',
										'type'  => 'text',
									),
								),
							),
						),
					),
					array(
						'key'           => 'field_review_read_more_label',
						'label'         => 'Text nut Read More',
						'name'          => 'read_more_label',
						'type'          => 'text',
						'default_value' => 'Read More',
						'wrapper'       => array( 'width' => '30' ),
					),
					array(
						'key'         => 'field_review_read_more_url',
						'label'       => 'Link Read More',
						'name'        => 'read_more_url',
						'type'        => 'text',
						'placeholder' => '#',
						'wrapper'     => array( 'width' => '70' ),
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
		'menu_order'            => 4,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quan tri section cac bai review tren landing.',
	) );
}

add_action( 'acf/init', 'caia_register_landing_popup_fields' );
function caia_register_landing_popup_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_landing_popup',
		'title'    => 'Landing Page - Popup',
		'fields'   => array(
			array(
				'key'           => 'field_popup_enabled',
				'label'         => 'Hien popup',
				'name'          => 'popup_enabled',
				'type'          => 'true_false',
				'instructions'  => 'Bat de popup hien khi load trang, tat de an popup.',
				'default_value' => 1,
				'ui'            => 1,
			),
			array(
				'key'           => 'field_popup_logo',
				'label'         => 'Logo popup',
				'name'          => 'popup_logo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'library'       => 'all',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_popup_brand_text',
				'label'         => 'Ten thuong hieu',
				'name'          => 'popup_brand_text',
				'type'          => 'text',
				'default_value' => 'APEX TRADER FUNDING',
				'wrapper'       => array( 'width' => '65' ),
			),
			array(
				'key'           => 'field_popup_eyebrow',
				'label'         => 'Nhan nho',
				'name'          => 'popup_eyebrow',
				'type'          => 'text',
				'default_value' => 'Exclusive Limited Offer',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_popup_title',
				'label'         => 'Tieu de',
				'name'          => 'popup_title',
				'type'          => 'text',
				'default_value' => 'Apex Trader Funding Discount',
				'wrapper'       => array( 'width' => '65' ),
			),
			array(
				'key'           => 'field_popup_discount_number',
				'label'         => 'So giam gia',
				'name'          => 'popup_discount_number',
				'type'          => 'text',
				'default_value' => '90',
				'wrapper'       => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_popup_discount_suffix',
				'label'         => 'Hau to giam gia',
				'name'          => 'popup_discount_suffix',
				'type'          => 'text',
				'default_value' => '% OFF',
				'wrapper'       => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_popup_code',
				'label'         => 'Coupon code',
				'name'          => 'popup_code',
				'type'          => 'text',
				'default_value' => 'ONKAGNVZ',
				'wrapper'       => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_popup_code_label',
				'label'         => 'Label coupon',
				'name'          => 'popup_code_label',
				'type'          => 'text',
				'default_value' => 'Your exclusive discount code',
				'wrapper'       => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_popup_subtitle',
				'label'         => 'Mo ta ngan',
				'name'          => 'popup_subtitle',
				'type'          => 'text',
				'default_value' => 'Get funded for under $20, the #1 rated futures prop firm in 2026',
			),
			array(
				'key'           => 'field_popup_code_hint',
				'label'         => 'Ghi chu coupon',
				'name'          => 'popup_code_hint',
				'type'          => 'text',
				'default_value' => 'Copy the code and apply it at checkout',
			),
			array(
				'key'          => 'field_popup_plans',
				'label'        => 'Bang gia trong popup',
				'name'         => 'popup_plans',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Them goi gia',
				'sub_fields'   => array(
					array(
						'key'   => 'field_popup_plan_label',
						'label' => 'Ten goi',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_popup_plan_price',
						'label' => 'Gia moi',
						'name'  => 'price',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_popup_plan_old_price',
						'label' => 'Gia cu',
						'name'  => 'old_price',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'          => 'field_popup_features',
				'label'        => 'Badge loi ich',
				'name'         => 'popup_features',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Them badge',
				'sub_fields'   => array(
					array(
						'key'   => 'field_popup_feature_text',
						'label' => 'Noi dung',
						'name'  => 'text',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'           => 'field_popup_cta_label',
				'label'         => 'Text nut CTA',
				'name'          => 'popup_cta_label',
				'type'          => 'text',
				'default_value' => 'Claim 90% Off, Get Funded Now',
				'wrapper'       => array( 'width' => '35' ),
			),
			array(
				'key'           => 'field_popup_cta_note',
				'label'         => 'Ghi chu duoi CTA',
				'name'          => 'popup_cta_note',
				'type'          => 'text',
				'default_value' => 'Apply the code at checkout - apextraderfunding.com',
				'wrapper'       => array( 'width' => '40' ),
			),
			array(
				'key'         => 'field_popup_cta_url',
				'label'       => 'Link CTA',
				'name'        => 'popup_cta_url',
				'type'        => 'text',
				'placeholder' => '#',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_popup_trust_text',
				'label'         => 'Dong trust/review',
				'name'          => 'popup_trust_text',
				'type'          => 'text',
				'default_value' => '4.3/5 - 20,000+ Trustpilot reviews - 100k+ funded traders worldwide',
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
		'menu_order'            => 5,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'description'           => 'Quan tri popup discount hien khi load trang landing.',
	) );
}

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
				'default_value' => '+1 (888) 123-4567',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_ft_email',
				'label'       => 'Email',
				'name'        => 'ft_email',
				'type'        => 'text',
				'default_value' => 'support@fundedprogram.com',
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
						'key'         => 'field_ft_social_label',
						'label'       => 'Label',
						'name'        => 'label',
						'type'        => 'text',
						'placeholder' => 'Facebook',
					),
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
