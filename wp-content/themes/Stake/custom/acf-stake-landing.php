<?php
/** ACF fields and helpers for the Stake landing page. */
if (!defined('ABSPATH')) exit;

add_action('acf/init', 'stake_register_landing_fields');
function stake_register_landing_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    $text = function ($key, $label, $name, $default = '') {
        return array('key'=>$key, 'label'=>$label, 'name'=>$name, 'type'=>'text', 'default_value'=>$default);
    };
    $area = function ($key, $label, $name, $default = '') {
        return array('key'=>$key, 'label'=>$label, 'name'=>$name, 'type'=>'textarea', 'rows'=>4, 'new_lines'=>'wpautop', 'default_value'=>$default);
    };
    $image = function ($key, $label, $name) {
        return array('key'=>$key, 'label'=>$label, 'name'=>$name, 'type'=>'image', 'return_format'=>'array', 'preview_size'=>'medium');
    };
    $link = function ($key, $label, $name) {
        return array('key'=>$key, 'label'=>$label, 'name'=>$name, 'type'=>'link', 'return_format'=>'array');
    };
    $tab = function ($key, $label) { return array('key'=>$key, 'label'=>$label, 'type'=>'tab'); };

    acf_add_local_field_group(array(
        'key'=>'group_stake_landing', 'title'=>'Nội dung Landing Page Stake',
        'fields'=>array(
            $tab('field_stake_tab_hero','1. Hero'),
            $text('field_stake_hero_title','Tiêu đề chính','stake_hero_title','Stake India: Leading Sportsbook & Online Casino Platform in 2026'),
            $area('field_stake_hero_desc','Mô tả','stake_hero_description','Discover a complete entertainment platform with thousands of games, live sports and secure payment options.'),
            $image('field_stake_hero_image','Ảnh hero / giao diện sản phẩm','stake_hero_image'),
            $link('field_stake_login','Nút đăng nhập','stake_login_button'),
            $link('field_stake_register','Nút đăng ký','stake_register_button'),
            array('key'=>'field_stake_socials','label'=>'Đăng ký với','name'=>'stake_socials','type'=>'repeater','layout'=>'table','button_label'=>'Thêm kênh đăng ký','sub_fields'=>array(
                $text('field_stake_social_name','Tên','name'),
                array('key'=>'field_stake_social_logo_svg','label'=>'Mã SVG logo','name'=>'logo_svg','type'=>'textarea','rows'=>4,'new_lines'=>'','placeholder'=>'<svg viewBox="0 0 24 24">...</svg>'),
                $link('field_stake_social_link','Liên kết','link')
            )),

            $tab('field_stake_tab_games','2. Trò chơi'),
            $text('field_stake_promotions_title','Tiêu đề Promotions','stake_promotions_title','Promotions'),
            array('key'=>'field_stake_promotions','label'=>'Danh sách Promotions','name'=>'stake_promotions','type'=>'repeater','layout'=>'block','button_label'=>'Thêm promotion','sub_fields'=>array(
                $text('field_stake_promotion_badge','Nhãn nhỏ','badge'), $text('field_stake_promotion_title','Tiêu đề','title'),
                $area('field_stake_promotion_description','Mô tả','description'), $image('field_stake_promotion_image','Ảnh','image'),
                $text('field_stake_promotion_link_text','Chữ liên kết','link_text','Read more'), $link('field_stake_promotion_link','Liên kết','link')
            )),
            $text('field_stake_games_title','Tiêu đề section','stake_games_title','Trending Games in India'),
            array('key'=>'field_stake_games','label'=>'Danh sách trò chơi','name'=>'stake_games','type'=>'repeater','layout'=>'block','button_label'=>'Thêm trò chơi','sub_fields'=>array(
                $text('field_stake_game_title','Tên trò chơi (dùng cho quản trị)','title'),
                $image('field_stake_game_image','Ảnh nền','image')
            )),
            $text('field_stake_sports_games_title','Tiêu đề nhóm thể thao','stake_sports_games_title','Trending Sports'),
            array('key'=>'field_stake_sports_games','label'=>'Danh sách thể thao','name'=>'stake_sports_games','type'=>'repeater','layout'=>'block','button_label'=>'Thêm thể thao','sub_fields'=>array(
                $text('field_stake_sports_game_title','Tên thể thao (dùng cho quản trị)','title'),
                $image('field_stake_sports_game_image','Ảnh nền','image')
            )),
            $link('field_stake_all_games_button','Nút xem tất cả trò chơi','stake_all_games_button'),

            $tab('field_stake_tab_gallery','3. Thư viện giao diện'),
            $text('field_stake_gallery_title','Tiêu đề section','stake_gallery_title','Stake Casino — Independent Fan Guide & Reviews'),
            $area('field_stake_gallery_intro','Nội dung giới thiệu','stake_gallery_intro','Your independent resource for exploring Stake Casino. Read honest player reviews, discover games and learn about bonuses from a community perspective.'),
            $link('field_stake_gallery_button','Nút truy cập website','stake_gallery_button'),
            $text('field_stake_gallery_rating_label','Nhãn đánh giá','stake_gallery_rating_label','Community Reviews'),
            array('key'=>'field_stake_gallery_rating','label'=>'Điểm đánh giá','name'=>'stake_gallery_rating','type'=>'number','default_value'=>4.8,'min'=>0,'max'=>5,'step'=>0.1),
            $text('field_stake_gallery_rating_note','Ghi chú đánh giá','stake_gallery_rating_note','Based on more than 10,000 player experiences and reviews.'),
            array('key'=>'field_stake_gallery_stats','label'=>'Các chỉ số','name'=>'stake_gallery_stats','type'=>'repeater','layout'=>'table','button_label'=>'Thêm chỉ số','sub_fields'=>array(
                $text('field_stake_gallery_stat_value','Giá trị','value'),
                $text('field_stake_gallery_stat_label','Nhãn','label')
            )),
            $image('field_stake_gallery_feature_image','Ảnh lớn bên phải','stake_gallery_feature_image'),
            array('key'=>'field_stake_gallery','label'=>'Danh sách ảnh','name'=>'stake_gallery','type'=>'repeater','layout'=>'table','button_label'=>'Thêm ảnh','sub_fields'=>array(
                $image('field_stake_gallery_image','Ảnh giao diện','image')
            )),

            $tab('field_stake_tab_features','4. Tính năng'),
            $text('field_stake_features_title','Tiêu đề section','stake_features_title','Why Is Stake Casino So Popular?'),
            $text('field_stake_features_highlight','Phần tiêu đề màu','stake_features_highlight','Stake Casino'),
            $area('field_stake_features_intro','Mô tả','stake_features_intro','Discover the platform features most often highlighted by Stake Casino players.'),
            array('key'=>'field_stake_features','label'=>'Danh sách tính năng','name'=>'stake_features','type'=>'repeater','layout'=>'block','button_label'=>'Thêm tính năng','sub_fields'=>array(
                $image('field_stake_feature_image','Ảnh/icon','image'), $text('field_stake_feature_title','Tiêu đề','title'), $area('field_stake_feature_desc','Mô tả','description')
            )),

            $tab('field_stake_tab_partners','5. Đối tác & đại sứ'),
            $text('field_stake_partners_title','Tiêu đề section','stake_partners_title','Stake Partners & Ambassadors'),
            $text('field_stake_partners_highlight','Phần tiêu đề màu','stake_partners_highlight','Ambassadors'),
            $area('field_stake_partners_intro','Nội dung mở đầu','stake_partners_intro','Stake actively works on improving its reputation and is involved in sponsorship and charitable activities. Global ambassadors include:'),
            array('key'=>'field_stake_partners','label'=>'Danh sách đối tác / đại sứ','name'=>'stake_partners','type'=>'repeater','layout'=>'table','button_label'=>'Thêm đối tác','sub_fields'=>array($text('field_stake_partner_text','Nội dung','text'))),
            $area('field_stake_partners_note','Nội dung cuối','stake_partners_note','Stake also collaborates with clubs and organizations, expanding its audience worldwide.'),
            $image('field_stake_partners_image','Ảnh Partners & Ambassadors','stake_partners_image'),

            $tab('field_stake_tab_bonus','6. Welcome Bonus'),
            $text('field_stake_bonus_title','Tiêu đề section','stake_bonus_title','Stake Welcome Bonus for Sports Bettors and Casino Players'),
            $text('field_stake_bonus_highlight','Phần tiêu đề màu','stake_bonus_highlight','Welcome Bonus'),
            $area('field_stake_bonus_intro','Nội dung mở đầu','stake_bonus_intro','Every player can access ongoing promotions and a weekly lottery:'),
            array('key'=>'field_stake_bonus_items','label'=>'Danh sách quyền lợi','name'=>'stake_bonus_items','type'=>'repeater','layout'=>'table','button_label'=>'Thêm quyền lợi','sub_fields'=>array($text('field_stake_bonus_item','Nội dung','text'))),
            $area('field_stake_bonus_note','Nội dung cuối','stake_bonus_note','Winners are selected during a live broadcast and winning tickets are determined by a random number generator.'),
            $link('field_stake_bonus_button','Nút nhận thưởng','stake_bonus_button'),
            $image('field_stake_bonus_image','Ảnh Welcome Bonus','stake_bonus_image'),

            $tab('field_stake_tab_testimonials','9. Đánh giá người chơi'),
            $text('field_stake_testimonials_title','Phần đầu tiêu đề','stake_testimonials_title','Player'),
            $text('field_stake_testimonials_highlight','Phần tiêu đề màu','stake_testimonials_highlight','Testimonials'),
            $area('field_stake_testimonials_intro','Nội dung giới thiệu','stake_testimonials_intro','Hear from players around the world and discover their experience with Stake.'),
            array('key'=>'field_stake_testimonials','label'=>'Danh sách đánh giá','name'=>'stake_testimonials','type'=>'repeater','layout'=>'block','button_label'=>'Thêm đánh giá','sub_fields'=>array(
                array('key'=>'field_stake_testimonial_rating','label'=>'Số sao','name'=>'rating','type'=>'number','default_value'=>5,'min'=>1,'max'=>5,'step'=>1),
                $image('field_stake_testimonial_avatar','Ảnh người đánh giá','avatar'), $area('field_stake_testimonial_quote','Nội dung đánh giá','quote'), $text('field_stake_testimonial_name','Tên người chơi','name'), $text('field_stake_testimonial_date','Thời gian','date')
            )),

            $tab('field_stake_tab_crypto','10. Thanh toán tiền mã hóa'),
            $text('field_stake_crypto_title','Phần đầu tiêu đề','stake_crypto_title','Payments with'),
            $text('field_stake_crypto_highlight','Phần tiêu đề màu xanh','stake_crypto_highlight','Cryptocurrencies'),
            $area('field_stake_crypto_intro','Nội dung giới thiệu','stake_crypto_intro','Stake supports a wide range of cryptocurrencies for fast and secure transactions.'),
            array('key'=>'field_stake_crypto_items','label'=>'Danh sách tiền mã hóa','name'=>'stake_crypto_items','type'=>'repeater','layout'=>'table','button_label'=>'Thêm tiền mã hóa','sub_fields'=>array(
                $text('field_stake_crypto_name','Tên','name'), $text('field_stake_crypto_symbol','Mã','symbol'), $text('field_stake_crypto_mark','Ký hiệu dự phòng','mark'),
                $image('field_stake_crypto_icon_image','Ảnh icon','icon_image')
            )),

            $tab('field_stake_tab_header','11. Header'),
            $image('field_stake_header_logo','Logo header','stake_header_logo'),
            $text('field_stake_header_brand','Tên thương hiệu dự phòng','stake_header_brand','Stake'),
            $text('field_stake_header_flag','Biểu tượng quốc gia','stake_header_flag','🇮🇳'),
            $link('field_stake_header_login','Nút đăng nhập','stake_header_login'),
            $link('field_stake_header_register','Nút đăng ký','stake_header_register'),

            $tab('field_stake_tab_faq','12. FAQ'),
            $text('field_stake_faq_title','Tiêu đề section','stake_faq_title','Frequently Asked Questions'),
            array('key'=>'field_stake_faq_items','label'=>'Danh sách câu hỏi','name'=>'stake_faq_items','type'=>'repeater','layout'=>'block','button_label'=>'Thêm câu hỏi','sub_fields'=>array(
                $text('field_stake_faq_question','Câu hỏi','question'), $area('field_stake_faq_answer','Câu trả lời','answer')
            )),

            $tab('field_stake_tab_footer','13. Footer'),
            $image('field_stake_footer_logo','Logo footer','stake_footer_logo'),
            $text('field_stake_footer_brand','Tên thương hiệu dự phòng','stake_footer_brand','StakeBonus'),
            $area('field_stake_footer_intro','Nội dung giới thiệu','stake_footer_intro','StakeBonus is an official partner of Stake.com. All content is for informational purposes only and does not promote illegal gambling. Please play responsibly!'),
            $text('field_stake_footer_copyright','Copyright','stake_footer_copyright','©2026 · All rights reserved.'),
            $link('field_stake_footer_partner_link','Liên kết đối tác','stake_footer_partner_link'),
            $text('field_stake_footer_responsible','Cảnh báo độ tuổi','stake_footer_responsible','This site is not suitable for people under 18 years of age!'),
            $text('field_stake_footer_age','Nhãn độ tuổi','stake_footer_age','18'),
            $area('field_stake_footer_disclaimer','Nội dung disclaimer','stake_footer_disclaimer','All trademarks, brand names, and design elements featured on this website are the property of their respective owners and are used with permission from our official partner, Stake.com.'),
        ),
        'location'=>array(array(array('param'=>'page_template','operator'=>'==','value'=>'page-landing.php'))),
        'position'=>'acf_after_title', 'style'=>'seamless', 'active'=>true,
        'description'=>'Toàn bộ nội dung các section của landing page được quản trị tại đây.'
    ));
}

