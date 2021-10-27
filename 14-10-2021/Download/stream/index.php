<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

//below command use for just windows system
// if (DIRECTORY_SEPARATOR === '\\') {
//     fwrite(STDERR, 'Non-blocking console I/O not supported on Microsoft Windows' . PHP_EOL);
//     exit(1);
// }


$out = new \React\Stream\WritableResourceStream(STDOUT, $loop);
//$in = new \React\Stream\ReadableResourceStream(STDIN, $loop);



///////////////stream pausing///////////////////////

$in = new \React\Stream\ReadableResourceStream(STDIN, $loop, 1);

$loop->addPeriodicTimer(0.2,function(){
	echo "hello".PHP_EOL;
});

$in->on('data', function($data) use($out, $in , $loop){

	$out->write($data.PHP_EOL);

	$in->pause();

	$loop->addtimer(1, function() use ($in){

			$in->resume();

		});

});



///////////////stream chunk sizing///////////////////////

//$in = new \React\Stream\ReadableResourceStream(STDIN, $loop, 1);

//$in->on('data', function($data) use($out){

	//$out->write($data.PHP_EOL);

//});




//////////////////composit streams////////////////////

//$composite = new \React\Stream\CompositeStream($in, $out);
//$composite->on('data', function($data) use ($composite){

	//$composite->write('You said: '.strtoupper($data));
//});



//////////////////stream by using through////////////////////

//$through = new \React\Stream\ThroughStream(function ($data){

	//return strtoupper($data);

//});

//$in->pipe($through)->pipe($out);

///////////////stream///////////////////////

//$in->on('data', function($data) use($out){

	//$out->write(strtoupper($data));

//});

////////////////stream byusing pipe//////////////////////

//$in->pipe($out);

// $handle = fopen("php://stdin","r");
// $no = fgets($handle);
// echo "number is : ". $no;


$loop->run();