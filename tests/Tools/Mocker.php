<?php

namespace App\Tests\Tools;

trait Mocker
{
    /**
     * @param string $serviceDefinition
     * @param string $class
     * @param MethodAndResult[] $methodsAndResults
     */
    private function serviceMock(string $serviceDefinition, string $class, array $methodsAndResults): void
    {
        $mock = $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->getMock();
        $at = 0;
        foreach ($methodsAndResults as $methodAndResult) {
            $results = $methodAndResult->getResults();
            if (count($results) === 1) {
                $mock
                    ->expects($this->atLeast(0))
                    ->method($methodAndResult->getMethodName())
                    ->will($this->returnValue($results[0]));
            } else {
                foreach ($results as $result) {
                    $mock
                        ->expects($this->at($at))
                        ->method($methodAndResult->getMethodName())
                        ->will($this->returnValue($result));
                    $at++;
                }
            }

        }

        $this->client->getContainer()->set($serviceDefinition, $mock);
    }
}

class MethodAndResult
{
    private $methodName;
    /**
     * @var array
     */
    private $results;

    /**
     * MethodAndResult constructor.
     * @param $methodName
     * @param array $results
     */
    public function __construct($methodName, array $results = [])
    {
        $this->methodName = $methodName;
        $this->results = $results;
    }

    /**
     * @return mixed
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

    /**
     * @return array
     */
    public function getResults(): array
    {
        return $this->results;
    }
}