<?php

/**
 * @author Muhammad Rizkhal Lamaau <lamaaurizkhal@gmail.com>
 */

require __DIR__."/../vendor/autoload.php";

use Bot\Telegram\GetUpdate;

/**
 * Token from @botfather
 * @var string
 */
$token = "paste your token here";

/**
 * Instance bot
 * @var Covid
 */
$bot = new GetUpdate($token);

/**
 * Run bot
 */
$bot->run();