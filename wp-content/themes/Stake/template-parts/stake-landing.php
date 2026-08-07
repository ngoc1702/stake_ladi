<?php
if (!defined('ABSPATH')) exit;
$login = stake_link(stake_field('stake_login_button'), 'Log In');
$register = stake_link(stake_field('stake_register_button'), 'Register');
$socials = stake_field('stake_socials', array(
    array('name'=>'Google','icon'=>'G','link'=>array('url'=>'#')), array('name'=>'Facebook','icon'=>'f','link'=>array('url'=>'#')), array('name'=>'Kick','icon'=>'K','link'=>array('url'=>'#')),
));
$games = stake_field('stake_games', array(
    array('title'=>'Gates of Olympus 1000','playing'=>'502 playing'), array('title'=>'The Dog House Megaways 1000','playing'=>'147 playing'),
    array('title'=>'Wanted Dead or A Wild','playing'=>'133 playing'), array('title'=>'Sugar Twist 1000','playing'=>'103 playing'),
    array('title'=>'Big Bass Rock and Roll','playing'=>'189 playing'), array('title'=>"Waylander's Forge",'playing'=>'161 playing'),
));
$facts = stake_field('stake_facts', array(
    array('label'=>'Year of Foundation','value'=>'2017'), array('label'=>'Owner','value'=>'Medium Rare N.V.'),
    array('label'=>'Official License','value'=>'Curaçao OGL/2024/1451/0918'),
    array('label'=>'Languages','value'=>'English, Spanish, Japanese, Chinese, Portuguese, Hindi, Indonesian, Korean, Vietnamese and more'),
    array('label'=>'Platforms','value'=>'Windows, Android, iOS'), array('label'=>'Casino Games','value'=>'Slots, Roulette, Poker, Blackjack, Baccarat, Bingo, Keno, Live'),
    array('label'=>'Currency','value'=>'INR, USD, EUR, RUB, BTC, USDT, USDC, SOL, ETH, DOGE'), array('label'=>'Customer Support','value'=>'24/7 online support'),
));
$pros = stake_field('stake_pros', array(array('text'=>'More than 5,000 slot games'),array('text'=>'Unique bonus program'),array('text'=>'Support for dozens of betting currencies'),array('text'=>'Cryptocurrency deposits and withdrawals'),array('text'=>'Valid license'),array('text'=>'24/7 customer support')));
$cons = stake_field('stake_cons', array(array('text'=>'No downloadable mobile app'),array('text'=>'No registration bonus')));
$features = stake_field('stake_features', array(
    array('title'=>'Legality and Security','description'=>'The platform operates under a valid license and follows strict security practices for player protection.'),
    array('title'=>'Personal Data Protection','description'=>'Secure connections and modern encryption help protect information during every session.'),
    array('title'=>'Wide Selection of Gambling Games','description'=>'Thousands of slots, table games and live dealer experiences from leading providers.'),
    array('title'=>'Hundreds of Sports Betting Events','description'=>'Follow popular sports and explore a broad range of pre-match and live betting events.'),
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
    <?php foreach($socials as $social): $sl=stake_link($social['link']??array(),$social['name']??'Open'); ?><a href="<?php echo esc_url($sl['url']); ?>"><i><?php echo esc_html($social['icon']??'•'); ?></i><b><?php echo esc_html($social['name']??$sl['title']); ?></b><em>›</em></a><?php endforeach; ?>
   </div></div><?php endif; ?>
  </div>
  <?php $hero_image=stake_image_url(stake_field('stake_hero_image')); ?>
  <div class="stake-hero-visual<?php echo $hero_image?' has-image':''; ?>"<?php echo $hero_image?' style="background-image:url('.esc_url($hero_image).')"':''; ?>>
   <?php if(!$hero_image): ?><div class="stake-ui stake-ui-back"><span></span><span></span><span></span></div><div class="stake-ui stake-ui-front"><div class="stake-ui-nav">◆ Stake <i></i></div><div class="stake-ui-cards"><b>CASINO</b><b>SPORTS</b><b>LIVE</b></div><div class="stake-ui-lines"></div></div><strong class="stake-wordmark">Stake</strong><?php endif; ?>
  </div>
 </div>
</section>

<section class="stake-section" aria-labelledby="stake-games-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-games-title"><?php echo esc_html(stake_field('stake_games_title','Trending Games in India')); ?></h2>
 <div class="stake-games"><?php foreach($games as $index=>$game): $gl=stake_link($game['link']??array(),'Play'); $bg=stake_image_url($game['image']??''); ?>
  <article class="stake-game game-<?php echo (int)($index%6+1); ?>"<?php echo $bg?' style="background-image:linear-gradient(90deg,rgba(10,20,47,.88),rgba(10,20,47,.12)),url('.esc_url($bg).')"':''; ?>><span class="stake-live"><i></i><?php echo esc_html($game['playing']??'Online'); ?></span><h3><?php echo esc_html($game['title']??'Game'); ?></h3><a href="<?php echo esc_url($gl['url']); ?>" aria-label="<?php echo esc_attr($gl['title'].' '.($game['title']??'')); ?>">→]</a></article>
 <?php endforeach; ?></div>
</div></section>

<?php ob_start(); ?>
<?php $faq_items=stake_field('stake_faq_items',array(
 array('question'=>'Is it allowed to create multiple accounts on Stake?','answer'=>'No. Each player should maintain only one account and follow the platform terms.'),
 array('question'=>'Can I set or change my daily deposit limits?','answer'=>'Account limits can be managed from the responsible gaming or account settings area where available.'),
 array('question'=>'Is Stake a legal bookmaker in India?','answer'=>'Players should review the rules that apply in their location and the licensing information provided by the operator.'),
 array('question'=>'How do I log in to my Stake profile?','answer'=>'Select Log In, then enter the credentials associated with your account.'),
 array('question'=>'Does Stake offer any no-deposit bonus codes?','answer'=>'Available offers may change. Review the current promotion terms before participating.'),
)); ?>
<section class="stake-section stake-faq-section" aria-labelledby="stake-faq-title"><div class="stake-shell stake-faq-grid">
 <div class="stake-faq-meta"><h2 class="stake-heading" id="stake-faq-title"><?php echo esc_html(stake_field('stake_faq_title','FAQ')); ?></h2><p><?php echo esc_html(stake_field('stake_faq_updated','Updated: Wed, 29 Jul 2026 08:18:42')); ?></p></div>
 <div class="stake-accordion"><?php foreach($faq_items as $index=>$item): $answer_id='stake-faq-answer-'.(int)$index; ?><article class="stake-faq-item"><h3><button type="button" aria-expanded="false" aria-controls="<?php echo esc_attr($answer_id); ?>"><span><?php echo esc_html($item['question']??''); ?></span><i aria-hidden="true">+</i></button></h3><div class="stake-faq-answer" id="<?php echo esc_attr($answer_id); ?>" hidden><?php echo wp_kses_post(wpautop($item['answer']??'')); ?></div></article><?php endforeach; ?></div>
</div></section>

<?php
$footer_logo=stake_image_url(stake_field('stake_footer_logo'));
$footer_currencies=stake_field('stake_footer_currencies',array(
 array('icon'=>'₿','label'=>'Bitcoin'),array('icon'=>'◉','label'=>'Cardano'),array('icon'=>'≋','label'=>'Solana'),array('icon'=>'$','label'=>'USD Coin'),array('icon'=>'₮','label'=>'Tether'),array('icon'=>'X','label'=>'XRP'),array('icon'=>'◆','label'=>'Ethereum'),array('icon'=>'D','label'=>'Dogecoin')
));
$footer_columns=stake_field('stake_footer_columns',array(
 array('title'=>'Casino','links'=>array(array('label'=>'Slots'),array('label'=>'Live Casino'),array('label'=>'Roulette'),array('label'=>'Blackjack'),array('label'=>'Poker'))),
 array('title'=>'Sports','links'=>array(array('label'=>'Cricket'),array('label'=>'Football'),array('label'=>'Basketball'),array('label'=>'Tennis'),array('label'=>'eSports'))),
 array('title'=>'Support','links'=>array(array('label'=>'Contact Us'),array('label'=>'Responsible Gambling'))),
 array('title'=>'About Us','links'=>array(array('label'=>'VIP'),array('label'=>'Affiliate'),array('label'=>'Privacy Policy'),array('label'=>'AML Policy'),array('label'=>'Terms of Service'))),
));
$footer_android=stake_link(stake_field('stake_footer_android'),'☁ Download App');
$footer_ios=stake_link(stake_field('stake_footer_ios'),'● Download App');
$footer_socials=stake_field('stake_footer_socials',array(array('icon'=>'𝕏','label'=>'X'),array('icon'=>'▶','label'=>'YouTube'),array('icon'=>'◎','label'=>'Instagram'),array('icon'=>'f','label'=>'Facebook'),array('icon'=>'♪','label'=>'TikTok')));
?>
<footer class="stake-site-footer"><div class="stake-shell">
 <div class="stake-footer-main"><div class="stake-footer-identity"><a class="stake-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php if($footer_logo): ?><img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(stake_field('stake_footer_brand','Stake')); ?>"><?php else: ?><strong><?php echo esc_html(stake_field('stake_footer_brand','Stake')); ?></strong><?php endif; ?><span><?php echo esc_html(stake_field('stake_footer_flag','🇮🇳')); ?></span></a><div class="stake-currencies"><?php foreach($footer_currencies as $currency): ?><span title="<?php echo esc_attr($currency['label']??''); ?>"><?php echo esc_html($currency['icon']??'•'); ?></span><?php endforeach; ?></div></div>
  <div class="stake-footer-columns"><?php foreach($footer_columns as $column): ?><nav class="stake-footer-column" aria-label="<?php echo esc_attr($column['title']??'Footer'); ?>"><h3><?php echo esc_html($column['title']??''); ?></h3><?php foreach(($column['links']??array()) as $item): $fl=stake_link($item['link']??array(),$item['label']??'Link'); ?><a href="<?php echo esc_url($fl['url']); ?>" target="<?php echo esc_attr($fl['target']); ?>"><?php echo esc_html($item['label']??$fl['title']); ?></a><?php endforeach; ?></nav><?php endforeach; ?></div></div>
 <div class="stake-footer-bottom"><div class="stake-app-buttons"><a class="stake-btn" href="<?php echo esc_url($footer_android['url']); ?>"><?php echo esc_html($footer_android['title']); ?></a><a class="stake-btn" href="<?php echo esc_url($footer_ios['url']); ?>"><?php echo esc_html($footer_ios['title']); ?></a><span><?php echo esc_html(stake_field('stake_footer_age','18+')); ?></span></div><div class="stake-footer-socials"><?php foreach($footer_socials as $social): $fs=stake_link($social['link']??array(),$social['label']??'Social'); ?><a href="<?php echo esc_url($fs['url']); ?>" aria-label="<?php echo esc_attr($social['label']??$fs['title']); ?>"><?php echo esc_html($social['icon']??'•'); ?></a><?php endforeach; ?></div></div>
</div></footer>
<?php $stake_closing_sections = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php
$partners=stake_field('stake_partners',array(
 array('text'=>'Drake — Canadian artist representing the brand in music and crypto campaigns'),
 array('text'=>'Sergio Agüero — legendary footballer participating in sports promotions'),
 array('text'=>'Patrice Evra — former French defender serving as a global ambassador'),
 array('text'=>'Frankie Dettori — renowned jockey representing Stake in horse racing'),
));
$partners_image=stake_image_url(stake_field('stake_partners_image'));
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-partners-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-partners-title"><?php echo esc_html(stake_field('stake_partners_title','Stake Partners & Ambassadors')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_partners_intro','Stake actively works on improving its reputation and is involved in sponsorship and charitable activities. Global ambassadors include:'))); ?></div><ul class="stake-check-list"><?php foreach($partners as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_partners_note','Stake also collaborates with clubs and organizations, expanding its audience worldwide.'))); ?></div></div>
 <div class="stake-content-visual visual-partners<?php echo $partners_image?' has-image':''; ?>"<?php echo $partners_image?' style="background-image:url('.esc_url($partners_image).')"':''; ?>><?php if(!$partners_image): ?><div class="stake-visual-head"><b>Stake</b><strong>PARTNERS &amp;<br>AMBASSADORS</strong></div><div class="stake-visual-screen"><i></i><i></i><i></i><span>UFC</span></div><?php endif; ?></div>
</div></section>

<?php $legal_image=stake_image_url(stake_field('stake_legal_image')); ?>
<section class="stake-section stake-soft stake-content-section" aria-labelledby="stake-legal-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-legal-title"><?php echo esc_html(stake_field('stake_legal_title','Is Stake Legal and Secure for Players in India?')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_legal_content','The Stake brand belongs to Medium Rare N.V. The platform operates under an international gaming license and applies security measures designed to protect its players.'))); ?></div></div>
 <div class="stake-content-visual visual-legal<?php echo $legal_image?' has-image':''; ?>"<?php echo $legal_image?' style="background-image:url('.esc_url($legal_image).')"':''; ?>><?php if(!$legal_image): ?><div class="stake-visual-head"><strong>LEGAL</strong><b>Stake</b></div><div class="stake-license-shield"><span>LICENSED</span><i>✓</i><small>SECURE</small></div><?php endif; ?></div>
</div></section>

<?php
$bonus_items=stake_field('stake_bonus_items',array(array('text'=>'Place sports bets and play casino games'),array('text'=>'Receive entries for the weekly lottery'),array('text'=>'Participate in the draw at the end of the week'),array('text'=>'Share the weekly prize pool with other players')));
$bonus_button=stake_link(stake_field('stake_bonus_button'),'Get Bonus'); $bonus_image=stake_image_url(stake_field('stake_bonus_image'));
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-bonus-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-bonus-title"><?php echo esc_html(stake_field('stake_bonus_title','Stake Welcome Bonus for Sports Bettors and Casino Players')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bonus_intro','Every player can access ongoing promotions and a weekly lottery:'))); ?></div><ul class="stake-check-list"><?php foreach($bonus_items as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bonus_note','Winners are selected during a live broadcast and winning tickets are determined by a random number generator.'))); ?></div><a class="stake-btn stake-btn-inline" href="<?php echo esc_url($bonus_button['url']); ?>"><?php echo esc_html($bonus_button['title']); ?></a></div>
 <div class="stake-content-visual visual-bonus<?php echo $bonus_image?' has-image':''; ?>"<?php echo $bonus_image?' style="background-image:url('.esc_url($bonus_image).')"':''; ?>><?php if(!$bonus_image): ?><div class="stake-visual-head"><b>Stake</b><strong>WELCOME<br>BONUS</strong></div><div class="stake-promo-row"><i>S</i><i>★</i><i>VIP</i></div><div class="stake-promo-row second"><i>◆</i><i>2×</i><i>RACE</i></div><?php endif; ?></div>
</div></section>

<?php
$android_steps=stake_field('stake_android_steps',array(array('text'=>'Open the website in Google Chrome'),array('text'=>'Tap the three-dot button at the top of the screen'),array('text'=>'Select “Add to Home screen”')));
$ios_steps=stake_field('stake_ios_steps',array(array('text'=>'Open the Stake website in Safari'),array('text'=>'Tap the upward arrow button'),array('text'=>'Choose “Add to Home Screen”'),array('text'=>'Create a name and tap “Add”')));
$android_button=stake_link(stake_field('stake_android_button'),'Download App'); $ios_button=stake_link(stake_field('stake_ios_button'),'Download App');
$android_image=stake_image_url(stake_field('stake_android_image')); $ios_image=stake_image_url(stake_field('stake_ios_image'));
?>
<section class="stake-section stake-soft stake-mobile-section" aria-labelledby="stake-mobile-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-mobile-title"><?php echo esc_html(stake_field('stake_mobile_title','Betting on Your Phone: Stake Mobile App Guide for India')); ?></h2><div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_mobile_intro','The website is optimized for mobile devices and can be installed as a convenient PWA shortcut.'))); ?></div>
 <div class="stake-mobile-row"><div class="stake-content-copy"><h3 class="stake-subheading"><?php echo esc_html(stake_field('stake_android_title','Android App')); ?></h3><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_android_content','Open Stake in Google Chrome and install the PWA version directly from your browser.'))); ?></div><ol class="stake-step-list"><?php foreach($android_steps as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ol><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_android_note','A shortcut with the Stake logo will appear on your smartphone screen.'))); ?></div><a class="stake-btn stake-btn-inline" href="<?php echo esc_url($android_button['url']); ?>"><?php echo esc_html($android_button['title']); ?></a></div><div class="stake-phone-visual android<?php echo $android_image?' has-image':''; ?>"<?php echo $android_image?' style="background-image:url('.esc_url($android_image).')"':''; ?>><?php if(!$android_image): ?><div class="stake-visual-head"><strong>ANDROID</strong><b>Stake</b></div><div class="stake-phone one"><span>Stake</span><i></i><i></i><i></i><i></i></div><div class="stake-phone two"><span>Register</span><i></i><i></i></div><?php endif; ?></div></div>
 <div class="stake-mobile-row is-ios"><div class="stake-content-copy"><h3 class="stake-subheading"><?php echo esc_html(stake_field('stake_ios_title','iOS App')); ?></h3><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_ios_content','iPhone and iPad users can install the PWA shortcut from Safari.'))); ?></div><ol class="stake-step-list"><?php foreach($ios_steps as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ol><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_ios_note','Tap the shortcut to launch the application, then register or log in.'))); ?></div><a class="stake-btn stake-btn-inline" href="<?php echo esc_url($ios_button['url']); ?>"><?php echo esc_html($ios_button['title']); ?></a></div><div class="stake-phone-visual ios<?php echo $ios_image?' has-image':''; ?>"<?php echo $ios_image?' style="background-image:url('.esc_url($ios_image).')"':''; ?>><?php if(!$ios_image): ?><div class="stake-visual-head"><b>Stake</b><strong>iOS</strong></div><div class="stake-phone one"><span>Log In</span><i></i><i></i><i></i><i></i></div><div class="stake-phone two"><span>Originals</span><i></i><i></i></div><?php endif; ?></div></div>
