<?php

require "vendor/autoload.php";

use Bot\Covid;

/**
 * Token from @botfather
 * @var string
 */
$token = "";

/**
 * Instance bot
 * @var Covid
 */
$bot = new Covid($token);

/**
 * Run bot
 */
$bot->run();