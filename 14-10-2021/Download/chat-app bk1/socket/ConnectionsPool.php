<?php

use React\Socket\ConnectionInterface;

class ConnectionPool
{
    protected $connections;
    public function __construct(){

        $this->connections = new SplObjectStorage();
    }

    public function add(ConnectionInterface $connection)
    {
        $connection->write("Welcome to chat app\n");
        $this->connections->attach($connection);
// notify if any user join the chat.
        foreach($this->connections as $conn)
        {
            if($conn != $connection)
            {
                $conn->write("A new user enter the chat\n");
            }

        }


        $connection->on('data',function($data) use ($connection){
            foreach($this->connections as $conn){
                if($conn != $connection)
                $conn->write($data);
            }


        });
        $connection->on('close',function() use ($connection){

            $this->connections->detach($connection);
            foreach($this->connections as $conn)
            {
                if($conn != $connection)
                {
                    $conn->write("A user leave the chat\n");
                }

            }


        });
    }
}