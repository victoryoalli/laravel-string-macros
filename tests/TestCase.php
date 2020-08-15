<?php

namespace VictorYoalli\StringMacros\Tests;

use VictorYoalli\StringMacros\StringMacrosServiceProvider;
use PHPUnit\Framework\TestCase as BaseTestCase;
use ReflectionClass;


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
