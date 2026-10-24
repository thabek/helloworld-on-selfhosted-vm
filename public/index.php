<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use Application\Services\HelloService;

$service = new HelloService();

echo $service->sayHello();
