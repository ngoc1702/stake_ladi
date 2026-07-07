<?php
$pid            = get_the_ID();
$title          = student_landing_get_field('student_program_title', $pid, 'About the internship program');
$intro          = student_landing_get_field('student_program_intro', $pid, 'As an intern, you will join one of our teams and collaborate closely with a mentor.');
$image          = student_landing_get_field('student_program_image', $pid, null);
$image_url      = student_landing_image_url($image, student_landing_default_image('student-program.png'));
$image_alt      = student_landing_image_alt($image, $title);
$benefits_title = student_landing_get_field('student_benefits_title', $pid, 'What you will get along the way');
$benefits       = student_landing_list('student_program_benefits', student_landing_default_benefits(), $pid);
?>

<section class="student-section student-program" id="student-program">
	<div class="student-container">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
			<p><?php echo esc_html($intro); ?></p>
		</header>

		<div class="student-program__media">
			<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
		</div>

		<div class="student-benefits">
			<h3><?php echo esc_html($benefits_title); ?></h3>
			<div class="student-benefits__grid">
				<?php foreach ($benefits as $benefit) : ?>
					<div class="student-benefit">
						<span aria-hidden="true"></span>
						<p><?php echo esc_html($benefit['text'] ?? ''); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