</div></section>

<?php $sports=stake_field('stake_sports',array(
 array('title'=>'Cricket','description'=>'A popular team sport with a wide selection of formats and competitions.','events'=>array(array('text'=>'ICC Cricket World Cup'),array('text'=>'ICC T20 World Cup'),array('text'=>'Indian Premier League')),'note'=>'Explore match outcomes, totals and long-term tournament results.'),
 array('title'=>'Football','description'=>'The world’s most popular sport offers dynamic matches and many statistical markets.','events'=>array(array('text'=>'FIFA World Cup'),array('text'=>'UEFA Champions League'),array('text'=>'English Premier League')),'note'=>'Markets include match results, handicaps, totals and player statistics.'),
 array('title'=>'Tennis','description'=>'An individual sport with a busy year-round calendar and daily events.','events'=>array(array('text'=>'Wimbledon'),array('text'=>'US Open'),array('text'=>'Australian Open')),'note'=>'Choose match winners, set scores, game totals and other indicators.'),
)); ?>
<section class="stake-section stake-sports-section" aria-labelledby="stake-sports-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-sports-title"><?php echo esc_html(stake_field('stake_sports_title','Sports Betting Online at Stake India')); ?></h2><div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_sports_intro','Place bets across dozens of sports and hundreds of sporting events every day.'))); ?></div>
 <div class="stake-sports-grid"><?php foreach($sports as $index=>$sport): $src=stake_image_url($sport['image']??''); ?><article class="stake-sport-card"><div class="stake-sport-image sport-<?php echo (int)($index%6+1); ?>"<?php echo $src?' style="background-image:url('.esc_url($src).')"':''; ?>><strong><?php echo esc_html($sport['title']??'Sport'); ?></strong></div><h3><?php echo esc_html($sport['title']??'Sport'); ?></h3><div class="stake-richtext"><?php echo wp_kses_post(wpautop($sport['description']??'')); ?></div><?php if(!empty($sport['events'])): ?><ul class="stake-check-list is-compact"><?php foreach($sport['events'] as $event): ?><li><?php echo esc_html($event['text']??''); ?></li><?php endforeach; ?></ul><?php endif; ?><div class="stake-richtext"><?php echo wp_kses_post(wpautop($sport['note']??'')); ?></div></article><?php endforeach; ?></div>
