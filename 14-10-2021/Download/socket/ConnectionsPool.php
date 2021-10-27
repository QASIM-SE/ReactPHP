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
        $connection->write('Enter you name:');

        $this->setConnectionName($connection,'');


        $connection->on('data',function($data) use ($connection){
            $name = $this->getConnectionName($connection);
            if(empty($name))
            {
                $this->addNewMember($connection, $data);
                return;
            }


            $this->sendAll("$name: $data", $connection);



        });

        $connection->on('close',function() use ($connection){
            $name = $this->getConnectionName($connection);
            $this->connections->offsetUnset($connection);
            $this->sendAll("A user $name leave the chat\n", $connection);



        });
    }
    private function addNewMember(ConnectionInterface $connection, $name)
    {
        
        $name = str_replace(["\n", "\r"], '',$name);
        $this->setConnectionName($connection, $name);
        $this->sendAll("User $name joins the chat\n",$connection);
    }

    // get connection name
    private function getConnectionName(ConnectionInterface $connection)
    {
        return $this->connections->offsetGet($connection);
    }
    // set connection name
    private function setConnectionName(ConnectionInterface $connection, $name)
    {
        return $this->connections->offsetSet($connection, $name);
    }

        /**
         * @param string $message
         * @param ConnectionInterface $expect
         */
        private function sendAll($message, ConnectionInterface $except)
        {
            foreach($this->connections as $connection)
                    {
                        if($connection != $except)
                        {
                            $connection->write($message);
                        }

                    }

        }
}
