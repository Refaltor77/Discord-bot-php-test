<?php

include __DIR__ . '/vendor/autoload.php';

use refaltor\bot\Main;
use refaltor\bot\utils\JsonConfig;

ini_set('memory_limit', '-1');

spl_autoload_register(function (string $classname): void {
    if (str_contains($classname, "refaltor\bot\\")) {
        $classname = "./src/" . $classname . ".php";
        require_once($classname);
    }
});
$start = new Main();
$start->startingService();