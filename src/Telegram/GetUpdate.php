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
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function run()
    {
        $telegram = new TelegramBot($this->token);

        $text = $telegram->Text();
        $chat_id = $telegram->ChatID();
        $content = array('chat_id' => $chat_id, 'text' => 'Hello');
        $telegram->sendMessage($content);
    }
}