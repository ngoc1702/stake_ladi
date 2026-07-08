<?php
/**
 * ACF setup and frontend helpers for the Student landing page.
 */

if (!function_exists('student_landing_render_parts')) {
	function student_landing_render_parts()
	{
		$parts = array(
			'hero',
			'about',
			'program',
			'testimonials',
			'getting-started',
			'events',
			'journey',
			'footer',
		);

		foreach ($parts as $part) {
			get_template_part('template-parts/student-' . $part);
		}
	}
}

if (!function_exists('student_landing_is_empty')) {
	function student_landing_is_empty($value)
	{
		return '' === $value || null === $value || false === $value || array() === $value;
	}
}

if (!function_exists('student_landing_get_field')) {
	function student_landing_get_field($name, $post_id = null, $default = '')
	{
		$value = null;

		if (function_exists('get_field')) {
			$value = get_field($name, $post_id);
		}

		return student_landing_is_empty($value) ? $default : $value;
	}
}

if (!function_exists('student_landing_default_image')) {
	function student_landing_default_image($filename)
	{
		return get_stylesheet_directory_uri() . '/assets/images/' . ltrim($filename, '/');
	}
}

if (!function_exists('student_landing_image_url')) {
	function student_landing_image_url($image, $fallback = '')
	{
		if (is_array($image) && !empty($image['url'])) {
			return $image['url'];
		}

		if (is_numeric($image)) {
			$url = wp_get_attachment_image_url((int) $image, 'full');
			return $url ? $url : $fallback;
		}

		if (is_string($image) && '' !== $image) {
			return $image;
		}

		return $fallback;
	}
}

if (!function_exists('student_landing_image_alt')) {
	function student_landing_image_alt($image, $fallback = '')
	{
		if (is_array($image) && !empty($image['alt'])) {
			return $image['alt'];
		}

		return $fallback;
	}
}

if (!function_exists('student_landing_list')) {
	function student_landing_list($name, $default = array(), $post_id = null)
	{
		$value = student_landing_get_field($name, $post_id, array());
		return is_array($value) && !empty($value) ? $value : $default;
	}
}

if (!function_exists('student_landing_format_text')) {
	function student_landing_format_text($text)
	{
		return wp_kses_post(wpautop($text));
	}
}

if (!function_exists('student_landing_default_about_cards')) {
	function student_landing_default_about_cards()
	{
		return array(
			array(
				'marker' => '18+',
				'title' => 'Years on the market',
				'text' => 'A learning environment shaped by experienced teams, real projects, and strong mentoring.',
			),
			array(
				'marker' => '90+',
				'title' => 'Global teamwork',
				'text' => 'Work with international colleagues and build habits that travel with your career.',
			),
			array(
				'marker' => '13',
				'title' => 'Multinational',
				'text' => 'A cross-cultural program with students and mentors from different backgrounds.',
			),
			array(
				'marker' => '24/7',
				'title' => 'Reliable support',
				'text' => 'Structured onboarding, mentor check-ins, and clear expectations from day one.',
			),
			array(
				'marker' => '2x',
				'title' => 'Constantly growing',
				'text' => 'Build practical skills through workshops, feedback sessions, and live assignments.',
			),
			array(
				'marker' => 'Top',
				'title' => 'Career recognition',
				'text' => 'Finish with experience, references, and a clearer route into your first professional role.',
			),
		);
	}
}

if (!function_exists('student_landing_default_benefits')) {
	function student_landing_default_benefits()
	{
		return array(
			array('text' => 'New skills, knowledge, and work experience in a truly global company.'),
			array('text' => 'Certificate of completion and a reference letter after successful completion.'),
			array('text' => 'Access to corporate benefits for your wellbeing, health, and social life.'),
		);
	}
}

if (!function_exists('student_landing_default_testimonials')) {
	function student_landing_default_testimonials()
	{
		return array(
			array(
				'image' => '',
				'quote' => 'I gained a lot of knowledge and skills from scratch.',
				'author' => '',
				'role' => '',
			),
			array(
				'image' => '',
				'quote' => 'Everything was amazing: the job itself, the team, and the fast HR support.',
				'author' => '',
				'role' => '',
			),
			array(
				'image' => '',
				'quote' => 'The program helped me understand how real international teams work every day.',
				'author' => '',
				'role' => '',
			),
			array(
				'image' => '',
				'quote' => 'My mentor gave me clear feedback and the confidence to take on bigger tasks.',
				'author' => '',
				'role' => '',
			),
			array(
				'image' => '',
				'quote' => 'I learned quickly because the projects were practical, structured, and connected to real work.',
				'author' => '',
				'role' => '',
			),
			array(
				'image' => '',
				'quote' => 'It was a friendly environment where I could ask questions and grow every week.',
				'author' => '',
				'role' => '',
			),
		);
	}
}

