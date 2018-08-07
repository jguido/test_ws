<?php

namespace App\Tests\Model\Slug;


use App\Model\Slug\Slugifier;
use PHPUnit\Framework\TestCase;

class SlugifierTest extends TestCase
{
    function testSlugifier()
    {
        self::assertSame('hello-world', Slugifier::Slugify('Hello World'));
    }
}