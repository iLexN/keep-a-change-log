<?php declare(strict_types=1);

if (!\function_exists('call_method')) {
    /**
     * Call protected or private method
     *
     * @param mixed $object
     * @param array<int,mixed> $arguments
     *
     * @return mixed
     * @throws ReflectionException
     */
    function call_method(
        mixed $object,
        string $methodName,
        array $arguments = []
    ): mixed {
        $class = new \ReflectionClass($object);
        $method = $class->getMethod($methodName);
        $method->setAccessible(\true);
        return empty($arguments)
            ? $method->invoke($object)
            : $method->invokeArgs($object, $arguments);
    }
}
if (!\function_exists('get_property')) {
    /**
     * Get protected or private property
     * seem can this phpunit readAttribute();
     *
     * @param mixed $object
     *
     * @return mixed
     * @throws ReflectionException
     */
    function get_property(mixed $object, string $propertyName): mixed
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(\true);
        return $property->getValue($object);
    }
}
if (!\function_exists('set_property')) {
    /**
     * Set protected or private property
     *
     * @param mixed $object
     * @param mixed $propertyValue
     *
     * @throws ReflectionException
     */
    function set_property(mixed $object, string $propertyName, mixed $propertyValue)
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(\true);
        $property->setValue($object, $propertyValue);
    }
}
