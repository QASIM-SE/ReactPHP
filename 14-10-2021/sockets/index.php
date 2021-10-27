<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$out = new \React\Stream\WritableResourceStream(STDUOT, $loop);

$server = new \React\Socket\Server('127.0.0.1:8000',$loop);

$server->on('connection', function(\React\Socket\Connection $connection)  {
    
    $out->write('New connection'. PHP_EOL);

});


$loop->run();