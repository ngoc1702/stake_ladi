<?php
$amenities_eyebrow = hotel_landing_get_field('hotel_amenities_eyebrow', hotel_landing_default('hotel_amenities_eyebrow'));
$amenities_title = hotel_landing_get_field('hotel_amenities_title', hotel_landing_default('hotel_amenities_title'));
$amenities = hotel_landing_get_field('hotel_amenities', hotel_landing_default('hotel_amenities'));
$dining_items = hotel_landing_get_field('hotel_dining_items', array());

$amenities = (!empty($amenities) && is_array($amenities)) ? $amenities : array();
$dining_items = (!empty($dining_items) && is_array($dining_items)) ? $dining_items : array();

if (count($amenities) < 6 && $dining_items) {
    $amenities = array_merge($amenities, array_slice($dining_items, 0, 6 - count($amenities)));
}

$amenities = array_slice($amenities, 0, 6);

if (empty($amenities)) {
    return;
}
?>

<section class="hotel-section hotel-amenities-card-grid" aria-label="<?php echo esc_attr($amenities_title ?: __('Hotel amenities', 'hotel')); ?>">
    <div class="hotel-container">
        <div class="hotel-section-heading hotel-section-heading--amenities-card-grid">
            <?php if ($amenities_eyebrow) : ?>
                <p class="hotel-eyebrow"><?php echo esc_html($amenities_eyebrow); ?></p>
            <?php endif; ?>
            <?php if ($amenities_title) : ?>
                <h2><?php echo esc_html($amenities_title); ?></h2>
            <?php endif; ?>
        </div>

        <div class="hotel-amenities-card-grid__items">
            <?php foreach ($amenities as $amenity) :
                $image = !empty($amenity['image']) ? $amenity['image'] : (!empty($amenity['icon']) ? $amenity['icon'] : null);
                $image_url = hotel_landing_image_url($image);
                $icon_class = !empty($amenity['icon_class']) ? hotel_landing_class_list($amenity['icon_class']) : '';
                $title = !empty($amenity['title']) ? $amenity['title'] : '';
                $utility = !empty($amenity['utility']) ? $amenity['utility'] : (!empty($amenity['description']) ? $amenity['description'] : '');

                if (!$title && !$utility && !$image_url && !$icon_class) {
                    continue;
                }
                ?>
                <article class="hotel-amenity-card">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                    <?php else : ?>
                        <span class="hotel-amenity-card__placeholder" aria-hidden="true">
                            <?php if ($icon_class) : ?>
                                <i class="<?php echo esc_attr($icon_class); ?>"></i>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>

                    <span class="hotel-amenity-card__content">
                        <?php if ($title) : ?>
                            <strong><?php echo esc_html($title); ?></strong>
                        <?php endif; ?>
                        <?php if ($utility) : ?>
                            <small><?php echo esc_html($utility); ?></small>
                        <?php endif; ?>
                    </span>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