</div></section>
<?php $stake_extra_sections = ob_get_clean(); ?>

<section class="stake-section stake-soft" aria-labelledby="stake-overview-title"><div class="stake-shell stake-narrow">
 <h2 class="stake-heading" id="stake-overview-title"><?php echo esc_html(stake_field('stake_overview_title','Essential Facts and Overview of Stake India')); ?></h2>
 <div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_overview_intro','A concise overview of the platform, its operation and the services available to players.'))); ?></div>
 <div class="stake-facts"><?php foreach($facts as $fact): ?><div class="stake-fact"><strong><?php echo esc_html($fact['label']??''); ?></strong><span><?php echo esc_html($fact['value']??''); ?></span></div><?php endforeach; ?></div>
</div></section>

<?php $gallery=stake_field('stake_gallery',array()); ?>
<section class="stake-section stake-gallery-section" aria-labelledby="stake-gallery-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-gallery-title"><?php echo esc_html(stake_field('stake_gallery_title','Stake Official Website Interface Review')); ?></h2>
 <div class="stake-gallery <?php echo !$gallery?'is-placeholder':''; ?>"><?php if($gallery): foreach($gallery as $item): $src=stake_image_url($item['image']??''); if(!$src)continue; ?><figure><img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($item['image']['alt']??'Stake interface'); ?>" loading="lazy"></figure><?php endforeach; else: for($i=0;$i<5;$i++): ?><div class="stake-gallery-ui"><span>◆ Stake</span><i></i><i></i><i></i><b></b></div><?php endfor; endif; ?></div>
