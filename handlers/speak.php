<?php

/**
 * Gateway for chat messages being submitted.
 */

$this->require_login ();

$page->layout = false;

// Determine channel
$channel = (count ($this->params) > 0) ? $this->params[0] : 'default';

// Build message array
$options = array (
	'displayName' => current (explode (' ', User::val ('name'))), // first name
	'text' => substr (htmlspecialchars ($_POST['msg']), 0, 300),
	'email' => substr (htmlspecialchars (User::val ('email')), 0, 100),
	'get_gravatar' => false
);

$activity = new Activity ('chat-message', $options['text'], $options);
$pusher = new Pusher ($appconf['Pusher']['api_key'], $appconf['Pusher']['api_secret'], $appconf['Pusher']['app_id']);
$data = $activity->getMessage ();
$response = $pusher->trigger ($channel, 'chat_message', $data, null, true);

header ('Cache-Control: no-cache, must-revalidate');
header ('Content-Type: application/json');

$res = array ('activity' => $data, 'pusherResponse' => $response);
echo json_encode ($res);

?>