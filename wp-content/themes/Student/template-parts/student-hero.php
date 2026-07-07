<?php
$pid        = get_the_ID();
$logo       = student_landing_get_field('student_header_logo', $pid, null);
$logo_url   = student_landing_image_url($logo);
$logo_alt   = student_landing_image_alt($logo, 'Student Careers');
$logo_text  = student_landing_get_field('student_header_logo_text', $pid, 'Student Careers');
$title      = student_landing_get_field('student_hero_title', $pid, 'Join the Student internship program in Cyprus and Uruguay');
$intro      = student_landing_get_field('student_hero_intro', $pid, 'Looking for a career breakthrough? Our annual internship program promises growth and learning.');
$button     = student_landing_get_field('student_hero_button_label', $pid, 'Positions closed');
$button_url = student_landing_get_field('student_hero_button_url', $pid, '#student-journey');
$image      = student_landing_get_field('student_hero_image', $pid, null);
$image_url  = student_landing_image_url($image, student_landing_default_image('student-hero.png'));
$image_alt  = student_landing_image_alt($image, $title);
?>

<section class="student-hero" id="student-top">
	<div class="student-container student-hero__header">
		<a class="student-brand" href="#student-top" aria-label="<?php echo esc_attr($logo_text); ?>">
			<?php if ($logo_url) : ?>
				<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
			<?php else : ?>
				<span><?php echo esc_html($logo_text); ?></span>
			<?php endif; ?>
		</a>
	</div>

	<div class="student-container student-hero__grid">
		<div class="student-hero__copy">
			<h1><?php echo esc_html($title); ?></h1>
			<p><?php echo esc_html($intro); ?></p>
			<?php if ($button) : ?>
				<a class="student-button" href="<?php echo esc_url($button_url); ?>">
					<?php echo esc_html($button); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="student-hero__media">
			<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="eager">
		</div>
	</div>
</section>
