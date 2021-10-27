<?php
//M QASIM 10-2021

require 'vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface;

$loop = \React\EventLoop\Factory::create();

$server = new \React\Http\Server(function(ServerRequestInterface $request){
    return new \React\Http\Response(200, ['Content-Type'=>'text/plain'], 'hello world!');
    // $server->on('error',function(Throwable $t){
    //     return new \React\Http\Response(200, ['Content-Type'=>'text/plain'], $t);
    // });


});
$socket = new \React\Socket\Server('127.0.0.1:8000',$loop);
$server->listen($socket);
$loop->run();