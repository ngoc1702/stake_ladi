<?php
if (!defined('ABSPATH')) exit;
$login = stake_link(stake_field('stake_login_button'), 'Log In');
$register = stake_link(stake_field('stake_register_button'), 'Register');
$socials = stake_field('stake_socials', array(
    array('name'=>'Google','link'=>array('url'=>'#')), array('name'=>'Facebook','link'=>array('url'=>'#')), array('name'=>'Kick','link'=>array('url'=>'#')),
));
$games = stake_field('stake_games', array(
    array('title'=>'Gates of Olympus 1000'), array('title'=>'The Dog House Megaways 1000'),
    array('title'=>'Wanted Dead or A Wild'), array('title'=>'Sugar Twist 1000'),
    array('title'=>'Big Bass Rock and Roll'), array('title'=>"Waylander's Forge"),
));
$sports_games = stake_field('stake_sports_games', array(
    array('title'=>'Soccer'), array('title'=>'Tennis'), array('title'=>'Cricket'),
    array('title'=>'Basketball'), array('title'=>'Baseball'), array('title'=>'CS2'),
));
$features = stake_field('stake_features', array(
    array('icon'=>'fa-shield-halved','title'=>'Provably Fair Gaming','description'=>'Every game result can be verified through transparent cryptographic technology designed to protect fair play.'),
    array('icon'=>'fa-bolt','title'=>'Instant Crypto Transactions','description'=>'Deposit and withdraw supported cryptocurrencies quickly with secure, straightforward payment processing.'),
    array('icon'=>'fa-headset','title'=>'24/7 Customer Support','description'=>'Get help around the clock through responsive support channels whenever you need assistance.'),
    array('icon'=>'fa-coins','title'=>'Exclusive Bonuses','description'=>'Access welcome offers, reload promotions, rakeback opportunities and rewards for regular players.'),
    array('icon'=>'fa-mobile-screen-button','title'=>'Mobile Gaming','description'=>'Enjoy the complete casino and sportsbook experience on a responsive mobile platform with no app required.'),
    array('icon'=>'fa-trophy','title'=>'VIP Program','description'=>'Unlock personalized rewards, dedicated support and exclusive benefits through the Stake VIP program.'),
));
?>
<?php
$header_logo=stake_image_url(stake_field('stake_header_logo'));
$header_login=stake_link(stake_field('stake_header_login'),'Log In');
$header_register=stake_link(stake_field('stake_header_register'),'Registration');
?>
<header class="stake-site-header">
 <div class="stake-shell stake-header-inner">
  <a class="stake-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>"><?php if($header_logo): ?><img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(stake_field('stake_header_brand','Stake')); ?>"><?php else: ?><strong><?php echo esc_html(stake_field('stake_header_brand','Stake')); ?></strong><?php endif; ?></a>
  <div class="stake-header-right">
    <nav class="stake-header-actions" aria-label="Account"><a class="stake-btn" href="<?php echo esc_url($header_login['url']); ?>" target="<?php echo esc_attr($header_login['target']); ?>"><?php echo esc_html($header_login['title']); ?></a><a class="stake-btn stake-btn-accent" href="<?php echo esc_url($header_register['url']); ?>" target="<?php echo esc_attr($header_register['target']); ?>"><?php echo esc_html($header_register['title']); ?></a></nav>
    <div class="stake-header-translate"><?php echo do_shortcode('[gtranslate]'); ?></div>
  </div>
 </div>
