<?php

declare(strict_types=1);

namespace Application\Services;

final class HelloService
{
    public function sayHello(): string
    {
        return 'Hello from PHP ' . PHP_VERSION;
    }
}
