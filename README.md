# Chat for Elefant

This is a simple member chat app for the [Elefant CMS](http://www.elefantcms.com/),
powered by the [Pusher](http://www.pusherapp.com/) realtime messaging service.

To install, drop the app into your Elefant `apps` folder and edit the file
`apps/chat/conf/config.php`. Enter your APP ID, API Key and API Secret values from
Pusher. You can now access the default chat at the URL `/chat` on your website.
Please note that chats are members-only, so if you're not logged in you will be taken
to the member login screen first.

## Embedding the chat box

Chats can be embedded into any page via the Dynamic Objects menu in the WYSIWYG editor,
or into any application via the following code:

```php
<?php

echo $this->run ('chat/index', array ('channel' => 'channel-name'));

?>
```

Or in a view template:

```html
{! chat/index?channel=channel-name !}
```

If no channel is specified, the channel name will be `default`. Channels can be
used in your apps to create separate chat rooms for different groups of users.

## Styling the chat box

The chat box can easily be styled through CSS, and some very basic CSS is included
in `/apps/chat/css/default.css`. For reference, here is what the HTML of the chat
box looks like:

```html
<div id="chat">
	<div id="chat-box">
		<ul id="chat-list">
			<li class="chat-msg">
				<span class="chat-user">Johnny:</span>
				<span class="chat-text">Hello, world!</span>
			</li>
			<li class="chat-msg">
				<span class="chat-user">World:</span>
				<span class="chat-text">Hi Johnny!</span>
			</li>
		</ul>
	</div>

	<form id="chat-form" onsubmit="return chat.speak (this)">
		<input type="text" name="chat-input" id="chat-input" />
		<input type="submit" value="Send" id="chat-submit" />
	</form>
</div>
```
