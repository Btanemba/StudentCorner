<p>Hello,</p>

<p>A new message has been posted by {{ $messageData->user->name }}:</p>

<p>Message Reads:{{ $messageData->message }}</p>

<p>Check the chat <a href="{{ route('message.chat') }}">here</a>.</p>
