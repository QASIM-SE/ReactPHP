<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Response;

$loop = \React\EventLoop\Factory::create();



$posts = [];
$txtName = $_POST['name'];
echo $txtName;

$server = new \React\Http\Server(function (ServerRequestInterface $request) use (&$txtName){

	print_r($requesr->getParsedBody());
	return Response(201);

});
$socket = new \React\Socket\Server('127.0.0.1:8000', $loop);

$server->listen($socket);

$loop->run();