</header>
<section class="stake-section stake-hero" aria-labelledby="stake-hero-title">
 <div class="stake-shell stake-hero-grid">
  <div class="stake-hero-copy">
   <h1 id="stake-hero-title"><?php echo esc_html(stake_field('stake_hero_title','Stake India: Leading Sportsbook & Online Casino Platform in 2026')); ?></h1>
   <div class="stake-lead"><?php echo wp_kses_post(wpautop(stake_field('stake_hero_description','Discover a complete entertainment platform with thousands of games, live sports and secure payment options.'))); ?></div>
   <div class="stake-actions"><a class="stake-btn" href="<?php echo esc_url($login['url']); ?>" target="<?php echo esc_attr($login['target']); ?>"><?php echo esc_html($login['title']); ?></a><a class="stake-btn stake-btn-accent" href="<?php echo esc_url($register['url']); ?>" target="<?php echo esc_attr($register['target']); ?>"><?php echo esc_html($register['title']); ?></a></div>
   <?php if($socials): ?><div class="stake-social-wrap"><span>Or Sign Up With</span><div class="stake-socials">
    <?php foreach($socials as $social): $social_name=$social['name']??'Open'; $social_svg=stake_safe_svg($social['logo_svg']??''); $sl=stake_link($social['link']??array(),$social_name); $social_key=strtolower($social_name); $is_known_social=strpos($social_key,'google')!==false||strpos($social_key,'facebook')!==false||strpos($social_key,'kick')!==false; $social_icon=strpos($social_key,'google')!==false?'fa-google':(strpos($social_key,'facebook')!==false?'fa-facebook':(strpos($social_key,'kick')!==false?'fa-kickstarter-k':'fa-circle-user')); ?><a class="stake-social-<?php echo esc_attr(sanitize_html_class($social_key)); ?>" href="<?php echo esc_url($sl['url']); ?>"><?php if($social_svg): ?><span class="stake-social-svg" aria-hidden="true"><?php echo $social_svg; ?></span><?php else: ?><i class="<?php echo $is_known_social?'fa-brands':'fa-solid'; ?> <?php echo esc_attr($social_icon); ?>" aria-hidden="true"></i><?php endif; ?><b><?php echo esc_html($social_name); ?></b></a><?php endforeach; ?>
   </div></div><?php endif; ?>
  </div>
  <?php $hero_image=stake_image_url(stake_field('stake_hero_image')); ?>
  <div class="stake-hero-visual<?php echo $hero_image?' has-image':''; ?>"<?php echo $hero_image?' style="background-image:url('.esc_url($hero_image).')"':''; ?>>
   <?php if(!$hero_image): ?><div class="stake-ui stake-ui-back"><span></span><span></span><span></span></div><div class="stake-ui stake-ui-front"><div class="stake-ui-nav">◆ Stake <i></i></div><div class="stake-ui-cards"><b>CASINO</b><b>SPORTS</b><b>LIVE</b></div><div class="stake-ui-lines"></div></div><strong class="stake-wordmark">Stake</strong><?php endif; ?>
  </div>
 </div>
</section>

<?php
$promotions=stake_field('stake_promotions',array(
 array('badge'=>'Promotion','title'=>'Win Your First Set','description'=>'Claim your first set and start playing.','link_text'=>'Read more'),
 array('badge'=>'Only on Stake','title'=>'Skull Gates','description'=>'Unlock the Glass Cannon experience.','link_text'=>'Read more'),
 array('badge'=>'New Feature','title'=>'The Stake Shield','description'=>'Build your shield with 3 or more selections.','link_text'=>'Read more'),
));
?>
<section class="stake-section stake-trending-section" aria-label="<?php echo esc_attr(stake_field('stake_games_title','Trending Games in India')); ?>"><div class="stake-shell">
 <div class="stake-promotions" aria-labelledby="stake-promotions-title">
  <div class="stake-promotions-head"><h2 id="stake-promotions-title"><i class="fa-solid fa-gift" aria-hidden="true"></i><?php echo esc_html(stake_field('stake_promotions_title','Promotions')); ?></h2></div>
  <div class="stake-promotions-grid"><?php foreach($promotions as $index=>$promotion): $promo_image=stake_image_url($promotion['image']??''); $promo_link=stake_link($promotion['link']??array(),$promotion['link_text']??'Read more'); ?><article class="stake-promotion-card promo-<?php echo (int)($index%3+1); ?>">
   <div class="stake-promotion-copy"><span><?php echo esc_html($promotion['badge']??'Promotion'); ?></span><h3><?php echo esc_html($promotion['title']??'Promotion'); ?></h3><p><?php echo esc_html(wp_strip_all_tags($promotion['description']??'')); ?></p><a href="<?php echo esc_url($promo_link['url']); ?>" target="<?php echo esc_attr($promo_link['target']); ?>"><?php echo esc_html($promo_link['title']); ?></a></div>
   <div class="stake-promotion-image<?php echo $promo_image?' has-image':''; ?>"<?php echo $promo_image?' style="background-image:url('.esc_url($promo_image).')"':''; ?>><i class="fa-solid <?php echo esc_attr(array('fa-trophy','fa-skull','fa-shield-halved')[$index%3]); ?>" aria-hidden="true"></i></div>
  </article><?php endforeach; ?></div>
 </div>
 <?php
 $game_rows = array(
    array('id'=>'stake-casino-games','title'=>stake_field('stake_games_title','Trending Casino Games'),'icon'=>'trending-cards.svg','items'=>$games),
    array('id'=>'stake-sports-games','title'=>stake_field('stake_sports_games_title','Trending Sports'),'icon'=>'trending-ball.svg','items'=>$sports_games),
 );
 foreach($game_rows as $row): ?>
 <div class="stake-game-row" data-game-slider>
  <div class="stake-game-row-head">
   <h2 class="stake-game-row-title" id="<?php echo esc_attr($row['id']); ?>"><span class="stake-title-icon" aria-hidden="true"><img src="<?php echo esc_url(get_stylesheet_directory_uri().'/assets/images/'.$row['icon']); ?>" alt=""></span><?php echo esc_html($row['title']); ?></h2>
   <div class="stake-slider-arrows"><button type="button" data-slider-prev aria-label="Previous games"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button><button type="button" data-slider-next aria-label="Next games"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button></div>
  </div>
  <div class="stake-games" aria-labelledby="<?php echo esc_attr($row['id']); ?>" data-slider-track tabindex="0">
   <?php foreach($row['items'] as $index=>$game): $bg=stake_image_url($game['image']??''); ?>
   <div class="stake-game game-<?php echo (int)($index%6+1); ?><?php echo $bg?' has-image':''; ?>"<?php echo $bg?' style="--game-image:url('.esc_url($bg).')"':''; ?>>
    <span class="stake-game-rank"><?php echo (int)($index+1); ?></span>
   </div>
   <?php endforeach; ?>
  </div>
 </div>
 <?php endforeach; ?>
 <?php $all_games=stake_link(stake_field('stake_all_games_button'),'Explore All Games'); ?>
 <a class="stake-btn stake-all-games" href="<?php echo esc_url($all_games['url']); ?>" target="<?php echo esc_attr($all_games['target']); ?>"><?php echo esc_html($all_games['title']); ?><span aria-hidden="true">&#8594;</span></a>
