<?php
//M QASIM 10-2021

use React\Socket\ConnectionInterface;

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/ConnectionPool.php';


$loop = \React\EventLoop\Factory::create();

$server = new \React\Socket\Server('127.0.0.1:8000', $loop);

$pool = new ConnectionPool();

$server->on('connection', function(ConnectionInterface $connection) use ($pool){
	echo $connection->getRemoteAddress().PHP_EOL;
	$pool->add($connection);

});

$loop->run();
