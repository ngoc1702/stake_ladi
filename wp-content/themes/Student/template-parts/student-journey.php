<?php
$pid   = get_the_ID();
$title = student_landing_get_field('student_journey_title', $pid, 'Your hiring journey');
$intro = student_landing_get_field('student_journey_intro', $pid, 'Take the next step in your professional development and apply for the Student internship program today.');
$steps = student_landing_list('student_journey_steps', student_landing_default_journey_steps(), $pid);
?>

<section class="student-section student-journey" id="student-journey">
	<div class="student-container student-journey__inner">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
			<p><?php echo esc_html($intro); ?></p>
		</header>

		<div class="student-journey__list">
			<?php foreach ($steps as $index => $step) : ?>
				<article class="student-journey-step">
					<div class="student-journey-step__label">
						<span><?php echo esc_html($index + 1); ?></span>
						<h3><?php echo esc_html($step['title'] ?? ''); ?></h3>
					</div>
					<div class="student-journey-step__body">
						<?php echo nl2br(esc_html($step['text'] ?? '')); ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
