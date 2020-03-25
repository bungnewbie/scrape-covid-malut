<?php

namespace Bot;

use Exception;
use Bot\Traits\Transformers;

final class Covid
{
    use Transformers;

    private $token;

	public function __construct($token)
	{
		$this->token = $token;
	}

	public function bot($method, $data = [])
	{
		$url = "https://api.telegram.org/bot".$this->token."/".$method;
		$ch  = curl_init();

		$options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_SSL_VERIFYPEER => false
        ];

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $error  = curl_error($ch);
        $errno  = curl_errno($ch);
        curl_close($ch);

        if($error) {
            goto curl_error;
        }

        return toArray($result);

        curl_error: {
            if($error) {
                throw new Exception("Failed curl: {$errno} : {$error}");
            }
        }
	}

	public function getUpdates($up_id)
    {
        $get = $this->bot("getupdates", [
            "offset" => $up_id,
        ]);

        return @end($get['result']);
    }

    public function reply($up)
    {
        $msg = @$up['message'];

        switch (@$msg['text']) {
            case '/start':
                $this->bot('sendMessage', [
                    'chat_id' => @$msg['chat']['id'],
                    'text' => "<b>Hello {$msg['chat']['first_name']}!\n</b>\nThis bot olny show you #ChineseVirus information from Province Maluku Utara",
                    'parse_mode' => 'html',
                ]);
                break;
            case '/help':
                    $this->bot('sendMessage', [
                        'chat_id' => @$msg['chat']['id'],
                        'text' => "/clq: all data\n\nwhere kab:\n".implode("\n", build_command()),
                        'parse_mode' => 'html',
                    ]);
                break;
            case '/clq':
                    $this->bot('sendMessage', [
                        'chat_id' => @$msg['chat']['id'],
                        'text' => '<pre>'.toJson($this->all()).'</pre>',
                        'parse_mode' => 'html',
                    ]);
                break;
            case in_array(@$msg['text'], build_command()):
                    $this->bot('sendMessage', [
                        'chat_id' => @$msg['chat']['id'],
                        'text' => '<pre>'.toJson($this->whereCity(unbuild_command(@$msg['text']))).'</pre>',
                        'parse_mode' => 'html',
                    ]);
                break;
            default:
                    $this->bot('sendMessage', [
                        'chat_id' => @$msg['chat']['id'],
                        'text' => 'Command not found!'
                    ]);
                break;
        }
    }

    public function run()
    {
        while(true) {
            @$last_up = @$last_up or 0;
            (@$last_up == 0)?print('-'):print('+');
            @$get_up = $this->getUpdates($last_up + 1);
            @$last_up = @$get_up['update_id'];
            $this->reply($get_up);
            sleep(0.1);
        }
    }
}