function stake_field($name, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($name);
        if ($value !== null && $value !== false && $value !== '') return $value;
    }
    return $default;
}
function stake_highlighted_title($title, $highlight = '') {
    $title = (string) $title;
    $highlight = trim((string) $highlight);
    if ($highlight === '') return esc_html($title);
    $position = stripos($title, $highlight);
    if ($position === false) return esc_html($title).' <span>'.esc_html($highlight).'</span>';
    return esc_html(substr($title, 0, $position)).'<span>'.esc_html(substr($title, $position, strlen($highlight))).'</span>'.esc_html(substr($title, $position + strlen($highlight)));
}
function stake_link($value, $title, $url = '#') {
    $value = is_array($value) ? $value : array();
    return array('title'=>!empty($value['title'])?$value['title']:$title, 'url'=>!empty($value['url'])?$value['url']:$url, 'target'=>!empty($value['target'])?$value['target']:'_self');
}
function stake_image_url($image) {
    if (is_array($image) && !empty($image['url'])) return $image['url'];
    if (is_numeric($image)) return wp_get_attachment_image_url($image, 'full');
    return is_string($image) ? $image : '';
}
function stake_safe_svg($svg) {
    if (!is_string($svg) || trim($svg) === '') return '';
    if (!class_exists('DOMDocument') || stripos($svg, '<!DOCTYPE') !== false) return '';

    $previous_errors = libxml_use_internal_errors(true);
    $document = new DOMDocument();
    $loaded = $document->loadXML(trim($svg), LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING);
    libxml_clear_errors();
    libxml_use_internal_errors($previous_errors);
    if (!$loaded || !$document->documentElement || strtolower($document->documentElement->localName) !== 'svg') return '';

    $blocked_tags = array('script', 'foreignobject', 'iframe', 'object', 'embed', 'audio', 'video', 'image');
    $elements = array();
    foreach ($document->getElementsByTagName('*') as $element) $elements[] = $element;
    foreach ($elements as $element) {
        if (in_array(strtolower($element->localName), $blocked_tags, true)) {
            if ($element->parentNode) $element->parentNode->removeChild($element);
            continue;
        }
        $attributes = array();
        if ($element->hasAttributes()) foreach ($element->attributes as $attribute) $attributes[] = $attribute->nodeName;
        foreach ($attributes as $attribute_name) {
            $value = $element->getAttribute($attribute_name);
            $lower_name = strtolower($attribute_name);
            if (strpos($lower_name, 'on') === 0 || preg_match('/javascript:|data:text\/html|expression\s*\(|@import|url\s*\(\s*["\']?(?!#)/i', $value)) {
                $element->removeAttribute($attribute_name);
                continue;
            }
            if (($lower_name === 'href' || $lower_name === 'xlink:href') && $value !== '' && strpos($value, '#') !== 0) {
                $element->removeAttribute($attribute_name);
            }
        }
        if (strtolower($element->localName) === 'style' && preg_match('/javascript:|expression\s*\(|@import|url\s*\(\s*["\']?(?!#)/i', $element->textContent)) {
            if ($element->parentNode) $element->parentNode->removeChild($element);
        }
    }
    return $document->saveXML($document->documentElement);
}
function stake_landing_render_parts() { get_template_part('template-parts/stake', 'landing'); }
add_shortcode('landing_page', function () {
    ob_start();
    echo '<main id="main-landing" class="landing-page stake-landing">';
    stake_landing_render_parts();
    echo '</main>';
    return ob_get_clean();
});
