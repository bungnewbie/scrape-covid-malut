<?php

require "../vendor/autoload.php";

use Bot\Telegram\TelegramBot;

$bot_token = '1006409107:AAGQEztMnBYeg-X_EPSudAhA_PfHWfe1t00';

$telegram = new TelegramBot($bot_token);

$text = $telegram->Text();

$chat_id = $telegram->ChatID();

$content = array('chat_id' => $chat_id, 'text' => 'Hello');

$telegram->sendMessage($content);