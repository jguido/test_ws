<?php

namespace App\Tests;



use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HelloTest extends WebTestCase
{
    function testHello()
    {
        $stub = $this->createMock(Kernel::class);

        $stub->method('registerBundles')->willThrowException(new NotFoundHttpException());

        $client = static::createClient();

        self::assertTrue(true);
    }

}