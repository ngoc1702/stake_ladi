<?php
// Create the blog index and its first review. --refresh updates the seed article.
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
define('DISABLE_WP_CRON', true);
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
require dirname(__DIR__) . '/wp-load.php';

$category = term_exists('reviews', 'category');
if (!$category) $category = wp_insert_term('Reviews', 'category', array('slug'=>'reviews'));
if (is_wp_error($category)) { fwrite(STDERR, $category->get_error_message()); exit(1); }
$category_id = (int) (is_array($category) ? $category['term_id'] : $category);
$article = get_page_by_path('prop-firm-review', OBJECT, array('post', 'page'));
$content = "<!-- wp:html -->\n" . file_get_contents(get_stylesheet_directory() . '/template-parts/prop-firm-review-content.html') . "\n<!-- /wp:html -->";
$article_data = array(
    'post_type'=>'post', 'post_status'=>'publish',
    'post_title'=>'What Is a Prop Firm? How Proprietary Trading Works in 2026',
    'post_name'=>'prop-firm-review',
    'post_content'=>wp_slash($content),
    'post_excerpt'=>'Understand how prop firms operate, how online evaluations differ from traditional trading desks, and what to check before paying a fee.',
    'post_category'=>array($category_id),
    'post_date'=>'2019-11-24 09:00:00',
    'post_date_gmt'=>get_gmt_from_date('2019-11-24 09:00:00'),
);
if (!$article || $article->post_type === 'page' || in_array('--refresh', $argv, true)) {
    if ($article) $article_data['ID'] = $article->ID;
    $article_id = wp_insert_post($article_data, true);
    if (is_wp_error($article_id)) { fwrite(STDERR, $article_id->get_error_message()); exit(1); }
    delete_post_meta($article_id, '_wp_page_template');
} else {
    $article_id = $article->ID;
    wp_set_post_categories($article_id, array($category_id), true);
}
$blog = get_page_by_path('blog', OBJECT, 'page');
if (!$blog) {
    $blog_id = wp_insert_post(array('post_type'=>'page', 'post_status'=>'publish', 'post_title'=>'Blog & Reviews', 'post_name'=>'blog', 'page_template'=>'page-blog.php'), true);
    if (is_wp_error($blog_id)) { fwrite(STDERR, $blog_id->get_error_message()); exit(1); }
} else {
    $blog_id = $blog->ID;
    update_post_meta($blog_id, '_wp_page_template', 'page-blog.php');
}
echo 'Blog: ' . get_permalink($blog_id) . PHP_EOL;
echo 'Article: ' . get_permalink($article_id) . PHP_EOL;