</div></section>

<section class="stake-section" aria-labelledby="stake-pros-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-pros-title"><?php echo esc_html(stake_field('stake_pros_title','Pros and Cons of Playing on Stake')); ?></h2>
 <div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_pros_intro','Review the main advantages and limitations before creating your account.'))); ?></div>
 <div class="stake-pros-grid"><article class="stake-list-card is-pro"><h3>Pros</h3><ul><?php foreach($pros as $item)echo '<li>'.esc_html($item['text']??'').'</li>'; ?></ul></article><article class="stake-list-card is-con"><h3>Cons</h3><ul><?php foreach($cons as $item)echo '<li>'.esc_html($item['text']??'').'</li>'; ?></ul></article></div>
 <div class="stake-note"><?php echo wp_kses_post(wpautop(stake_field('stake_pros_note','Need more information? Contact customer support for assistance.'))); ?></div>
</div></section>

<section class="stake-section stake-soft stake-features-section" aria-labelledby="stake-features-title"><div class="stake-shell stake-narrow">
 <h2 class="stake-heading" id="stake-features-title"><?php echo esc_html(stake_field('stake_features_title','Stake Features')); ?></h2>
 <div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_features_intro','Explore the key features designed to make the platform secure, accessible and enjoyable.'))); ?></div>
 <div class="stake-features"><?php foreach($features as $index=>$feature): $src=stake_image_url($feature['image']??''); ?><article class="stake-feature"><div class="stake-feature-icon feature-<?php echo (int)($index%4+1); ?>"><?php if($src): ?><img src="<?php echo esc_url($src); ?>" alt="" loading="lazy"><?php else: ?><span><?php echo esc_html(array('◆','✓','♠','⚡')[$index%4]); ?></span><?php endif; ?></div><h3><?php echo esc_html($feature['title']??'Feature'); ?></h3><div><?php echo wp_kses_post(wpautop($feature['description']??'')); ?></div></article><?php endforeach; ?></div>
