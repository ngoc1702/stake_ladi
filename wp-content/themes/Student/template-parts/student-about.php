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
				<article class="student-about-card">
					<div class="student-about-card__marker"><?php echo esc_html($card['marker'] ?? ''); ?></div>
					<h3><?php echo esc_html($card['title'] ?? ''); ?></h3>
					<p><?php echo esc_html($card['text'] ?? ''); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
