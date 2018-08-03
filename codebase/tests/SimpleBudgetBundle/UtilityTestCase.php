<?php

namespace Tests\SimpleBudgetBundle;

use PHPUnit\Framework\TestCase;

abstract class UtilityTestCase extends TestCase
{
    /**
     * @param string $className
     * @param string $methodName
     * @param array  $args
     *
     * @return mixed
     */
    protected function callPrivateMethod(string $className, string $methodName, array $args)
    {
        $class = new \ReflectionClass($className);

        $method = $class->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($className, $args);
    }
}
