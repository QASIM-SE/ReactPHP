<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$server = new \React\Http\Server(function(\Psr\Http\Message\ServerRequestInterface $request){
    return new \React\Http\Response(200, [
        'Content-Type'=>'text/plain'
    ],  
    'Hello world');

});

$socket= new \React\Socket\Server(8000, $loop);
$server->listen($socket);

$loop->run();