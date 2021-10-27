<?php
//M QASIM 10-2021

if(isset($_POST['send_message']))
{
 $curl_start = curl_init();
 $user_detail="Registerd Email:password";
 $receiver_no= $_POST['message']; 
}

echo $user_detail;
echo $receiver_no;

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$out = new \React\Stream\WritableResourceStream(STDOUT, $loop);

$server = new \React\Socket\Server('0.0.0.0:8000', $loop);


/////////////limiting server/////////////////

$limitingServer = new \React\Socket\LimitingServer($server, null);

$limitingServer ->on('connection', function(\React\Socket\Connection $connection) use ($out, $limitingServer )  {
    
    //$out->write('New connection'. PHP_EOL);
	$connection->on('data', function($data) use ($out, $limitingServer ){
			foreach($limitingServer ->getConnections() as $connection){
					$connection->write("data is here");
				
				}

		});

});





/////////////socket/////////////////

// $server->on('connection', function(\React\Socket\Connection $connection) use ($out)  {
    
//     //$out->write('New connection'. PHP_EOL);
// 	$connection->on('data', function($data) use ($out){
// 			$out->write($data);

// 		});

// });


$loop->run();