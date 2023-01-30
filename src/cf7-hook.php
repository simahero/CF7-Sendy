<?php

function action_wpcf7_before_send_mail($contact_form, &$abort, $submission)
{

	$enabled = $contact_form->pref('dw_sendy_enabled');

	if (!$enabled) return;

	$url = $contact_form->pref('dw_sendy_url');
	$api_key = $contact_form->pref('dw_sendy_api_key');

	$sendy = $submission->get_posted_data('sendy');

	$body = array(
		'api_key' => $api_key
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
		$url,
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

	$logging = $contact_form->pref('dw_sendy_logging_enabled');

	if ($logging && !is_wp_error($response)) {
		dws_log($response);
	}
}

add_action('wpcf7_before_send_mail', 'action_wpcf7_before_send_mail', 10, 3);
