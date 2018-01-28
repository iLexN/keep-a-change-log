<?php
declare(strict_types=1);

if (!function_exists('callMethod')) {
    /**
     * Call protected or private method
     *
     * @param mixed $object
     * @param string $methodName
     * @param array $arguments
     *
     * @return mixed
     * @throws ReflectionException
     */
    function callMethod($object, string $methodName, array $arguments = [])
    {
        $class = new ReflectionClass($object);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);
        return empty($arguments)
            ? $method->invoke($object)
            : $method->invokeArgs($object, $arguments);
    }
}

if (!function_exists('getProperty')) {
    /**
     * Get protected or private property
     * seem can this phpunit readAttribute();
     *
     * @param mixed $object
     * @param string $propertyName
     *
     * @return mixed
     * @throws ReflectionException
     */
    function getProperty($object, string $propertyName)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}

if (!function_exists('setProperty')) {
    /**
     * Set protected or private property
     *
     * @param mixed $object
     * @param string $propertyName
     * @param mixed $propertyValue
     *
     * @throws ReflectionException
     */
    function setProperty($object, string $propertyName, $propertyValue)
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $propertyValue);
    }
}
