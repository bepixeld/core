<?php

declare(strict_types=1);

namespace atk4\core;

use PHPUnit\Framework\TestCase;

/**
 * Generic TestCase for PHPUnit tests for ATK4 repos.
 */
class PHPUnit7_AgileTestCase extends TestCase
{
    public function runBare(): void
    {
        try {
            parent::runBare();
        } catch (\Exception $e) {
            if ($e instanceof \atk4\core\Exception) {
                throw new PHPUnit7_AgileExceptionWrapper($e->getMessage(), 0, $e);
            } else {
                throw $e;
            }
        }
    }

    /**
     * Calls protected method.
     *
     * NOTE: this method must only be used for low-level functionality, not
     * for general test-scripts.
     *
     * @param object $obj
     * @param string $name
     * @param array  $args
     *
     * @throws \ReflectionException
     *
     * @return mixed
     */
    public function callProtected($obj, $name, array $args = [])
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($obj, $args);
    }

    /**
     * Returns protected property value.
     *
     * NOTE: this method must only be used for low-level functionality, not
     * for general test-scripts.
     *
     * @param object $obj
     * @param string $name
     *
     * @throws \ReflectionException
     *
     * @return mixed
     */
    public function getProtected($obj, $name)
    {
        $class = new \ReflectionClass($obj);
        $method = $class->getProperty($name);
        $method->setAccessible(true);

        return $method->getValue($obj);
    }

    /**
     * Fake test. Otherwise Travis gives warning that there are no tests in here.
     */
    public function testFake()
    {
        $this->assertTrue(true);
    }
}
