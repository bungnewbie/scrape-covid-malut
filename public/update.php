<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Telegram\GetUpdate;

/**
 * Token from @botfather
 * @var string
 */
$token = "1006409107:AAGQEztMnBYeg-X_EPSudAhA_PfHWfe1t00";

/**
 * Instance bot
 * @var Covid
 */
$bot = new GetUpdate($token);

/**
 * Run bot
 */
$bot->run();