</div></section>
<?php echo $stake_extra_sections; ?>

<?php
$esports_items=stake_field('stake_esports_items',array(
 array('text'=>'Dota 2 — a team-based MOBA with international tournaments and diverse betting markets'),
 array('text'=>'Counter-Strike 2 — a tactical 5v5 shooter with round and map-based markets'),
 array('text'=>'FIFA — football simulation matches with official leagues and clubs'),
 array('text'=>'League of Legends — a strategic MOBA with major global championships'),
 array('text'=>'NBA 2K — competitive basketball simulation events'),
 array('text'=>'Rocket League — fast arcade competition combining football and cars'),
 array('text'=>'Valorant — a tactical shooter with teams, maps and tournament markets'),
));
$esports_image=stake_image_url(stake_field('stake_esports_image'));
?>
<section class="stake-section stake-soft stake-content-section" aria-labelledby="stake-esports-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-esports-title"><?php echo esc_html(stake_field('stake_esports_title','eSports That You Can Bet on Stake')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_esports_intro','Explore a dedicated eSports section covering the most popular competitive games:'))); ?></div><ul class="stake-check-list is-detailed"><?php foreach($esports_items as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_esports_note','Choose from match winner, map results, total kills, event duration and many more markets.'))); ?></div></div>
 <div class="stake-content-visual visual-esports<?php echo $esports_image?' has-image':''; ?>"<?php echo $esports_image?' style="background-image:url('.esc_url($esports_image).')"':''; ?>><?php if(!$esports_image): ?><div class="stake-visual-head"><strong>ESPORTS</strong><b>Stake</b></div><div class="stake-category-menu"><span>Dota 2 Duels</span><span>eCricket</span><span>FIFA</span><span>League of Legends</span><span>NBA2K</span></div><div class="stake-market-screen"><i></i><i></i><i></i><i></i></div><?php endif; ?></div>