</div></section>

<?php ob_start(); ?>
<?php $faq_items=stake_field('stake_faq_items',array(
 array('question'=>'How do I create an account at Stake Casino?','answer'=>'Select Registration, enter the requested details and complete the account verification steps shown on screen.'),
 array('question'=>'What cryptocurrencies does Stake Casino accept?','answer'=>'Stake supports a broad selection of popular cryptocurrencies. The currently available options are listed in the cashier.'),
 array('question'=>'Is Stake Casino safe and secure?','answer'=>'The platform uses encrypted connections, account security controls and licensed operating procedures to protect players.'),
 array('question'=>'How long do cryptocurrency deposits and withdrawals take?','answer'=>'Processing times depend on the selected currency and network traffic. Deposits are generally credited after the required confirmations.'),
 array('question'=>'What casino games are available at Stake Casino?','answer'=>'Players can explore slots, live dealer tables, roulette, blackjack, baccarat and other casino games.'),
 array('question'=>'What bonuses does Stake Casino offer?','answer'=>'Available promotions may include weekly offers, races, VIP rewards and game-specific bonuses. Terms apply to every promotion.'),
 array('question'=>'How does provably fair gaming work at Stake Casino?','answer'=>'Provably fair technology lets players verify the inputs and outcome of supported games independently.'),
 array('question'=>'Is Stake Casino licensed and regulated?','answer'=>'Licensing details and applicable operating information are published on the platform for players to review.'),
 array('question'=>'How fast are cryptocurrency withdrawals at Stake Casino?','answer'=>'Approved withdrawals are submitted to the relevant blockchain, where final timing depends on network confirmation speed.'),
 array('question'=>'Can I play Stake Casino games on my mobile device?','answer'=>'Yes. The website is responsive and can be accessed through modern mobile browsers on Android and iOS devices.'),
)); ?>
<section class="stake-section stake-faq-section" aria-labelledby="stake-faq-title"><div class="stake-shell stake-faq-wrap">
 <h2 class="stake-heading" id="stake-faq-title"><?php echo esc_html(stake_field('stake_faq_title','Frequently Asked Questions')); ?></h2>
 <div class="stake-accordion"><?php foreach($faq_items as $index=>$item): $answer_id='stake-faq-answer-'.(int)$index; ?><article class="stake-faq-item"><h3><button type="button" aria-expanded="false" aria-controls="<?php echo esc_attr($answer_id); ?>"><span><?php echo esc_html($item['question']??''); ?></span><i aria-hidden="true">+</i></button></h3><div class="stake-faq-answer" id="<?php echo esc_attr($answer_id); ?>" hidden><?php echo wp_kses_post(wpautop($item['answer']??'')); ?></div></article><?php endforeach; ?></div>
