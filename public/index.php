<?php

require "../vendor/autoload.php";

use Bot\Covid;

/**
 * Token from @botfather
 * @var string
 */
$token = "1006409107:AAGQEztMnBYeg-X_EPSudAhA_PfHWfe1t00";

/**
 * Instance bot
 * @var Covid
 */
$bot = new Covid($token);

/**
 * Run bot
 */
$bot->run();