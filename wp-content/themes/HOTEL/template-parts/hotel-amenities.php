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
?>

<section class="hotel-section hotel-amenities" id="tienich">
    <span class="hotel-anchor-alias" id="nhahang" aria-hidden="true"></span>
    <div class="hotel-container">
        <div class="hotel-section-heading hotel-section-heading--amenities">
            <?php if ($amenities_eyebrow) : ?>
                <p class="hotel-eyebrow"><?php echo esc_html($amenities_eyebrow); ?></p>
            <?php endif; ?>
            <?php if ($amenities_title) : ?>
                <h2><?php echo esc_html($amenities_title); ?></h2>
            <?php endif; ?>
        </div>

        <?php if (!empty($amenities)) : ?>
            <div class="hotel-amenities__list">
                <?php foreach ($amenities as $amenity) :
                    $image = !empty($amenity['image']) ? $amenity['image'] : (!empty($amenity['icon']) ? $amenity['icon'] : null);
                    $image_url = hotel_landing_image_url($image);
                    $title = !empty($amenity['title']) ? $amenity['title'] : '';
                    $utility = !empty($amenity['utility']) ? $amenity['utility'] : (!empty($amenity['description']) ? $amenity['description'] : '');

                    if (!$title && !$utility && !$image_url) {
                        continue;
                    }
                    ?>
                    <article class="hotel-amenity">
                        <figure class="hotel-amenity__media">
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(hotel_landing_image_alt($image, $title)); ?>">
                            <?php else : ?>
                                <span class="hotel-image-placeholder" aria-hidden="true"></span>
                            <?php endif; ?>
                        </figure>

                        <div class="hotel-amenity__content">
                            <?php if ($title) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($utility) : ?>
                                <p><?php echo nl2br(esc_html($utility)); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
