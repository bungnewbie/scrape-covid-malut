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
                    $content = "/global: global data\n/indonesia: only indonesia\n/prov [name]: where province\n/reg [prov][reg]: where region\n/list_of_prov: show the province list\n/list_of_reg [prov]: show the region list";
                    $this->return($id, $content);
                break;
            case "/global":
                    $this->return($id, "per prov kab dulu, global dah banyak :)");
                break;
            case "/indonesia":
                    $this->return($id, "cek sini kalo indonesia bro @MyIceTea_Bot :)");
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

                    if(in_array($prov, Keys::province()) && in_array($region, $this->bot->province($prov)->command())) {
                        $content = pretty($this->bot->province($prov)->regional($region)->get());
                        $this->return($id, $content);
                    } else {
                        if(empty($prov) || empty($region)) {
                            $this->return($id, "please chek the params, send /help to show the command");
                        }
                    }
                break;
            case "/list_of_prov":
                    $content = implode("\n", Keys::province());
                    $this->return($id, $content);
                break;
            case command($text) == "/list_of_reg":
                    $prov = pluck_reply($text, 1);
                    if (! empty($prov)) {
                        $content = implode("\n", $this->bot->province($prov)->command());
                        $this->return($id, $content);
                    } else {
                        $this->return($id, "missing prov, send /list_of_prov to show the list");
                    }
                break;
            default:
                    $this->return($id, "command not found :(");
                break;
        }
    }
}