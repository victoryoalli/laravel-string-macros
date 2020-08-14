<?php

namespace VictorYoalli\Skeleton\Tests;

use Orchestra\Testbench\TestCase;
use VictorYoalli\Skeleton\SkeletonServiceProvider;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [SkeletonServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