</div></section>

<?php
$virtual_items=stake_field('stake_virtual_items',array(array('text'=>'Football'),array('text'=>'Cricket'),array('text'=>'Basketball'),array('text'=>'Horse racing'),array('text'=>'Greyhound racing')));
$virtual_image=stake_image_url(stake_field('stake_virtual_image'));
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-virtual-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-virtual-title"><?php echo esc_html(stake_field('stake_virtual_title','Virtual Sports')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_virtual_intro','Virtual sports let you place predictions on computer-simulated match outcomes. Available sports include:'))); ?></div><ul class="stake-check-list"><?php foreach($virtual_items as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_virtual_note','Results depend on computer algorithms and cannot be influenced by players.'))); ?></div></div>
 <div class="stake-content-visual visual-virtual<?php echo $virtual_image?' has-image':''; ?>"<?php echo $virtual_image?' style="background-image:url('.esc_url($virtual_image).')"':''; ?>><?php if(!$virtual_image): ?><div class="stake-visual-head"><b>Stake</b><strong>VIRTUAL SPORTS</strong></div><div class="stake-wide-screen"><i></i><i></i><i></i><div><span></span><span></span><span></span><span></span></div></div><?php endif; ?></div>
</div></section>

<?php
$bet_types=stake_field('stake_bet_types',array(
 array('name'=>'Single','description'=>'Select one outcome with a single odd. A successful selection pays the stake multiplied by that odd.'),
 array('name'=>'Accumulator','description'=>'Combine at least two outcomes. The potential payout and risk increase with every selection.'),
));
$bet_types_image=stake_image_url(stake_field('stake_bet_types_image'));
?>
<section class="stake-section stake-soft stake-content-section" aria-labelledby="stake-bet-types-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-bet-types-title"><?php echo esc_html(stake_field('stake_bet_types_title','Exploring the Main Types of Bets')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bet_types_intro','Choose a bet type after adding at least one selection to your bet slip:'))); ?></div><ul class="stake-check-list is-detailed"><?php foreach($bet_types as $item): ?><li><strong><?php echo esc_html($item['name']??''); ?>.</strong> <?php echo esc_html($item['description']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bet_types_note','Review your prediction carefully before confirming the bet.'))); ?></div></div>
 <div class="stake-content-visual visual-bet-types<?php echo $bet_types_image?' has-image':''; ?>"<?php echo $bet_types_image?' style="background-image:url('.esc_url($bet_types_image).')"':''; ?>><?php if(!$bet_types_image): ?><div class="stake-visual-head"><strong>TYPES OF BETS</strong><b>Stake</b></div><div class="stake-odds-screen"><nav>Main &nbsp; Same Game Multi &nbsp; Goals &nbsp; Corners</nav><i></i><i></i><i></i></div><?php endif; ?></div>
