<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Telegram\GetUpdate;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

/**
 * Token from @botfather
 * @var string
 */
$token = $_ENV['BOT_TOKEN'];

/**
 * Instance bot
 * @var Covid
 */
$bot = new GetUpdate($token);

/**
 * Run bot
 */
$bot->run();