</div></section>

<?php $stake_faq_section = ob_get_clean(); ob_start(); ?>

<?php
$footer_logo=stake_image_url(stake_field('stake_footer_logo'))?:$header_logo;
$footer_partner=stake_link(stake_field('stake_footer_partner_link'),'Stakebonus.com');
?>
<footer class="stake-site-footer"><div class="stake-shell">
 <div class="stake-footer-simple">
  <a class="stake-footer-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php if($footer_logo): ?><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(stake_field('stake_footer_brand','StakeBonus')); ?>"><?php else: ?><strong><?php echo esc_html(stake_field('stake_footer_brand','StakeBonus')); ?></strong><?php endif; ?></a>
  <p><?php echo esc_html(wp_strip_all_tags(stake_field('stake_footer_intro','StakeBonus is an official partner of Stake.com. All content is for informational purposes only and does not promote illegal gambling. Please play responsibly!'))); ?></p>
  <p><?php echo esc_html(stake_field('stake_footer_copyright','©2026 · All rights reserved.')); ?></p>
  <p><?php echo esc_html(stake_field('stake_footer_responsible','This site is not suitable for people under 18 years of age!')); ?> <span><?php echo esc_html(stake_field('stake_footer_age','18')); ?></span></p>
  <p class="stake-footer-disclaimer"><?php echo esc_html(wp_strip_all_tags(stake_field('stake_footer_disclaimer','All trademarks, brand names, and design elements featured on this website are the property of their respective owners and are used with permission from our official partner, Stake.com.'))); ?></p>
 </div>
</div></footer>
<?php $stake_footer_section = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php
$partners=stake_field('stake_partners',array(
 array('text'=>'Drake — Canadian artist representing the brand in music and crypto campaigns'),
 array('text'=>'Sergio Agüero — legendary footballer participating in sports promotions'),
 array('text'=>'Patrice Evra — former French defender serving as a global ambassador'),
 array('text'=>'Frankie Dettori — renowned jockey representing Stake in horse racing'),
));
$partners_image=stake_image_url(stake_field('stake_partners_image'));
$partners_title=stake_field('stake_partners_title','Stake Partners & Ambassadors');
$partners_highlight=stake_field('stake_partners_highlight','Ambassadors');
$get_started_url=$header_login['url'];
$get_started_target=$header_login['target'];
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-partners-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-partners-title"><?php echo stake_highlighted_title($partners_title,$partners_highlight); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_partners_intro','Stake actively works on improving its reputation and is involved in sponsorship and charitable activities. Global ambassadors include:'))); ?></div><ul class="stake-check-list"><?php foreach($partners as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_partners_note','Stake also collaborates with clubs and organizations, expanding its audience worldwide.'))); ?></div><a class="stake-btn stake-btn-inline" href="<?php echo esc_url($get_started_url); ?>" target="<?php echo esc_attr($get_started_target); ?>">Get Started</a></div>
 <div class="stake-content-visual visual-partners<?php echo $partners_image?' has-image':''; ?>"<?php echo $partners_image?' style="background-image:url('.esc_url($partners_image).')"':''; ?>><?php if(!$partners_image): ?><div class="stake-visual-head"><b>Stake</b><strong>PARTNERS &amp;<br>AMBASSADORS</strong></div><div class="stake-visual-screen"><i></i><i></i><i></i><span>UFC</span></div><?php endif; ?></div>
</div></section>

