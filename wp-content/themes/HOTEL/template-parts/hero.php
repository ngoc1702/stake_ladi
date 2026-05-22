<?php
$hero_background = hotel_landing_get_field('hotel_hero_background');
$hero_title = hotel_landing_get_field('hotel_hero_title', hotel_landing_default('hotel_hero_title'));
$hero_subtitle = hotel_landing_get_field('hotel_hero_script_title', hotel_landing_default('hotel_hero_script_title'));
$hero_button = hotel_landing_link(
    hotel_landing_get_field('hotel_hero_button', hotel_landing_default('hotel_hero_button')),
    hotel_landing_default('hotel_hero_button')['title'],
    hotel_landing_default('hotel_hero_button')['url']
);

$hero_background_url = hotel_landing_image_url($hero_background);
$hero_style = $hero_background_url
    ? sprintf(' style="background-image: linear-gradient(90deg, rgba(15, 13, 12, 0.76) 0%%, rgba(15, 13, 12, 0.48) 43%%, rgba(15, 13, 12, 0.16) 100%%), linear-gradient(180deg, rgba(15, 13, 12, 0.52) 0%%, rgba(15, 13, 12, 0.12) 48%%, rgba(15, 13, 12, 0.42) 100%%), url(%s);"', esc_url($hero_background_url))
    : '';
?>

<section class="hotel-hero" id="top"<?php echo $hero_style; ?>>
    <div class="hotel-container hotel-hero__inner">
        <div class="hotel-hero__content">
            <div class="hotel-hero__stars" aria-label="<?php echo esc_attr__('4 star hotel', 'hotel'); ?>">
                <span aria-hidden="true">&#9733;&#9733;&#9733;&#9733;</span>
            </div>

            <?php if ($hero_title) : ?>
                <h1 class="hotel-hero__title"><?php echo nl2br(esc_html($hero_title)); ?></h1>
            <?php endif; ?>

            <?php if ($hero_subtitle) : ?>
                <p class="hotel-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>

            <?php if (!empty($hero_button['title'])) : ?>
                <a class="hotel-hero__explore" href="<?php echo esc_url($hero_button['url']); ?>"<?php echo $hero_button['target'] ? ' target="' . esc_attr($hero_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($hero_button['title']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 18 12" fill="none"><path d="M-2.18557e-07 6L15.6008 6.00004M11.0001 1L16 6.00004L11 11" stroke="white" stroke-width="1.5"></path></svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
