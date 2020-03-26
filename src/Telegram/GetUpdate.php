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
        $results = ["chat_id" => $id, "text" => $content, "parse_mode" => "html"];
        $this->telegram->sendMessage($results);
    }

    public function run()
    {
        $id   = $this->telegram->ChatID();
        $text = $this->telegram->Text();

        switch ($text) {
            case "/start":
                    $content = "Hello {$this->telegram->Username()}, send /help to show the command list.";
                    $this->return($id, $content);
                break;
            case "/help":
                    $content = "/clq: all\n/count: count malut\nwhere kab:\n".implode("\n", build_command());
                    $this->return($id, $content);
                break;
            case "/clq":
                    $this->return($id, pretty($this->all()));
                break;
            case in_array($text, build_command()):
                    $content = pretty($this->whereCity(unbuild_command($text)));
                    $this->return($id, $content);
                break;
            default:
                    $this->return($id, "command not found :(");
                break;
        }
    }
}