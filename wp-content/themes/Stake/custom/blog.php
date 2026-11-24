<?php
if (!defined('ABSPATH')) exit;
function stake_site_field($name, $default = '', $source_id = 0) {
    $source_id = $source_id ?: (int) get_option('page_on_front');
    if ($source_id && function_exists('get_field')) {
        $value = get_field($name, $source_id);
        if ($value !== null && $value !== false && $value !== '') return $value;
    }
    return $default;
}
function stake_blog_url() {
    $page = get_page_by_path('blog');
    return $page ? get_permalink($page) : home_url('/blog');
}
function stake_blog_reading_time($content) {
    return max(1, (int) ceil(str_word_count(wp_strip_all_tags($content)) / 200));
}
add_filter('template_include', function ($template) {
    return is_singular('post') && has_category('reviews') ? get_stylesheet_directory() . '/page-blog-review.php' : $template;
});
