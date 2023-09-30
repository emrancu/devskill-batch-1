<?php

abstract class LogContract {
    protected string $message;

    abstract function setLog($message):void;

    abstract function getLog():string;
}


class FileLog extends LogContract {

    function setLog($message): void
    {
        // write message to file
       $this->message = $message;
    }

    function getLog(): string
    {
        // get file log from file
        return $this->message;
    }
}

class RedisLog extends LogContract {

    function setLog($message): void
    {
        // write to redis
        $this->message = $message;
    }

    function getLog(): string
    {
        // get log from redis
        return $this->message;
    }
}


function printLog(LogContract $logContract): void
{
   echo  $logContract->getLog();
}

function setLog(LogContract $logContract, $message): void
{
   $logContract->setLog($message);
}

$log =  new RedisLog();

setLog($log, "Redis Log");
printLog($log);