<?php
$bonus_items=stake_field('stake_bonus_items',array(array('text'=>'Place sports bets and play casino games'),array('text'=>'Receive entries for the weekly lottery'),array('text'=>'Participate in the draw at the end of the week'),array('text'=>'Share the weekly prize pool with other players')));
$bonus_title=stake_field('stake_bonus_title','Stake Welcome Bonus for Sports Bettors and Casino Players');
$bonus_highlight=stake_field('stake_bonus_highlight','Welcome Bonus');
$bonus_image=stake_image_url(stake_field('stake_bonus_image'));
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-bonus-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-bonus-title"><?php echo stake_highlighted_title($bonus_title,$bonus_highlight); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bonus_intro','Every player can access ongoing promotions and a weekly lottery:'))); ?></div><ul class="stake-check-list"><?php foreach($bonus_items as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bonus_note','Winners are selected during a live broadcast and winning tickets are determined by a random number generator.'))); ?></div><a class="stake-btn stake-btn-inline" href="<?php echo esc_url($get_started_url); ?>" target="<?php echo esc_attr($get_started_target); ?>">Get Started</a></div>
 <div class="stake-content-visual visual-bonus<?php echo $bonus_image?' has-image':''; ?>"<?php echo $bonus_image?' style="background-image:url('.esc_url($bonus_image).')"':''; ?>><?php if(!$bonus_image): ?><div class="stake-visual-head"><b>Stake</b><strong>WELCOME<br>BONUS</strong></div><div class="stake-promo-row"><i>S</i><i>★</i><i>VIP</i></div><div class="stake-promo-row second"><i>◆</i><i>2×</i><i>RACE</i></div><?php endif; ?></div>
</div></section>

<?php $stake_extra_sections = ob_get_clean(); ?>

<?php
$gallery=stake_field('stake_gallery',array());
$review_image=stake_image_url(stake_field('stake_gallery_feature_image'));
$review_image_fallback=content_url('/uploads/2026/08/main-screenshots-home.webp');
if(!$review_image)$review_image=$review_image_fallback;
$review_title=stake_field('stake_gallery_title','Stake Casino — Independent Fan Guide & Reviews');
if(trim((string)$review_title)==='Stake Official Website Interface Review')$review_title='Stake Casino — Independent Fan Guide & Reviews';
$review_intro=stake_field('stake_gallery_intro','Your independent resource for exploring Stake Casino. Read honest player reviews, discover games and learn about bonuses from a community perspective.');
$review_button_value=stake_field('stake_gallery_button');
$review_button=$review_button_value?stake_link($review_button_value,'Visit the Official Stake Casino'):$header_login;
if(!$review_button_value)$review_button['title']='Visit the Official Stake Casino';
$review_rating=max(0,min(5,(float)stake_field('stake_gallery_rating',4.8)));
$review_rating_label=stake_field('stake_gallery_rating_label','Community Reviews');
$review_rating_note=stake_field('stake_gallery_rating_note','Based on more than 10,000 player experiences and reviews.');
$review_stats=stake_field('stake_gallery_stats',array(
 array('value'=>'2,000+','label'=>'Crypto Games'),
 array('value'=>'45+','label'=>'Bitcoin Games'),
 array('value'=>'24/7','label'=>'Crypto Support'),
 array('value'=>'100K+','label'=>'Crypto Players'),
));
?>
<section class="stake-section stake-gallery-section" aria-labelledby="stake-gallery-title"><div class="stake-shell">
 <div class="stake-review-overview">
  <div class="stake-review-copy">
   <h2 class="stake-heading" id="stake-gallery-title"><?php if(stripos((string)$review_title,'Stake Casino')===0): ?><span>Stake Casino</span><?php echo esc_html(substr((string)$review_title,strlen('Stake Casino'))); ?><?php else: echo esc_html($review_title); endif; ?></h2>
   <p><?php echo esc_html(wp_strip_all_tags($review_intro)); ?></p>
   <a class="stake-btn stake-btn-inline" href="<?php echo esc_url($review_button['url']); ?>" target="<?php echo esc_attr($review_button['target']); ?>"><?php echo esc_html($review_button['title']); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
   <div class="stake-community-rating"><div><strong><?php echo esc_html($review_rating_label); ?></strong><span aria-label="<?php echo esc_attr($review_rating.' out of 5 stars'); ?>">★★★★★</span><b><?php echo esc_html(number_format_i18n($review_rating,1)); ?>/5</b></div><i><span style="width:<?php echo esc_attr($review_rating*20); ?>%"></span></i><small><?php echo esc_html(wp_strip_all_tags($review_rating_note)); ?></small></div>
  </div>
  <div class="stake-review-visual">
   <?php if($review_image): ?><figure><img src="<?php echo esc_url($review_image); ?>" alt="Stake official website interface" loading="lazy"></figure><?php else: ?><div class="stake-review-placeholder" aria-hidden="true">Stake</div><?php endif; ?>
   <?php if($review_stats): ?><div class="stake-review-stats"><?php foreach($review_stats as $stat): ?><div><strong><?php echo esc_html($stat['value']??''); ?></strong><span><?php echo esc_html($stat['label']??''); ?></span></div><?php endforeach; ?></div><?php endif; ?>
  </div>
 </div>
 <div class="stake-gallery <?php echo !$gallery?'is-placeholder':''; ?>"><?php if($gallery): foreach($gallery as $item): $src=stake_image_url($item['image']??''); if(!$src)continue; ?><figure><img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($item['image']['alt']??'Stake interface'); ?>" loading="lazy"></figure><?php endforeach; else: for($i=0;$i<5;$i++): ?><div class="stake-gallery-ui"><span>◆ Stake</span><i></i><i></i><i></i><b></b></div><?php endfor; endif; ?></div>
