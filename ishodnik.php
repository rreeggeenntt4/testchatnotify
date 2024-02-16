<?php
class ChatNotificationManager {
    function notify($message);
}

class ChatMessageRepository {
    // ...
    public function save($message)
    {
        // ...
    }
}

class ChatMessage {
    private ?int $id;
    private int $chatld;
    private Userlnterface $user;
    private string $text;
    // ...
    public function  __construct($chatld, $user, $text) {
        $this->chatld = $chatld;
        $this->user = $user;
        $this->text = $text;
        $chatNotificationManager = new ChatNotificationManager();
        $chatNotificationManager->notify($message);
    }

    // ...
}

class Chat{
    public int $id;
    public ChatMessage $messages;

    // ...

    public function addMessage($user, $text) {
        $message = new ChatMessage($this->id, $user, $text);
        $chatMessageRepository = new ChatMessageRepository();
        $chatMessageRepository->save($message);
    }
    
    // ...
}
