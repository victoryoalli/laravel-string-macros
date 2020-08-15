<?php

namespace VictorYoalli\StringMacros\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use ReflectionClass;
use VictorYoalli\StringMacros\StringMacrosServiceProvider;

class TestCase extends BaseTestCase
{
    public function setup(): void
    {
        $this->createDummyprovider()->register();
    }

    protected function createDummyprovider(): StringMacrosServiceProvider
    {
        $reflectionClass = new ReflectionClass(StringMacrosServiceProvider::class);

        return $reflectionClass->newInstanceWithoutConstructor();
    }
}
