<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();


$loop->addTimer(1, function () {
    echo 'Hello!' . PHP_EOL;
});
$loop->addTimer(1.5, function () {
    echo 'World!' . PHP_EOL;
});
$loop->run();