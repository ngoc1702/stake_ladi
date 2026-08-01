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
                $text('field_stake_social_name','Tên','name'), $text('field_stake_social_icon','Chữ/icon ngắn','icon'), $link('field_stake_social_link','Liên kết','link')
            )),

            $tab('field_stake_tab_games','2. Trò chơi'),
            $text('field_stake_games_title','Tiêu đề section','stake_games_title','Trending Games in India'),
            array('key'=>'field_stake_games','label'=>'Danh sách trò chơi','name'=>'stake_games','type'=>'repeater','layout'=>'block','button_label'=>'Thêm trò chơi','sub_fields'=>array(
                $text('field_stake_game_title','Tên trò chơi','title'), $text('field_stake_game_playing','Số người đang chơi','playing'),
                $image('field_stake_game_image','Ảnh nền','image'), $link('field_stake_game_link','Nút chơi','link')
            )),

            $tab('field_stake_tab_overview','3. Tổng quan'),
            $text('field_stake_overview_title','Tiêu đề section','stake_overview_title','Essential Facts and Overview of Stake India'),
            $area('field_stake_overview_intro','Mở đầu','stake_overview_intro','A concise overview of the platform, its operation and the services available to players.'),
            array('key'=>'field_stake_facts','label'=>'Bảng thông tin','name'=>'stake_facts','type'=>'repeater','layout'=>'table','button_label'=>'Thêm dòng thông tin','sub_fields'=>array(
                $text('field_stake_fact_label','Nhãn','label'), $text('field_stake_fact_value','Nội dung','value')
            )),

            $tab('field_stake_tab_gallery','4. Thư viện giao diện'),
            $text('field_stake_gallery_title','Tiêu đề section','stake_gallery_title','Stake Official Website Interface Review'),
            array('key'=>'field_stake_gallery','label'=>'Danh sách ảnh','name'=>'stake_gallery','type'=>'repeater','layout'=>'table','button_label'=>'Thêm ảnh','sub_fields'=>array(
                $image('field_stake_gallery_image','Ảnh giao diện','image')
            )),

            $tab('field_stake_tab_pros','5. Ưu và nhược điểm'),
            $text('field_stake_pros_title','Tiêu đề section','stake_pros_title','Pros and Cons of Playing on Stake'),
            $area('field_stake_pros_intro','Mô tả','stake_pros_intro','Review the main advantages and limitations before creating your account.'),
            array('key'=>'field_stake_pros','label'=>'Ưu điểm','name'=>'stake_pros','type'=>'repeater','layout'=>'table','button_label'=>'Thêm ưu điểm','sub_fields'=>array($text('field_stake_pro_item','Nội dung','text'))),
            array('key'=>'field_stake_cons','label'=>'Nhược điểm','name'=>'stake_cons','type'=>'repeater','layout'=>'table','button_label'=>'Thêm nhược điểm','sub_fields'=>array($text('field_stake_con_item','Nội dung','text'))),
            $area('field_stake_pros_note','Ghi chú cuối section','stake_pros_note','Need more information? Contact customer support for assistance.'),

            $tab('field_stake_tab_features','6. Tính năng'),
            $text('field_stake_features_title','Tiêu đề section','stake_features_title','Stake Features'),
            $area('field_stake_features_intro','Mô tả','stake_features_intro','Explore the key features designed to make the platform secure, accessible and enjoyable.'),
            array('key'=>'field_stake_features','label'=>'Danh sách tính năng','name'=>'stake_features','type'=>'repeater','layout'=>'block','button_label'=>'Thêm tính năng','sub_fields'=>array(
                $image('field_stake_feature_image','Ảnh/icon','image'), $text('field_stake_feature_title','Tiêu đề','title'), $area('field_stake_feature_desc','Mô tả','description')
            )),

            $tab('field_stake_tab_partners','7. Đối tác & đại sứ'),
            $text('field_stake_partners_title','Tiêu đề section','stake_partners_title','Stake Partners & Ambassadors'),
            $area('field_stake_partners_intro','Nội dung mở đầu','stake_partners_intro','Stake actively works on improving its reputation and is involved in sponsorship and charitable activities. Global ambassadors include:'),
            array('key'=>'field_stake_partners','label'=>'Danh sách đối tác / đại sứ','name'=>'stake_partners','type'=>'repeater','layout'=>'table','button_label'=>'Thêm đối tác','sub_fields'=>array($text('field_stake_partner_text','Nội dung','text'))),
            $area('field_stake_partners_note','Nội dung cuối','stake_partners_note','Stake also collaborates with clubs and organizations, expanding its audience worldwide.'),
            $image('field_stake_partners_image','Ảnh Partners & Ambassadors','stake_partners_image'),

            $tab('field_stake_tab_legal','8. Pháp lý & bảo mật'),
            $text('field_stake_legal_title','Tiêu đề section','stake_legal_title','Is Stake Legal and Secure for Players in India?'),
            $area('field_stake_legal_content','Nội dung','stake_legal_content','The Stake brand belongs to Medium Rare N.V. The platform operates under an international gaming license and applies security measures designed to protect its players.'),
            $image('field_stake_legal_image','Ảnh pháp lý','stake_legal_image'),

            $tab('field_stake_tab_bonus','9. Welcome Bonus'),
            $text('field_stake_bonus_title','Tiêu đề section','stake_bonus_title','Stake Welcome Bonus for Sports Bettors and Casino Players'),
            $area('field_stake_bonus_intro','Nội dung mở đầu','stake_bonus_intro','Every player can access ongoing promotions and a weekly lottery:'),
            array('key'=>'field_stake_bonus_items','label'=>'Danh sách quyền lợi','name'=>'stake_bonus_items','type'=>'repeater','layout'=>'table','button_label'=>'Thêm quyền lợi','sub_fields'=>array($text('field_stake_bonus_item','Nội dung','text'))),
            $area('field_stake_bonus_note','Nội dung cuối','stake_bonus_note','Winners are selected during a live broadcast and winning tickets are determined by a random number generator.'),
            $link('field_stake_bonus_button','Nút nhận thưởng','stake_bonus_button'),
            $image('field_stake_bonus_image','Ảnh Welcome Bonus','stake_bonus_image'),

            $tab('field_stake_tab_mobile','10. Ứng dụng di động'),
            $text('field_stake_mobile_title','Tiêu đề section','stake_mobile_title','Betting on Your Phone: Stake Mobile App Guide for India'),
            $area('field_stake_mobile_intro','Giới thiệu chung','stake_mobile_intro','The website is optimized for mobile devices and can be installed as a convenient PWA shortcut.'),
            $text('field_stake_android_title','Tiêu đề Android','stake_android_title','Android App'),
            $area('field_stake_android_content','Nội dung Android','stake_android_content','Open Stake in Google Chrome and install the PWA version directly from your browser.'),
            array('key'=>'field_stake_android_steps','label'=>'Các bước Android','name'=>'stake_android_steps','type'=>'repeater','layout'=>'table','button_label'=>'Thêm bước','sub_fields'=>array($text('field_stake_android_step','Nội dung','text'))),
            $area('field_stake_android_note','Ghi chú Android','stake_android_note','A shortcut with the Stake logo will appear on your smartphone screen.'),
            $link('field_stake_android_button','Nút Android','stake_android_button'),
            $image('field_stake_android_image','Ảnh Android','stake_android_image'),
            $text('field_stake_ios_title','Tiêu đề iOS','stake_ios_title','iOS App'),
            $area('field_stake_ios_content','Nội dung iOS','stake_ios_content','iPhone and iPad users can install the PWA shortcut from Safari.'),
            array('key'=>'field_stake_ios_steps','label'=>'Các bước iOS','name'=>'stake_ios_steps','type'=>'repeater','layout'=>'table','button_label'=>'Thêm bước','sub_fields'=>array($text('field_stake_ios_step','Nội dung','text'))),
            $area('field_stake_ios_note','Ghi chú iOS','stake_ios_note','Tap the shortcut to launch the application, then register or log in.'),
            $link('field_stake_ios_button','Nút iOS','stake_ios_button'),
            $image('field_stake_ios_image','Ảnh iOS','stake_ios_image'),

            $tab('field_stake_tab_sports','11. Cá cược thể thao'),
            $text('field_stake_sports_title','Tiêu đề section','stake_sports_title','Sports Betting Online at Stake India'),
            $area('field_stake_sports_intro','Mô tả','stake_sports_intro','Place bets across dozens of sports and hundreds of sporting events every day.'),
            array('key'=>'field_stake_sports','label'=>'Danh sách môn thể thao','name'=>'stake_sports','type'=>'repeater','layout'=>'block','button_label'=>'Thêm môn thể thao','sub_fields'=>array(
                $image('field_stake_sport_image','Ảnh','image'), $text('field_stake_sport_title','Tên môn thể thao','title'),
                $area('field_stake_sport_desc','Mô tả','description'),
                array('key'=>'field_stake_sport_events','label'=>'Giải đấu / sự kiện','name'=>'events','type'=>'repeater','layout'=>'table','button_label'=>'Thêm sự kiện','sub_fields'=>array($text('field_stake_sport_event','Tên sự kiện','text'))),
                $area('field_stake_sport_note','Nội dung cuối','note')
            )),

            $tab('field_stake_tab_esports','12. eSports'),
            $text('field_stake_esports_title','Tiêu đề section','stake_esports_title','eSports That You Can Bet on Stake'),
            $area('field_stake_esports_intro','Nội dung mở đầu','stake_esports_intro','Explore a dedicated eSports section covering the most popular competitive games:'),
            array('key'=>'field_stake_esports_items','label'=>'Danh sách bộ môn','name'=>'stake_esports_items','type'=>'repeater','layout'=>'table','button_label'=>'Thêm bộ môn','sub_fields'=>array($text('field_stake_esports_item','Nội dung','text'))),
            $area('field_stake_esports_note','Nội dung cuối','stake_esports_note','Choose from match winner, map results, total kills, event duration and many more markets.'),
            $image('field_stake_esports_image','Ảnh eSports','stake_esports_image'),

            $tab('field_stake_tab_virtual','13. Virtual Sports'),
            $text('field_stake_virtual_title','Tiêu đề section','stake_virtual_title','Virtual Sports'),
            $area('field_stake_virtual_intro','Nội dung mở đầu','stake_virtual_intro','Virtual sports let you place predictions on computer-simulated match outcomes. Available sports include:'),
            array('key'=>'field_stake_virtual_items','label'=>'Danh sách môn','name'=>'stake_virtual_items','type'=>'repeater','layout'=>'table','button_label'=>'Thêm môn','sub_fields'=>array($text('field_stake_virtual_item','Nội dung','text'))),
            $area('field_stake_virtual_note','Nội dung cuối','stake_virtual_note','Results depend on computer algorithms and cannot be influenced by players.'),
            $image('field_stake_virtual_image','Ảnh Virtual Sports','stake_virtual_image'),

            $tab('field_stake_tab_bet_types','14. Các loại cược'),
            $text('field_stake_bet_types_title','Tiêu đề section','stake_bet_types_title','Exploring the Main Types of Bets'),
            $area('field_stake_bet_types_intro','Nội dung mở đầu','stake_bet_types_intro','Choose a bet type after adding at least one selection to your bet slip:'),
            array('key'=>'field_stake_bet_types','label'=>'Danh sách loại cược','name'=>'stake_bet_types','type'=>'repeater','layout'=>'block','button_label'=>'Thêm loại cược','sub_fields'=>array(
                $text('field_stake_bet_type_name','Tên loại cược','name'), $area('field_stake_bet_type_desc','Mô tả','description')
            )),
            $area('field_stake_bet_types_note','Nội dung cuối','stake_bet_types_note','Review your prediction carefully before confirming the bet.'),
            $image('field_stake_bet_types_image','Ảnh Types of Bets','stake_bet_types_image'),

            $tab('field_stake_tab_bet_options','15. Tùy chọn cá cược'),
            $text('field_stake_bet_options_title','Tiêu đề section','stake_bet_options_title','Advanced Betting Options and Features at Stake'),
            $area('field_stake_bet_options_intro','Nội dung mở đầu','stake_bet_options_intro','Sporting events are divided into categories with their own features:'),
            array('key'=>'field_stake_bet_options','label'=>'Danh sách tùy chọn','name'=>'stake_bet_options','type'=>'repeater','layout'=>'block','button_label'=>'Thêm tùy chọn','sub_fields'=>array(
                $text('field_stake_bet_option_name','Tên tùy chọn','name'), $area('field_stake_bet_option_desc','Mô tả','description')
            )),
            $area('field_stake_bet_options_note','Nội dung cuối','stake_bet_options_note','You can combine selections from different sections using one account balance.'),
            $image('field_stake_bet_options_image','Ảnh Betting Options','stake_bet_options_image'),

            $tab('field_stake_tab_casino','16. Trò chơi Casino'),
            $text('field_stake_casino_title','Tiêu đề section','stake_casino_title','Stake Online Casino: Top Slots and Live Games'),
            $area('field_stake_casino_intro','Mô tả','stake_casino_intro','Explore slots, table games, live dealer games and new releases from popular providers.'),
            array('key'=>'field_stake_casino_games','label'=>'Danh sách trò chơi Casino','name'=>'stake_casino_games','type'=>'repeater','layout'=>'block','button_label'=>'Thêm trò chơi','sub_fields'=>array(
                $image('field_stake_casino_game_image','Ảnh trò chơi','image'), $text('field_stake_casino_game_title','Tên trò chơi','title'),
                $area('field_stake_casino_game_desc','Mô tả','description'),
                array('key'=>'field_stake_casino_game_stats','label'=>'Thông số','name'=>'stats','type'=>'repeater','layout'=>'table','button_label'=>'Thêm thông số','sub_fields'=>array($text('field_stake_casino_game_stat','Nội dung','text'))),
                $link('field_stake_casino_game_button','Nút chơi','button')
            )),

            $tab('field_stake_tab_payments','17. Thanh toán'),
            $text('field_stake_payments_title','Tiêu đề section','stake_payments_title','Fast and Secure Payments: Deposit and Withdrawal Methods'),
            $area('field_stake_payments_intro','Nội dung mở đầu','stake_payments_intro','After logging in, players can access the cashier to make deposits and request withdrawals.'),
            array('key'=>'field_stake_payment_methods','label'=>'Phương thức thanh toán','name'=>'stake_payment_methods','type'=>'repeater','layout'=>'table','button_label'=>'Thêm phương thức','sub_fields'=>array($text('field_stake_payment_method','Nội dung','text'))),
            $area('field_stake_payments_note','Lưu ý hạn mức','stake_payments_note','Minimum amounts and limits may vary depending on the currency and current exchange rate.'),
            $area('field_stake_payments_footer','Nội dung cuối','stake_payments_footer','Always send cryptocurrency to the correct wallet and verify all transaction details before confirming.'),

            $tab('field_stake_tab_header','18. Header'),
            $image('field_stake_header_logo','Logo header','stake_header_logo'),
            $text('field_stake_header_brand','Tên thương hiệu dự phòng','stake_header_brand','Stake'),
            $text('field_stake_header_flag','Biểu tượng quốc gia','stake_header_flag','🇮🇳'),
            $link('field_stake_header_login','Nút đăng nhập','stake_header_login'),
            $link('field_stake_header_register','Nút đăng ký','stake_header_register'),

            $tab('field_stake_tab_faq','19. FAQ'),
            $text('field_stake_faq_title','Tiêu đề section','stake_faq_title','FAQ'),
            $text('field_stake_faq_updated','Nội dung cập nhật','stake_faq_updated','Updated: Wed, 29 Jul 2026 08:18:42'),
            array('key'=>'field_stake_faq_items','label'=>'Danh sách câu hỏi','name'=>'stake_faq_items','type'=>'repeater','layout'=>'block','button_label'=>'Thêm câu hỏi','sub_fields'=>array(
                $text('field_stake_faq_question','Câu hỏi','question'), $area('field_stake_faq_answer','Câu trả lời','answer')
            )),

            $tab('field_stake_tab_footer','20. Footer'),
            $image('field_stake_footer_logo','Logo footer','stake_footer_logo'),
            $text('field_stake_footer_brand','Tên thương hiệu dự phòng','stake_footer_brand','Stake'),
            $text('field_stake_footer_flag','Biểu tượng quốc gia','stake_footer_flag','🇮🇳'),
            array('key'=>'field_stake_footer_currencies','label'=>'Biểu tượng tiền tệ','name'=>'stake_footer_currencies','type'=>'repeater','layout'=>'table','button_label'=>'Thêm tiền tệ','sub_fields'=>array(
                $text('field_stake_footer_currency_icon','Ký hiệu','icon'), $text('field_stake_footer_currency_label','Tên mô tả','label')
            )),
            array('key'=>'field_stake_footer_columns','label'=>'Các cột menu','name'=>'stake_footer_columns','type'=>'repeater','layout'=>'block','button_label'=>'Thêm cột menu','sub_fields'=>array(
                $text('field_stake_footer_column_title','Tiêu đề cột','title'),
                array('key'=>'field_stake_footer_links','label'=>'Danh sách liên kết','name'=>'links','type'=>'repeater','layout'=>'table','button_label'=>'Thêm liên kết','sub_fields'=>array(
                    $text('field_stake_footer_link_label','Nhãn','label'), $link('field_stake_footer_link_url','Liên kết','link')
                ))
            )),
            $link('field_stake_footer_android','Nút tải Android','stake_footer_android'),
            $link('field_stake_footer_ios','Nút tải iOS','stake_footer_ios'),
            $text('field_stake_footer_age','Nhãn độ tuổi','stake_footer_age','18+'),
            array('key'=>'field_stake_footer_socials','label'=>'Mạng xã hội','name'=>'stake_footer_socials','type'=>'repeater','layout'=>'table','button_label'=>'Thêm mạng xã hội','sub_fields'=>array(
                $text('field_stake_footer_social_icon','Ký hiệu/icon','icon'), $text('field_stake_footer_social_label','Tên','label'), $link('field_stake_footer_social_link','Liên kết','link')
            )),
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
function stake_link($value, $title, $url = '#') {
    $value = is_array($value) ? $value : array();
    return array('title'=>!empty($value['title'])?$value['title']:$title, 'url'=>!empty($value['url'])?$value['url']:$url, 'target'=>!empty($value['target'])?$value['target']:'_self');
}
function stake_image_url($image) {
    if (is_array($image) && !empty($image['url'])) return $image['url'];
    if (is_numeric($image)) return wp_get_attachment_image_url($image, 'full');
    return is_string($image) ? $image : '';
}
function stake_landing_render_parts() { get_template_part('template-parts/stake', 'landing'); }
add_shortcode('landing_page', function () {
    ob_start();
    echo '<main id="main-landing" class="landing-page stake-landing">';
    stake_landing_render_parts();
    echo '</main>';
    return ob_get_clean();
});
