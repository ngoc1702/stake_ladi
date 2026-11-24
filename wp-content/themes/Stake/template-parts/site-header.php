<?php
if (!defined('ABSPATH')) exit;
$source_id = (int) ($args['source_id'] ?? get_option('page_on_front'));
$field = function ($name, $default = '') use ($source_id) { return stake_site_field($name, $default, $source_id); };
$header_logo = stake_image_url($field('stake_header_logo'));
$header_login = stake_link($field('stake_header_login'), 'Log In');
$header_register = stake_link($field('stake_header_register'), 'Registration');
?>
<header class="stake-site-header">
 <div class="stake-shell stake-header-inner">
  <a class="stake-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>"><?php if($header_logo): ?><img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr($field('stake_header_brand','Stake')); ?>"><?php else: ?><strong><?php echo esc_html($field('stake_header_brand','Stake')); ?></strong><?php endif; ?></a>
  <div class="stake-header-right">
    <?php $blog_review_page=get_page_by_path('blog'); if($blog_review_page && get_post_status($blog_review_page)==='publish'): ?><a class="stake-header-blog" href="<?php echo esc_url(get_permalink($blog_review_page)); ?>">Blog &amp; Reviews</a><?php endif; ?>
    <nav class="stake-header-actions" aria-label="Account"><a class="stake-btn" href="<?php echo esc_url($header_login['url']); ?>" target="<?php echo esc_attr($header_login['target']); ?>"><?php echo esc_html($header_login['title']); ?></a><a class="stake-btn stake-btn-accent" href="<?php echo esc_url($header_register['url']); ?>" target="<?php echo esc_attr($header_register['target']); ?>"><?php echo esc_html($header_register['title']); ?></a></nav>
    <div class="stake-header-translate"><?php echo do_shortcode('[gtranslate]'); ?></div>
  </div>
 </div>
</header>