if (!function_exists('student_landing_default_start_cards')) {
	function student_landing_default_start_cards()
	{
		return array(
			array(
				'label' => 'Duration',
				'title' => '8 weeks',
				'text' => '12 Jun - 07 Aug 2026' . "\n" . '(with the opportunity for extension' . "\n" . 'upon mutual agreement)',
				'style' => 'calendar',
				'image' => '',
			),
			array(
				'label' => 'Location',
				'title' => 'Limassol,' . "\n" . 'Cyprus' . "\n" . '&' . "\n" . 'Montevideo,' . "\n" . 'Uruguay',
				'text' => '',
				'style' => 'sky',
				'image' => '',
			),
			array(
				'label' => 'Schedule',
				'title' => 'Full-time,' . "\n" . 'Monday-Friday',
				'text' => '40 hours per week including' . "\n" . 'participation in weekly' . "\n" . 'Friday workshops',
				'style' => 'clock',
				'image' => '',
			),
			array(
				'label' => 'Open positions',
				'title' => 'Junior level',
				'text' => 'Different departments across' . "\n" . 'the company',
				'style' => 'photo',
				'image' => '',
			),
		);
	}
}

if (!function_exists('student_landing_default_events')) {
	function student_landing_default_events()
	{
		return array(
			array('date' => '21.04', 'time' => '11:00-15:00', 'badge' => 'UC', 'location' => 'University of Cyprus'),
			array('date' => '23.04', 'time' => '11:00-15:00', 'badge' => 'UL', 'location' => 'University of Limassol'),
			array('date' => '28.04', 'time' => '11:00-15:00', 'badge' => 'UN', 'location' => 'University of Nicosia'),
			array('date' => '29.04', 'time' => '11:00-15:00', 'badge' => 'FU', 'location' => 'Frederick University'),
		);
	}
}

if (!function_exists('student_landing_default_journey_steps')) {
	function student_landing_default_journey_steps()
	{
		return array(
			array(
				'title' => 'Browse',
				'text' => 'Click on the position you are interested in and read the job description and requirements carefully.',
			),
			array(
				'title' => 'Apply',
				'text' => "If the position suits your skills and knowledge, please apply directly on the careers platform.\n\n- Your CV\n- 1-minute video about your field of studies, motivation and interests\n- Cover letter explaining why you want to be an intern.",
			),
			array(
				'title' => 'Intro call',
				'text' => 'You will meet with our recruiter over video call upon successful review of your application.',
			),
			array(
				'title' => 'Interview',
				'text' => 'Selected candidates will be invited to an interview with the manager and mentor.',
			),
			array(
				'title' => 'Invitation',
				'text' => 'Successful candidates will receive the internship invitation with all further details.',
			),
		);
	}
}

if (!function_exists('student_landing_default_socials')) {
	function student_landing_default_socials()
	{
		return array(
			array('label' => 'LinkedIn', 'icon' => 'fa-brands fa-linkedin-in', 'url' => '#'),
			array('label' => 'Instagram', 'icon' => 'fa-brands fa-instagram', 'url' => '#'),
			array('label' => 'Facebook', 'icon' => 'fa-brands fa-facebook-f', 'url' => '#'),
			array('label' => 'YouTube', 'icon' => 'fa-brands fa-youtube', 'url' => '#'),
		);
	}
}

if (!function_exists('student_landing_page_location')) {
	function student_landing_page_location()
	{
		return array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-landing.php',
				),
			),
		);
	}
}

if (!function_exists('student_landing_field')) {
	function student_landing_field($key, $label, $name, $type = 'text', $extra = array())
	{
		return array_merge(
			array(
				'key' => $key,
				'label' => $label,
				'name' => $name,
				'type' => $type,
			),
			$extra
		);
	}
}

