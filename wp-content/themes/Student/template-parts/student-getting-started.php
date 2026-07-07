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
				$style     = !empty($card['style']) ? sanitize_html_class($card['style']) : 'plain';
				$image     = $card['image'] ?? null;
				$image_url = student_landing_image_url($image, 'photo' === $style ? student_landing_default_image('student-mentor.png') : '');
				?>
				<article class="student-start-card student-start-card--<?php echo esc_attr($style); ?>">
					<?php if ($image_url) : ?>
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($card['title'] ?? 'Getting started'); ?>" loading="lazy">
					<?php endif; ?>
					<div class="student-start-card__content">
						<?php if (!empty($card['label'])) : ?>
							<span><?php echo esc_html($card['label']); ?></span>
						<?php endif; ?>
						<h3><?php echo nl2br(esc_html($card['title'] ?? '')); ?></h3>
						<p><?php echo esc_html($card['text'] ?? ''); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
