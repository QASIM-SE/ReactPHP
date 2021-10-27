<?php
//M QASIM 10-2021

use React\Socket\ConnectionInterface;
use React\Socket\Connector;


require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/ConnectionPool.php';


$loop = \React\EventLoop\Factory::create();
$input = new \React\Stream\ReadableResourceStream("STDIN", $loop);

$connector = new Connector($loop);
$connector->connect('127.0.0.2:8000')
->then(
    function (ConnectionInterface $connection) use ($input){
        $input->on('data', function($data) use ($connection){
            $connection->write($data);

        });

        $connection->on('data', function ($data){

            echo $data;

        });

    },
    function (Exception $exception){

        echo $exception->getMessage() . PHP_EOL;

    }
);


$loop->run();