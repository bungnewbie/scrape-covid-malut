<?php

namespace Bot\Telegram;

/**
 * Telegram Bot Example whitout WebHook.
 * It uses getUpdates Telegram's API.
 * @author Muhammad Rizkal Lamaau <lamaaurizkhal@gmail.com>
 */

use Bot\Exe;
use Bot\Constants\Keys;
use Bot\Traits\Transformers;
use Bot\Telegram\TelegramBot;

class GetUpdate
{
    private $bot;

    private $telegram;

    public function __construct($token)
    {
        $this->bot = new Exe;
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
                    $content = "/global: global data\n/indonesia: only indonesia\n/prov [name]: where province\n/reg [prov][reg]: where region\n/list_of_prov: show the province list\n/list_of_reg: show the region list\n/example: how to use";
                    $this->return($id, $content);
                break;
            case "/global":
                    $this->return($id, "coming soon :)");
                break;
            case "/indonesia":
                    $this->return($id, "coming soon :)");
                break;
            case command($text) == "/prov":
                    $reply = pluck_reply($text, 1);
                    if(in_array($reply, Keys::province())) {
                        $content = pretty($this->bot->province($reply)->get());
                        $this->return($id, $content);
                    } else {
                        if(empty($reply)) {
                            $this->return($id, "mising params");
                        } else {
                            $this->return($id, "params not found, send /list_of_prov to show the list");
                        }
                    }
                break;
            case command($text) == "/reg":
                    $prov   = pluck_reply($text, 1);
                    $region = pluck_reply($text, 2);

                    if(in_array($prov, Keys::province())) {
                        if (! in_array($region, $this->province($prov)->command())) {
                            $this->return($id, 'ada prov gak ada region');
                        }
                        $this->return($id, "ada prov dan region");
                    } else {
                        if(empty($prov) || empty($region)) {
                            $this->return($id, "mising params");
                        } else {
                            $this->return($id, "params <strong>{$prov}</strong> not found, send /list_of_prov to show the list");
                        }
                    }
                break;
            case "/list_of_prov":
                    $content = implode("\n", Keys::province());
                    $this->return($id, $content);
                break;
            case "/list_of_reg":
                    $this->return($id, "hehehe");
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