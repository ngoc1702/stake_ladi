<?php
$pid   = get_the_ID();
$title = student_landing_get_field('student_start_title', $pid, 'Getting started');
$cards = student_landing_list('student_start_cards', student_landing_default_start_cards(), $pid);
?>

<section class="student-section student-start" id="student-start">
	<div class="student-container">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
		</header>

		<div class="student-start__grid">
			<?php foreach ($cards as $card) : ?>
				<?php
				$style           = !empty($card['style']) ? sanitize_html_class($card['style']) : 'plain';
				$image           = $card['image'] ?? null;
				$image_url       = student_landing_image_url($image, 'photo' === $style ? student_landing_default_image('student-mentor.png') : '');
				$image_alt       = student_landing_image_alt($image, $card['title'] ?? 'Getting started');
				$uses_background = in_array($style, array('sky', 'photo'), true);
				$has_background  = $uses_background && $image_url;
				$has_media       = !$uses_background && $image_url;
				$card_classes    = array('student-start-card', 'student-start-card--' . $style);
				$card_style      = '';

				if ($has_background) {
					$card_classes[] = 'student-start-card--has-bg';
					$card_style     = sprintf("--student-card-image: url('%s');", esc_url($image_url));
				}

				if ($has_media) {
					$card_classes[] = 'student-start-card--has-media';
				}
				?>
				<article class="<?php echo esc_attr(implode(' ', $card_classes)); ?>"<?php echo $card_style ? ' style="' . esc_attr($card_style) . '"' : ''; ?>>
					<div class="student-start-card__content">
						<?php if (!empty($card['label'])) : ?>
							<span><?php echo esc_html($card['label']); ?></span>
						<?php endif; ?>
						<h3><?php echo nl2br(esc_html($card['title'] ?? '')); ?></h3>
						<?php if ($has_media && 'clock' === $style) : ?>
							<div class="student-start-card__media">
								<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
							</div>
						<?php endif; ?>
						<?php if (!empty($card['text'])) : ?>
							<p><?php echo nl2br(esc_html($card['text'])); ?></p>
						<?php endif; ?>
						<?php if ($has_media && 'clock' !== $style) : ?>
							<div class="student-start-card__media">
								<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
							</div>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
