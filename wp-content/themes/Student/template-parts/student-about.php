<?php
$pid   = get_the_ID();
$title = student_landing_get_field('student_about_title', $pid, 'About Student');
$intro = student_landing_get_field('student_about_intro', $pid, 'Student is the place for global teamwork, incredible leadership, a learning culture, and constant development.');
$cards = student_landing_list('student_about_cards', student_landing_default_about_cards(), $pid);
?>

<section class="student-section student-about" id="student-about">
	<div class="student-container">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
			<p><?php echo esc_html($intro); ?></p>
		</header>

		<div class="student-about__grid">
			<?php foreach ($cards as $card) : ?>
				<?php
				$marker     = $card['marker'] ?? '';
				$marker_url = '';
				$marker_alt = student_landing_image_alt($marker, $card['title'] ?? 'About card marker');

				if (is_array($marker) || is_numeric($marker) || filter_var($marker, FILTER_VALIDATE_URL)) {
					$marker_url = student_landing_image_url($marker);
				}
				?>
				<article class="student-about-card">
					<?php if ($marker_url) : ?>
						<div class="student-about-card__marker">
							<img src="<?php echo esc_url($marker_url); ?>" alt="<?php echo esc_attr($marker_alt); ?>">
						</div>
					<?php elseif (!student_landing_is_empty($marker)) : ?>
						<div class="student-about-card__marker student-about-card__marker--text"><?php echo esc_html($marker); ?></div>
					<?php endif; ?>
					<h3><?php echo esc_html($card['title'] ?? ''); ?></h3>
					<p><?php echo esc_html($card['text'] ?? ''); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