</div></section>

<?php echo $stake_extra_sections; ?>

<?php
$features_title=stake_field('stake_features_title','Why Is Stake Casino So Popular?');
$features_highlight=stake_field('stake_features_highlight','Stake Casino');
$features_intro=stake_field('stake_features_intro','Discover the platform features most often highlighted by Stake Casino players.');
if(trim((string)$features_title)==='Stake Features')$features_title='Why Is Stake Casino So Popular?';
if(trim(wp_strip_all_tags((string)$features_intro))==='Explore the key features designed to make the platform secure, accessible and enjoyable.')$features_intro='Discover the platform features most often highlighted by Stake Casino players.';
?>
<section class="stake-section stake-features-section" aria-labelledby="stake-features-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-features-title"><?php echo stake_highlighted_title($features_title,$features_highlight); ?></h2>
 <div class="stake-intro"><?php echo wp_kses_post(wpautop($features_intro)); ?></div>
 <div class="stake-features"><?php foreach($features as $index=>$feature): $src=stake_image_url($feature['image']??''); $icon_class=$feature['icon']??array('fa-shield-halved','fa-bolt','fa-headset','fa-coins','fa-mobile-screen-button','fa-trophy')[$index%6]; ?><article class="stake-feature"><div class="stake-feature-icon"><?php if($src): ?><img src="<?php echo esc_url($src); ?>" alt="" loading="lazy"><?php else: ?><i class="fa-solid <?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i><?php endif; ?></div><h3><?php echo esc_html($feature['title']??'Feature'); ?></h3><div><?php echo wp_kses_post(wpautop($feature['description']??'')); ?></div></article><?php endforeach; ?></div>
 </div></section>

<?php
$testimonials=stake_field('stake_testimonials',array(
 array('rating'=>5,'quote'=>'I have been using Stake for over a year now and the experience has been fantastic. The game selection is huge, and I love how fast the withdrawals are processed.','name'=>'Alex P.','date'=>'August 2026'),
 array('rating'=>5,'quote'=>'The VIP program at Stake is unlike any other. The personalized bonuses and dedicated host make me feel valued as a player. Highly recommended!','name'=>'Sarah M.','date'=>'July 2026'),
 array('rating'=>4,'quote'=>'Best crypto casino out there. Clean interface, great selection of games, and 24/7 support that actually helps when you need it.','name'=>'James K.','date'=>'June 2026'),
 array('rating'=>5,'quote'=>'Deposits are credited quickly, the sportsbook is easy to navigate, and the live betting experience has been smooth on every device.','name'=>'Michael R.','date'=>'May 2026'),
));
?>
<section class="stake-section stake-testimonials-section" aria-labelledby="stake-testimonials-title" data-testimonial-slider><div class="stake-shell">
 <div class="stake-testimonials-top"><div class="stake-testimonials-heading"><h2 class="stake-heading" id="stake-testimonials-title"><?php echo esc_html(stake_field('stake_testimonials_title','Player')); ?> <span><?php echo esc_html(stake_field('stake_testimonials_highlight','Testimonials')); ?></span></h2><div><?php echo wp_kses_post(wpautop(stake_field('stake_testimonials_intro','Hear from players around the world and discover their experience with Stake.'))); ?></div></div><div class="stake-slider-arrows stake-testimonial-arrows"><button type="button" data-testimonial-prev aria-label="Previous testimonials"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button><button type="button" data-testimonial-next aria-label="Next testimonials"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button></div></div>
 <div class="stake-testimonials-grid" data-testimonial-track tabindex="0"><?php foreach($testimonials as $index=>$testimonial): $rating=max(0,min(5,(int)($testimonial['rating']??5))); $avatar=stake_image_url($testimonial['avatar']??''); $avatar_src=$avatar?:get_stylesheet_directory_uri().'/assets/images/testimonial-avatar-real-'.(int)($index%3+1).'.webp'; $testimonial_date=preg_replace('/\b(?:19|20)\d{2}\b/',wp_date('Y'),(string)($testimonial['date']??wp_date('F Y'))); ?><article class="stake-testimonial-card">
  <div class="stake-testimonial-stars" aria-label="<?php echo esc_attr($rating.' out of 5 stars'); ?>"><?php for($star=1;$star<=5;$star++): ?><span<?php echo $star>$rating?' class="is-muted"':''; ?>>★</span><?php endfor; ?></div>
  <blockquote><?php echo esc_html(wp_strip_all_tags($testimonial['quote']??'')); ?></blockquote><footer><img class="stake-testimonial-avatar" src="<?php echo esc_url($avatar_src); ?>" alt="<?php echo esc_attr($testimonial['name']??'Player'); ?>" loading="lazy"><span><strong><?php echo esc_html($testimonial['name']??'Player'); ?></strong><time><?php echo esc_html($testimonial_date); ?></time></span></footer>
 </article><?php endforeach; ?></div>
