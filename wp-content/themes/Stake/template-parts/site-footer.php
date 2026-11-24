<?php
if (!defined('ABSPATH')) exit;
$source_id = (int) ($args['source_id'] ?? get_option('page_on_front'));
$field = function ($name, $default = '') use ($source_id) { return stake_site_field($name, $default, $source_id); };
$header_logo = stake_image_url($field('stake_header_logo'));
?>
<?php
$footer_logo=stake_image_url($field('stake_footer_logo'))?:$header_logo;
$footer_partner_value=$field('stake_footer_partner_link');
$footer_partner=stake_link($footer_partner_value,'Stakebonus.com');
?>
<footer class="stake-site-footer"><div class="stake-shell">
 <div class="stake-footer-simple">
  <a class="stake-footer-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php if($footer_logo): ?><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr($field('stake_footer_brand','StakeBonus')); ?>"><?php else: ?><strong><?php echo esc_html($field('stake_footer_brand','StakeBonus')); ?></strong><?php endif; ?></a>
  <p><?php echo esc_html(wp_strip_all_tags($field('stake_footer_intro','StakeBonus is an official partner of Stake.com. All content is for informational purposes only and does not promote illegal gambling. Please play responsibly!'))); ?></p>
  <?php if(!empty($footer_partner_value['url'])): ?><p><a href="<?php echo esc_url($footer_partner['url']); ?>" target="<?php echo esc_attr($footer_partner['target']); ?>" rel="noopener noreferrer"><?php echo esc_html($footer_partner['title']); ?></a></p><?php endif; ?>
  <p><?php echo esc_html($field('stake_footer_copyright','©2026 · All rights reserved.')); ?></p>
  <p><?php echo esc_html($field('stake_footer_responsible','This site is not suitable for people under 18 years of age!')); ?> <span><?php echo esc_html($field('stake_footer_age','18')); ?></span></p>
  <p class="stake-footer-disclaimer"><?php echo esc_html(wp_strip_all_tags($field('stake_footer_disclaimer','All trademarks, brand names, and design elements featured on this website are the property of their respective owners and are used with permission from our official partner, Stake.com.'))); ?></p>
 </div>
</div></footer>