</div></section>

<?php
$bet_options=stake_field('stake_bet_options',array(
 array('name'=>'Prematch','description'=>'Bet on future matches with time to analyze the event, teams and statistics.'),
 array('name'=>'Live','description'=>'Bet while the match is in progress with odds that update as the action changes.'),
));
$bet_options_image=stake_image_url(stake_field('stake_bet_options_image'));
?>
<section class="stake-section stake-content-section" aria-labelledby="stake-bet-options-title"><div class="stake-shell stake-content-grid">
 <div class="stake-content-copy"><h2 class="stake-heading" id="stake-bet-options-title"><?php echo esc_html(stake_field('stake_bet_options_title','Advanced Betting Options and Features at Stake')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bet_options_intro','Sporting events are divided into categories with their own features:'))); ?></div><ul class="stake-check-list is-detailed"><?php foreach($bet_options as $item): ?><li><strong><?php echo esc_html($item['name']??''); ?>.</strong> <?php echo esc_html($item['description']??''); ?></li><?php endforeach; ?></ul><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_bet_options_note','You can combine selections from different sections using one account balance.'))); ?></div></div>
 <div class="stake-content-visual visual-bet-options<?php echo $bet_options_image?' has-image':''; ?>"<?php echo $bet_options_image?' style="background-image:url('.esc_url($bet_options_image).')"':''; ?>><?php if(!$bet_options_image): ?><div class="stake-visual-head"><b>Stake</b><strong>BETTING OPTIONS</strong></div><div class="stake-option-tabs"><span>Sports Home</span><span>Live Betting</span><span>My Bets</span></div><div class="stake-tile-screen"><i></i><i></i><i></i><i></i><i></i><i></i></div><?php endif; ?></div>
</div></section>