</div></section>

<?php echo $stake_faq_section; ?>
<?php
$crypto_items=stake_field('stake_crypto_items',array(
 array('name'=>'Bitcoin','symbol'=>'BTC','mark'=>'₿'), array('name'=>'Ethereum','symbol'=>'ETH','mark'=>'Ξ'), array('name'=>'Litecoin','symbol'=>'LTC','mark'=>'Ł'),
 array('name'=>'Dogecoin','symbol'=>'DOGE','mark'=>'Ð'), array('name'=>'Ripple','symbol'=>'XRP','mark'=>'X'), array('name'=>'Bitcoin Cash','symbol'=>'BCH','mark'=>'₿'),
 array('name'=>'USD Coin','symbol'=>'USDC','mark'=>'$'), array('name'=>'Tether','symbol'=>'USDT','mark'=>'₮'), array('name'=>'DAI','symbol'=>'DAI','mark'=>'D'),
 array('name'=>'BNB','symbol'=>'BNB','mark'=>'B'), array('name'=>'Cronos','symbol'=>'CRO','mark'=>'C'), array('name'=>'Cardano','symbol'=>'ADA','mark'=>'A'),
 array('name'=>'Solana','symbol'=>'SOL','mark'=>'S'), array('name'=>'EOS','symbol'=>'EOS','mark'=>'E'), array('name'=>'TRON','symbol'=>'TRX','mark'=>'T'),
 array('name'=>'Polygon','symbol'=>'POL','mark'=>'P'), array('name'=>'Chainlink','symbol'=>'LINK','mark'=>'L'), array('name'=>'Uniswap','symbol'=>'UNI','mark'=>'U'),
));
?>
<section class="stake-section stake-crypto-section" aria-labelledby="stake-crypto-title"><div class="stake-shell">
 <div class="stake-crypto-heading"><h2 class="stake-heading" id="stake-crypto-title"><?php echo esc_html(stake_field('stake_crypto_title','Payments with')); ?> <span><?php echo esc_html(stake_field('stake_crypto_highlight','Cryptocurrencies')); ?></span></h2><div><?php echo wp_kses_post(wpautop(stake_field('stake_crypto_intro','Stake supports a wide range of cryptocurrencies for fast and secure transactions.'))); ?></div></div>
 <div class="stake-crypto-grid"><?php foreach($crypto_items as $index=>$crypto): $crypto_icon=stake_image_url($crypto['icon_image']??''); $crypto_svg=stake_safe_svg($crypto['icon_svg']??''); ?><article class="stake-crypto-card">
  <span class="stake-crypto-icon crypto-<?php echo (int)($index%6+1); ?>" aria-hidden="true"><?php if($crypto_icon): ?><img src="<?php echo esc_url($crypto_icon); ?>" alt="" loading="lazy"><?php elseif($crypto_svg): echo $crypto_svg; else: echo esc_html($crypto['mark']??substr($crypto['name']??'C',0,1)); endif; ?></span>
  <strong><?php echo esc_html($crypto['name']??'Cryptocurrency'); ?><?php if(!empty($crypto['symbol'])): ?> <small>(<?php echo esc_html($crypto['symbol']); ?>)</small><?php endif; ?></strong>
 </article><?php endforeach; ?></div>
</div></section>
<?php echo $stake_footer_section; ?>
