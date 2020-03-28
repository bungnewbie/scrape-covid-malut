<?php

require __DIR__."/../vendor/autoload.php";

use Bot\Exe;

/**
 * Instance Exe
 * @var Exe
 */
$result = new Exe();

/**
 * Example get where prov
 * @var array
 */
$prov = $result->province("malut")->get();

/**
 * Example get where prov and regional
 * @var array
 */
$reg  = $result->province("malut")->regional("kota_ternate")->get();