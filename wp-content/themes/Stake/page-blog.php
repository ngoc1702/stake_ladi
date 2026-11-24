<?php
/** Template Name: Blog — Review Grid */
if (!defined('ABSPATH')) exit;
remove_action('wp_head', 'caia_add_meta_responsive');
$blog_page = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$reviews = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'category_name'=>'reviews', 'posts_per_page'=>9, 'paged'=>$blog_page));
?>
<!doctype html><html lang="en"><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="Explore Stake's trading guides and independent reviews. Learn how prop firms work and what to check before getting started."><?php wp_head(); ?></head>
<body <?php body_class('stake-review-page stake-blog-page'); ?>><?php wp_body_open(); ?><a class="review-skip" href="#blog-articles">Skip to articles</a><?php get_template_part('template-parts/blog-header'); ?>
<main><section class="blog-list-section review-container" id="blog-articles" aria-labelledby="blog-list-title"><div class="blog-list-header"><div><span class="blog-kicker">LEARN. COMPARE. UNDERSTAND.</span><h1 id="blog-list-title">Latest articles</h1></div><span class="blog-count"><?php echo (int) $reviews->found_posts; ?> <?php echo $reviews->found_posts === 1 ? 'article' : 'articles'; ?></span></div><div class="blog-grid">
<?php while ($reviews->have_posts()): $reviews->the_post(); ?>
<article class="blog-card"><a class="blog-card-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php if (has_post_thumbnail()): the_post_thumbnail('large', array('alt'=>'', 'loading'=>'lazy')); else: ?><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/prop-trading-cover.svg'); ?>" alt="" width="800" height="500" loading="lazy"><?php endif; ?></a><div class="blog-card-copy"><div class="blog-card-meta"><span>TRADING GUIDE</span><span><?php echo (int) stake_blog_reading_time(get_the_content()); ?> min read</span></div><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(get_the_excerpt()); ?></p><div class="blog-card-bottom"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(date('M j, Y', get_post_time('U'))); ?></time><a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr('Read: ' . get_the_title()); ?>">Read article</a></div></div></article>
<?php endwhile; ?></div>
<?php if (!$reviews->found_posts): ?><p class="blog-empty">New guides are on the way. Check back soon.</p><?php endif; ?>
<?php if ($reviews->max_num_pages > 1): ?><nav class="blog-pagination" aria-label="Article pagination"><?php echo paginate_links(array('total'=>$reviews->max_num_pages, 'current'=>$blog_page, 'prev_text'=>'Previous', 'next_text'=>'Next')); ?></nav><?php endif; wp_reset_postdata(); ?></section></main>
<?php get_template_part('template-parts/blog-footer'); wp_footer(); ?></body></html>
