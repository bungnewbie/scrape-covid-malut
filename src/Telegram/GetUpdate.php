<?php

namespace Bot\Telegram;

/**
 * Telegram Bot Example whitout WebHook.
 * It uses getUpdates Telegram's API.
 * @author Muhammad Rizkal Lamaau <lamaaurizkhal@gmail.com>
 */

use Bot\Telegram\TelegramBot;

class GetUpdate
{
    private $telegram;

    public function __construct($token)
    {
        $this->telegram = new TelegramBot($token);
    }

    public function run()
    {
        $text = $this->telegram->Text();
        $chat_id = $this->telegram->ChatID();
        $content = array('chat_id' => $chat_id, 'text' => $text);
        $this->telegram->sendMessage($content);
    }
}