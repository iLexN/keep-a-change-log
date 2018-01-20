<?php
declare(strict_types=1);

if (!function_exists('callMethod')) {
    /**
     * Call protected or private method
     *
     * @param $object
     * @param $methodName
     * @param array $arguments
     *
     * @return mixed
     * @throws ReflectionException
     */
    function callMethod($object, $methodName, array $arguments = [])
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
     * ssem can this phpunit readAttribute();
     *
     * @param $object
     * @param $propertyName
     *
     * @return mixed
     * @throws ReflectionException
     */
    function getProperty($object, $propertyName)
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
     * @param $object
     * @param $propertyName
     * @param $propertyValue
     *
     * @throws ReflectionException
     */
    function setProperty($object, $propertyName, $propertyValue)
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $propertyValue);
    }
}
