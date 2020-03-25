<?php

namespace Bot\Telegram;

/**
 * Telegram Bot Example whitout WebHook.
 * It uses getUpdates Telegram's API.
 * @author Muhammad Rizkal Lamaau <lamaaurizkhal@gmail.com>
 */

use Bot\Traits\Transformers;
use Bot\Telegram\TelegramBot;

class GetUpdate
{
    use Transformers;

    private $telegram;

    public function __construct($token)
    {
        $this->telegram = new TelegramBot($token);
    }

    private function return($id, $content)
    {
        $results = ['chat_id' => $id, 'text' => $content];
        $telegram->sendMessage($results);
    }

    public function run()
    {
        $id   = $this->telegram->ChatID();
        $text = $this->telegram->Text();

        switch ($text) {
            case '/start':
                    $this->return($id, 'helo from switch case');
                break;
            default:
                    $this->return($id, 'command not found');
                break;
        }
    }
}