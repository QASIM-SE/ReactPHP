<?php


require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

// if (DIRECTORY_SEPARATOR === '\\') {
//     fwrite(STDERR, 'Non-blocking console I/O not supported on Microsoft Windows' . PHP_EOL);
//     exit(1);
// }

$out = new \React\Stream\WritableResourceStream(STDOUT, $loop);
$in = new \React\Stream\ReadableResourceStream(STDIN, $loop);
// $handle = fopen("php://stdin","r");

// $no = fgets($handle);
// echo "number is : ". $no;

$in->pipe($out);

// require __DIR__ . '/vendor/autoload.php';

// $loop = \React\EventLoop\Factory::create();

// $in = new \React\Stream\ReadableResourceStream(STDIN, $loop);

// $in->on('data', function($chunk){
//     echo $chunk .PHP_EOL;

// });


$loop->run();