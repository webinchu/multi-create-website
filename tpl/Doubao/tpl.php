<?php

return <<<REGEXP
    use Workerman\Worker;
    
    $worker = new Worker('tcp://0.0.0.0:8018');
    $worker->onConnect = function ($connection) {
        echo "New connection from: " . $connection->getRemoteAddress() . "\n";
    };
    $worker->onMessage = function ($connection, $data) {
        $connection->send("You said: " . $data);
    };
    Worker::runAll();
    
    telnet localhost 8018
    Trying 127.0.0.1...
    Connected to localhost.
    Escape character is '^]'.
    Hello  # 输入数据
    You said: Hello  # 正常响应
REGEXP;
