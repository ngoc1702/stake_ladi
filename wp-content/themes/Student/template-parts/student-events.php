<?php
$pid    = get_the_ID();
$title  = student_landing_get_field('student_events_title', $pid, 'Want to know more information about our internship?');
$intro  = student_landing_get_field('student_events_intro', $pid, 'Student will be attending the below university career fairs.');
$events = student_landing_list('student_events', student_landing_default_events(), $pid);
?>

<section class="student-section student-events" id="student-events">
	<div class="student-container student-events__inner">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
			<p><?php echo esc_html($intro); ?></p>
		</header>

		<div class="student-events__grid">
			<?php foreach ($events as $event) : ?>
				<?php
				$badge     = $event['badge'] ?? '';
				$badge_url = '';
				$badge_alt = student_landing_image_alt($badge, $event['location'] ?? 'Event badge');

				if (is_array($badge) || is_numeric($badge) || filter_var($badge, FILTER_VALIDATE_URL)) {
					$badge_url = student_landing_image_url($badge);
				}
				?>
				<article class="student-event">
					<div>
						<strong><?php echo esc_html($event['date'] ?? ''); ?></strong>
						<span><?php echo esc_html($event['time'] ?? ''); ?></span>
					</div>
					<span class="student-event__badge">
						<?php if ($badge_url) : ?>
							<img src="<?php echo esc_url($badge_url); ?>" alt="<?php echo esc_attr($badge_alt); ?>" loading="lazy">
						<?php elseif (!student_landing_is_empty($badge)) : ?>
							<?php echo esc_html($badge); ?>
						<?php endif; ?>
					</span>
					<p><?php echo esc_html($event['location'] ?? ''); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
