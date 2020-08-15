<?php

namespace VictorYoalli\StringMacros\Test;

use Orchestra\Testbench\TestCase as Orchestra;

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