<?php $casino_games=stake_field('stake_casino_games',array(
 array('title'=>'Sweet Bonanza','description'=>'A colorful cluster-pay slot with multipliers and bonus features.','stats'=>array(array('text'=>'96.6% RTP'),array('text'=>'Medium Volatility'),array('text'=>'14 INR Min. Stake'))),
 array('title'=>'Gates of Olympus','description'=>'An Ancient Greece themed slot featuring cumulative multipliers.','stats'=>array(array('text'=>'96.5% RTP'),array('text'=>'High Volatility'),array('text'=>'14 INR Min. Stake'))),
 array('title'=>'Sugar Rush','description'=>'A cluster-pay slot with sticky multipliers and free spins.','stats'=>array(array('text'=>'96.5% RTP'),array('text'=>'High Volatility'))),
 array('title'=>'Crazy Time','description'=>'A live game show with a wheel of fortune and bonus mini-games.','stats'=>array(array('text'=>'96.05% RTP'),array('text'=>'High Volatility'))),
 array('title'=>'Lightning Roulette','description'=>'European roulette enhanced with randomly selected multipliers.','stats'=>array(array('text'=>'97.3% RTP'),array('text'=>'Medium Volatility'))),
 array('title'=>'Super Andar Bahar','description'=>'A popular Indian card game with simple, fast-paced rounds.','stats'=>array(array('text'=>'97.85% RTP'),array('text'=>'Medium Volatility'))),
)); ?>
<section class="stake-section stake-soft stake-casino-section" aria-labelledby="stake-casino-title"><div class="stake-shell">
 <h2 class="stake-heading" id="stake-casino-title"><?php echo esc_html(stake_field('stake_casino_title','Stake Online Casino: Top Slots and Live Games')); ?></h2><div class="stake-intro"><?php echo wp_kses_post(wpautop(stake_field('stake_casino_intro','Explore slots, table games, live dealer games and new releases from popular providers.'))); ?></div>
 <div class="stake-casino-grid"><?php foreach($casino_games as $index=>$game): $src=stake_image_url($game['image']??''); $button=stake_link($game['button']??array(),'Play '.($game['title']??'Game')); ?><article class="stake-casino-card"><div class="stake-casino-image casino-<?php echo (int)($index%6+1); ?>"<?php echo $src?' style="background-image:url('.esc_url($src).')"':''; ?>><span><?php echo esc_html($game['title']??'Casino Game'); ?></span></div><div class="stake-casino-body"><div class="stake-richtext"><?php echo wp_kses_post(wpautop($game['description']??'')); ?></div><h3><?php echo esc_html($game['title']??'Casino Game'); ?></h3><?php if(!empty($game['stats'])): ?><ul class="stake-stat-list"><?php foreach($game['stats'] as $stat): ?><li><?php echo esc_html($stat['text']??''); ?></li><?php endforeach; ?></ul><?php endif; ?><a class="stake-btn" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a></div></article><?php endforeach; ?></div>
</div></section>

<?php $payment_methods=stake_field('stake_payment_methods',array(array('text'=>'UPI — from 500 to 20,000 INR'),array('text'=>'IMPS — from 500 to 20,000 INR'),array('text'=>'USD Coin — supported USDC deposits'),array('text'=>'Solana — supported SOL deposits'),array('text'=>'Ripple — supported XRP deposits'),array('text'=>'Litecoin — supported LTC deposits'),array('text'=>'Dogecoin — supported DOGE deposits'))); ?>
<?php echo $stake_closing_sections; ?>
<section class="stake-section stake-payments-section" aria-labelledby="stake-payments-title"><div class="stake-shell stake-narrow">
 <h2 class="stake-heading" id="stake-payments-title"><?php echo esc_html(stake_field('stake_payments_title','Fast and Secure Payments: Deposit and Withdrawal Methods')); ?></h2><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_payments_intro','After logging in, players can access the cashier to make deposits and request withdrawals.'))); ?></div><ul class="stake-check-list stake-payment-list"><?php foreach($payment_methods as $item): ?><li><?php echo esc_html($item['text']??''); ?></li><?php endforeach; ?></ul><div class="stake-payment-notes"><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_payments_note','Minimum amounts and limits may vary depending on the currency and current exchange rate.'))); ?></div><div class="stake-richtext"><?php echo wp_kses_post(wpautop(stake_field('stake_payments_footer','Always send cryptocurrency to the correct wallet and verify all transaction details before confirming.'))); ?></div></div>
</div></section>
