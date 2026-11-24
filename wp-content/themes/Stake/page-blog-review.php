<?php
/** Template Name: Blog Review */
if (!defined('ABSPATH')) exit;
remove_action('wp_head', 'caia_add_meta_responsive');
the_post();
$raw_content = get_the_content();
if (trim($raw_content) === '') $raw_content = "<!-- wp:html -->\n" . file_get_contents(__DIR__ . '/template-parts/prop-firm-review-content.html') . "\n<!-- /wp:html -->";
$review_content = apply_filters('the_content', $raw_content);
preg_match_all('/<h2\b[^>]*\bid="([^"]+)"[^>]*>(.*?)<\/h2>/is', $review_content, $headings, PREG_SET_ORDER);
?>
<!doctype html><html lang="en">
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="<?php echo esc_attr(get_the_excerpt()); ?>"><?php wp_head(); ?></head>
<body <?php body_class('stake-review-page'); ?>><?php wp_body_open(); ?>
<a class="review-skip" href="#review-content">Skip to article</a><div class="review-progress" aria-hidden="true"><span></span></div>
<?php get_template_part('template-parts/blog-header'); ?>
<main id="review-main"><div class="review-container">
<nav class="review-breadcrumb" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span>/</span><a href="<?php echo esc_url(stake_blog_url()); ?>">Blog & Reviews</a><span>/</span><span>Prop trading</span></nav>
</div>
<div class="review-container review-layout"><aside class="review-sidebar"><details class="review-toc" open><summary>On this page</summary><nav aria-label="Article contents"><?php foreach ($headings as $heading): ?><a href="#<?php echo esc_attr($heading[1]); ?>"><?php echo esc_html(wp_strip_all_tags($heading[2])); ?></a><?php endforeach; ?></nav></details><div class="review-share"><span>Save this guide for later</span><button type="button" id="review-copy">Copy article link</button><span id="review-copy-status" role="status"></span></div></aside><article class="review-article" id="review-content" aria-label="Review article"><header class="review-article-header"><div class="review-eyebrow"><span>TRADING GUIDE</span></div><h1><?php the_title(); ?></h1><div class="review-meta"><span class="review-avatar" aria-hidden="true">S</span><div><strong>Stake Editorial</strong><span>Trading education</span></div><div class="review-date"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(date('F j, Y', get_post_time('U'))); ?></time><span><?php echo (int) stake_blog_reading_time($raw_content); ?> min read</span></div></div></header><?php echo $review_content; ?></article></div>
<section class="review-end"><div class="review-container"><span>MORE FROM STAKE</span><h2>Keep exploring. Keep asking better questions.</h2><p>Practical guides and thoughtful reviews, all in one place.</p><a href="<?php echo esc_url(stake_blog_url()); ?>">Back to all articles</a></div></section></main>
<?php get_template_part('template-parts/blog-footer'); wp_footer(); ?></body></html>
