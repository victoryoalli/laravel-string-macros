<?php

namespace VictorYoalli\StringMacros\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use VictorYoalli\StringMacros\StringMacrosServiceProvider;

abstract class IntegrationTestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [CollectionMacroServiceProvider::class];
    }

    public function avoidTestMarkedAsRisky()
    {
        $this->assertTrue(true);
    }
}
