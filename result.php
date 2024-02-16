<?php
class ChatNotificationManager {
    public function notify($message) {
        // Реализация уведомлений чата...
    }
}

class ChatMessageRepository {
    public function save($message) {
        // Реализация сохранения сообщения в репозитории...
    }
}

class ChatMessage {
    private ?int $id;
    private int $chatId;
    private UserInterface $user;
    private string $text;

    public function __construct($chatId, $user, $text) {
        $this->chatId = $chatId;
        $this->user = $user;
        $this->text = $text;
    }

    // Геттеры и сеттеры для свойств класса...

    public function sendNotification(ChatNotificationManager $notificationManager) {
        $notificationManager->notify($this);
    }
}

class Chat {
    private int $id;
    private array $messages;

    public function __construct($id) {
        $this->id = $id;
        $this->messages = array();
    }

    // Геттеры и сеттеры для свойств класса...

    public function addMessage($user, $text) {
        $message = new ChatMessage($this->id, $user, $text);
        $this->messages[] = $message;

        $chatMessageRepository = new ChatMessageRepository();
        $chatMessageRepository->save($message);

        $chatNotificationManager = new ChatNotificationManager();
        $message->sendNotification($chatNotificationManager);
    }
}