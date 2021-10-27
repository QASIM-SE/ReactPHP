<?php
//M QASIM 10-2021

require __DIR__ . '/vendor/autoload.php';

function get($uri, $successCallback, $errorCallback){

    $responseData = "something";

    if($responseData){
        $successCallback($responseData);
        return;

    }
    $errorCallback(new Exception('no response data'));
}
get('https://beyondco.de', function($data) {

    echo "recive data: " . $data.PHP_EOL;

}, function(Exception $e){
    echo "error: ". $e->getMessage().PHP_EOL;
} );