add_action('acf/init', 'caia_register_student_landing_fields');
function caia_register_student_landing_fields()
{
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key' => 'group_student_landing',
			'title' => 'Student Landing Page',
			'fields' => array(
				student_landing_field('field_student_tab_hero', 'Hero', '', 'tab'),
				student_landing_field('field_student_header_logo', 'Header logo image', 'student_header_logo', 'image', array('return_format' => 'array', 'preview_size' => 'medium', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_header_logo_text', 'Header logo text', 'student_header_logo_text', 'text', array('default_value' => 'Student Careers', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_hero_title', 'Hero title', 'student_hero_title', 'textarea', array('rows' => 2, 'default_value' => 'Join the Student internship program in Cyprus and Uruguay')),
				student_landing_field('field_student_hero_intro', 'Hero intro', 'student_hero_intro', 'textarea', array('rows' => 3, 'default_value' => 'Looking for a career breakthrough? Our annual internship program promises growth and learning. Scroll down and learn how you could become part of one of the world leading student teams.')),
				student_landing_field('field_student_hero_button_label', 'Hero button label', 'student_hero_button_label', 'text', array('default_value' => 'Positions closed', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_hero_button_url', 'Hero button URL', 'student_hero_button_url', 'text', array('default_value' => '#student-journey', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_hero_image', 'Hero image', 'student_hero_image', 'image', array('return_format' => 'array', 'preview_size' => 'medium')),

				student_landing_field('field_student_tab_about', 'About', '', 'tab'),
				student_landing_field('field_student_about_title', 'About title', 'student_about_title', 'text', array('default_value' => 'About Student')),
				student_landing_field('field_student_about_intro', 'About intro', 'student_about_intro', 'textarea', array('rows' => 2, 'default_value' => 'Student is the place for global teamwork, incredible leadership, a learning culture, and constant development.')),
				student_landing_field('field_student_about_cards', 'About cards', 'student_about_cards', 'repeater', array(
					'layout' => 'block',
					'button_label' => 'Add card',
					'sub_fields' => array(
						student_landing_field('field_student_about_card_marker', 'Marker image', 'marker', 'image', array('return_format' => 'array', 'preview_size' => 'medium', 'wrapper' => array('width' => '20'))),
						student_landing_field('field_student_about_card_title', 'Title', 'title', 'text', array('wrapper' => array('width' => '40'))),
						student_landing_field('field_student_about_card_text', 'Text', 'text', 'textarea', array('rows' => 2, 'wrapper' => array('width' => '40'))),
					),
				)),

				student_landing_field('field_student_tab_program', 'Program', '', 'tab'),
				student_landing_field('field_student_program_title', 'Program title', 'student_program_title', 'text', array('default_value' => 'About the internship program')),
				student_landing_field('field_student_program_intro', 'Program intro', 'student_program_intro', 'textarea', array('rows' => 3, 'default_value' => 'As an intern, you will join one of our teams and collaborate closely with a mentor. You will be your teacher, buddy, and helping hand during your internship journey. Regular educational activities and workshops will also be organised for you.')),
				student_landing_field('field_student_program_image', 'Program image', 'student_program_image', 'image', array('return_format' => 'array', 'preview_size' => 'medium')),
				student_landing_field('field_student_benefits_title', 'Benefits panel title', 'student_benefits_title', 'text', array('default_value' => 'What you will get along the way')),
				student_landing_field('field_student_program_benefits', 'Benefits', 'student_program_benefits', 'repeater', array(
					'layout' => 'table',
					'button_label' => 'Add benefit',
					'sub_fields' => array(
						student_landing_field('field_student_program_benefit_text', 'Text', 'text', 'textarea', array('rows' => 2)),
					),
				)),

				student_landing_field('field_student_tab_testimonials', 'Testimonials', '', 'tab'),
				student_landing_field('field_student_testimonials_title', 'Testimonials title', 'student_testimonials_title', 'textarea', array('rows' => 2, 'default_value' => 'What our previous interns say about Student')),
				student_landing_field('field_student_testimonials', 'Testimonials', 'student_testimonials', 'repeater', array(
					'layout' => 'block',
					'button_label' => 'Add testimonial',
					'sub_fields' => array(
						student_landing_field('field_student_testimonial_image', 'Image', 'image', 'image', array('return_format' => 'array', 'preview_size' => 'medium')),
						student_landing_field('field_student_testimonial_quote', 'Quote', 'quote', 'textarea', array('rows' => 3)),
						student_landing_field('field_student_testimonial_author', 'Author', 'author', 'text', array('wrapper' => array('width' => '50'))),
						student_landing_field('field_student_testimonial_role', 'Role', 'role', 'text', array('wrapper' => array('width' => '50'))),
					),
				)),

				student_landing_field('field_student_tab_start', 'Getting started', '', 'tab'),
				student_landing_field('field_student_start_title', 'Section title', 'student_start_title', 'text', array('default_value' => 'Getting started')),
				student_landing_field('field_student_start_cards', 'Getting started cards', 'student_start_cards', 'repeater', array(
					'layout' => 'block',
					'button_label' => 'Add card',
					'sub_fields' => array(
						student_landing_field('field_student_start_label', 'Label', 'label', 'text', array('wrapper' => array('width' => '25'))),
						student_landing_field('field_student_start_style', 'Style', 'style', 'select', array(
							'choices' => array('calendar' => 'Calendar', 'sky' => 'Sky', 'clock' => 'Clock', 'photo' => 'Photo', 'plain' => 'Plain'),
							'default_value' => 'plain',
							'wrapper' => array('width' => '25'),
						)),
						student_landing_field('field_student_start_title_item', 'Title', 'title', 'textarea', array('rows' => 2, 'wrapper' => array('width' => '50'))),
						student_landing_field('field_student_start_text', 'Text', 'text', 'textarea', array('rows' => 2, 'wrapper' => array('width' => '50'))),
						student_landing_field('field_student_start_image', 'Image', 'image', 'image', array('return_format' => 'array', 'preview_size' => 'medium', 'wrapper' => array('width' => '50'))),
					),
				)),

				student_landing_field('field_student_tab_events', 'Events', '', 'tab'),
				student_landing_field('field_student_events_title', 'Events title', 'student_events_title', 'textarea', array('rows' => 2, 'default_value' => 'Want to know more information about our internship?')),
				student_landing_field('field_student_events_intro', 'Events intro', 'student_events_intro', 'textarea', array('rows' => 2, 'default_value' => 'Student will be attending the below university career fairs.')),
				student_landing_field('field_student_events', 'Events', 'student_events', 'repeater', array(
					'layout' => 'table',
					'button_label' => 'Add event',
					'sub_fields' => array(
						student_landing_field('field_student_event_date', 'Date', 'date', 'text'),
						student_landing_field('field_student_event_time', 'Time', 'time', 'text'),
						student_landing_field('field_student_event_badge', 'Badge image', 'badge', 'image', array('return_format' => 'array', 'preview_size' => 'thumbnail')),
						student_landing_field('field_student_event_location', 'Location', 'location', 'text'),
					),
				)),

				student_landing_field('field_student_tab_journey', 'Journey', '', 'tab'),
				student_landing_field('field_student_journey_title', 'Journey title', 'student_journey_title', 'text', array('default_value' => 'Your hiring journey')),
				student_landing_field('field_student_journey_intro', 'Journey intro', 'student_journey_intro', 'textarea', array('rows' => 2, 'default_value' => 'Take the next step in your professional development and apply for the Student internship program today.')),
				student_landing_field('field_student_journey_steps', 'Journey steps', 'student_journey_steps', 'repeater', array(
					'layout' => 'block',
					'button_label' => 'Add step',
					'sub_fields' => array(
						student_landing_field('field_student_journey_step_title', 'Title', 'title', 'text', array('wrapper' => array('width' => '35'))),
						student_landing_field('field_student_journey_step_text', 'Text', 'text', 'textarea', array('rows' => 4, 'wrapper' => array('width' => '65'))),
					),
				)),

				student_landing_field('field_student_tab_footer', 'Footer', '', 'tab'),
				student_landing_field('field_student_footer_logo', 'Footer logo image', 'student_footer_logo', 'image', array('return_format' => 'array', 'preview_size' => 'medium', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_footer_logo_text', 'Footer logo text', 'student_footer_logo_text', 'text', array('default_value' => 'Student Careers', 'wrapper' => array('width' => '50'))),
				student_landing_field('field_student_social_links', 'Social links', 'student_social_links', 'repeater', array(
					'layout' => 'table',
					'button_label' => 'Add social link',
					'sub_fields' => array(
						student_landing_field('field_student_social_label', 'Label', 'label', 'text'),
						student_landing_field('field_student_social_icon', 'Font Awesome class', 'icon', 'text'),
						student_landing_field('field_student_social_url', 'URL', 'url', 'text'),
					),
				)),
				student_landing_field('field_student_footer_legal', 'Footer legal text', 'student_footer_legal', 'textarea', array('rows' => 4, 'default_value' => 'Student is an equal opportunity employer. The process for graduate recruitment, application management, sourcing vacancies, and candidate development is guided by privacy and data protection standards.')),
			),
			'location' => student_landing_page_location(),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'active' => true,
		)
	);
}
