<?php
// Apply the requested featured image and publication date without replacing article text.
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
define('DISABLE_WP_CRON', true);
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
require dirname(__DIR__) . '/wp-load.php';
$article = get_page_by_path('prop-firm-review', OBJECT, 'post');
if (!$article) { fwrite(STDERR, "Review post not found.\n"); exit(1); }
$result = wp_update_post(array('ID'=>$article->ID, 'post_date'=>'2019-11-24 09:00:00', 'post_date_gmt'=>get_gmt_from_date('2019-11-24 09:00:00')), true);
if (is_wp_error($result)) { fwrite(STDERR, $result->get_error_message()); exit(1); }
$existing = get_posts(array('post_type'=>'attachment', 'post_status'=>'inherit', 'meta_key'=>'_stake_review_asset', 'meta_value'=>'prop-firm-review.png', 'posts_per_page'=>1, 'fields'=>'ids'));
if ($existing) {
    $attachment_id = $existing[0];
} else {
    require_once ABSPATH . 'wp-admin/includes/image.php';
    $source = get_stylesheet_directory() . '/assets/images/prop-firm-review.png';
    $upload = wp_upload_bits('prop-firm-review.png', null, file_get_contents($source));
    if (!empty($upload['error'])) { fwrite(STDERR, $upload['error']); exit(1); }
    $attachment_id = wp_insert_attachment(array('post_title'=>'Prop trading illustration', 'post_mime_type'=>'image/png', 'post_status'=>'inherit'), $upload['file'], $article->ID, true);
    if (is_wp_error($attachment_id)) { fwrite(STDERR, $attachment_id->get_error_message()); exit(1); }
    wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, $upload['file']));
    update_post_meta($attachment_id, '_wp_attachment_image_alt', 'Glowing purple trading cube with a candlestick chart');
    update_post_meta($attachment_id, '_stake_review_asset', 'prop-firm-review.png');
}
set_post_thumbnail($article->ID, $attachment_id);
echo 'Updated featured image and publication date: November 24, 2019.' . PHP_EOL;
