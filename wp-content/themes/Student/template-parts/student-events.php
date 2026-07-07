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
				<article class="student-event">
					<div>
						<strong><?php echo esc_html($event['date'] ?? ''); ?></strong>
						<span><?php echo esc_html($event['time'] ?? ''); ?></span>
					</div>
					<i><?php echo esc_html($event['badge'] ?? ''); ?></i>
					<p><?php echo esc_html($event['location'] ?? ''); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
