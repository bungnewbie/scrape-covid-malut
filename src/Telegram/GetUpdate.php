<?php

namespace Bot\Telegram;

/**
 * Telegram Bot Example whitout WebHook.
 * It uses getUpdates Telegram's API.
 * @author Muhammad Rizkal Lamaau <lamaaurizkhal@gmail.com>
 */

use Bot\Constants\Keys;
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
                    $content = "/global: global data\n/indonesia: only indonesia\n/prov [name]: where province\n/region [name]: where region\n/list_of_prov: show the province list\n/list_of_region: show the region list\n/example: how to use";
                    $this->return($id, $content);
                break;
            case "/global":
                    $this->return($id, "coming soon :)");
                break;
            case "/indonesia":
                    $this->return($id, "coming soon :)");
                break;
            case "/prov":
                    $this->return($id, $text);
                break;
            case "/region":
                    $this->return($id, $text);
                break;
            case "/list_of_prov":
                    $content = implode("\n", Keys::province());
                    $this->return($id, $content);
                break;
            case "/list_of_region":
                    $this->return($id, "in progres :)");
                break;
            case "/example":
                    $this->return($id, "in progres :)");
                break;
            default:
                    $this->return($id, "command not found :(");
                break;
        }
    }
}