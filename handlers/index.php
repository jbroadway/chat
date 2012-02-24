<?php

/**
 * Sets up the chat widget.
 */

$this->require_login ();

if (! $this->internal) {
	$page->title = i18n_get ('Chat');
}

$channel = (isset ($data['channel']) && ! empty ($data['channel']))
	? preg_replace ('/[^a-z0-9_-]+/', '-', strtolower ($data['channel']))
	: 'default';

$page->add_script ('http://js.pusher.com/1.11/pusher.min.js');
$page->add_script ('/apps/chat/css/default.css');

echo $tpl->render ('chat/index', array (
	'api_key' => $appconf['Pusher']['api_key'],
	'channel' => $channel,
	'name' => current (explode (' ', User::val ('name'))) // first name
));

?>