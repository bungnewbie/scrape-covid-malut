<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Telegram\GetUpdate;

/**
 * Token from @botfather
 * @var string
 */
$token = "";

/**
 * Instance bot
 * @var Covid
 */
$bot = new GetUpdate($token);

/**
 * Run bot
 */
$bot->run();