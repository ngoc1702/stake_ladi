<?php
$pid       = get_the_ID();
$logo      = student_landing_get_field('student_footer_logo', $pid, null);
$logo_url  = student_landing_image_url($logo);
$logo_alt  = student_landing_image_alt($logo, 'Student Careers');
$logo_text = student_landing_get_field('student_footer_logo_text', $pid, 'Student Careers');
$socials   = student_landing_list('student_social_links', student_landing_default_socials(), $pid);
$legal     = student_landing_get_field('student_footer_legal', $pid, 'Student is an equal opportunity employer.');
?>

<footer class="student-footer">
	<div class="student-container student-footer__inner">
		<div>
			<a class="student-brand student-footer__brand" href="#student-top" aria-label="<?php echo esc_attr($logo_text); ?>">
				<?php if ($logo_url) : ?>
					<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
				<?php else : ?>
					<span><?php echo esc_html($logo_text); ?></span>
				<?php endif; ?>
			</a>

			<div class="student-footer__socials">
				<?php foreach ($socials as $social) : ?>
					<?php
					$url        = $social['url'] ?? '#';
					$label      = $social['label'] ?? 'Social link';
					$raw_icon   = $social['icon'] ?? '';
					$icon_parts = array_filter(array_map('sanitize_html_class', preg_split('/\s+/', $raw_icon)));
					$icon_class = implode(' ', $icon_parts);
					?>
					<a href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($label); ?>">
						<?php if ($icon_class) : ?>
							<i class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></i>
						<?php else : ?>
							<span><?php echo esc_html(substr($label, 0, 1)); ?></span>
						<?php endif; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="student-footer__legal">
			<?php echo student_landing_format_text($legal); ?>
		</div>
	</div>
</footer>
