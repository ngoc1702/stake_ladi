<?php
$pid          = get_the_ID();
$title        = student_landing_get_field('student_testimonials_title', $pid, 'What our previous interns say about Student');
$testimonials = student_landing_list('student_testimonials', student_landing_default_testimonials(), $pid);
?>

<section class="student-section student-testimonials" id="student-testimonials" data-student-testimonials>
	<div class="student-container">
		<header class="student-section-heading">
			<h2><?php echo esc_html($title); ?></h2>
		</header>

		<div class="student-testimonial">
			<div class="student-testimonial__viewport">
				<div class="student-testimonial__track" data-student-testimonial-track>
					<?php foreach ($testimonials as $index => $item) : ?>
						<?php
						$image       = $item['image'] ?? null;
						$fallbacks   = array('student-mentor.png', 'student-program.png', 'student-hero.png');
						$fallback    = student_landing_default_image($fallbacks[$index % count($fallbacks)]);
						$image_url   = student_landing_image_url($image, $fallback);
						$image_alt   = student_landing_image_alt($image, $item['author'] ?? 'Student testimonial');
						$quote       = $item['quote'] ?? '';
						$author      = $item['author'] ?? '';
						$role        = $item['role'] ?? '';
						?>
						<article class="student-testimonial__slide <?php echo 0 === $index ? 'is-active' : ''; ?>" data-student-slide="<?php echo esc_attr($index); ?>">
							<div class="student-testimonial__image">
								<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
							</div>
							<div class="student-testimonial__quote">
								<span class="student-testimonial__mark" aria-hidden="true"></span>
								<blockquote><?php echo esc_html($quote); ?></blockquote>
								<?php if (!empty($author) || !empty($role)) : ?>
									<cite>
										<?php echo esc_html($author); ?>
										<?php if (!empty($role)) : ?>
											<small><?php echo esc_html($role); ?></small>
										<?php endif; ?>
									</cite>
								<?php endif; ?>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if (count($testimonials) > 1) : ?>
				<div class="student-testimonial__dots" role="tablist" aria-label="Testimonials">
					<?php foreach ($testimonials as $index => $item) : ?>
						<button class="<?php echo 0 === $index ? 'is-active' : ''; ?>" type="button" data-student-dot="<?php echo esc_attr($index); ?>">
							<span class="screen-reader-text">Show testimonial <?php echo esc_html($index + 1); ?></span>
						</button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
