<?php

function action_wpcf7_before_send_mail($contact_form, &$abort, $submission)
{

	$options = get_option('dw_cf7_sendy_plugin_options');

	//$url = 'https://newsletter.onlinemarketing.hu/subscribe';
	//$api_key = 'P8nBHoD4dHuxM92S8o58';

	$sendy = $submission->get_posted_data('sendy');

	$body = array(
		'api_key' => $options['api_key']
	);

	$data = (array)json_decode("[" . $sendy . "]");

	if (!$data) {
		return;
	}

	foreach ($data as $field) {
		if ($field->target == 'form') {
			$form_data = $submission->get_posted_data($field->selector);

			if (is_array($form_data)) {
				foreach ($form_data as $_ => $name) {
					$body[$name] = 1;
				}
			} else {
				$body[$field->name] = $form_data;
			}
		} else if ($field->target == 'static') {
			$body[$field->name] = $field->value;
		}
	}

	$response = wp_remote_post(
		$options['url'],
		array(
			'method' => 'POST',
			'timeout' => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array(),
			'body' => $body,
			'cookies' => array()
		)
	);
}

add_action('wpcf7_before_send_mail', 'action_wpcf7_before_send_mail', 10, 3);
