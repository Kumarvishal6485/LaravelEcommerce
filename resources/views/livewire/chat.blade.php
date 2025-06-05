<div id="chat-form">
    @foreach($messages as $message)
        {{$message}}
    @endforeach
    <form wire:submit="sendMessage()">
        <input type="text" placeholder="Text Message Here" wire:model="message">
        <input type="submit" value="Send">
    </form>
</div>
