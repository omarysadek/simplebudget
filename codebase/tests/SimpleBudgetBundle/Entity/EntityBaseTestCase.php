<?php

namespace Tests\SimpleBudgetBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Tests\SimpleBudgetBundle\BaseTestCase;

abstract class EntityBaseTestCase extends BaseTestCase
{
    protected $model;

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function setAndGetErTest($attrName, $value)
    {
        $this->setterTest($attrName, $value);

        return $this->getterTest($attrName, $value);
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function booleanTest($attrName, $value)
    {
        $this->setterTest($attrName, $value);

        return $this->isserTest($attrName);
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function collectionsTest($attrName, $value)
    {
        $valueAsArrayCollection = new ArrayCollection();
        $valueAsArrayCollection->add($value);
        $this->setterTest($attrName, $valueAsArrayCollection);
        $reflectionClass = $this->adderTest($attrName, $value);
        $this->removeTest($attrName, $reflectionClass, $value);

        return $this->getterTest($attrName, $valueAsArrayCollection);
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function enumTest($attrName, $value)
    {
        $this->setAndGetErTest($attrName, $value);

        $this->expectException(\InvalidArgumentException::class);
        $this->setterTest($attrName, '');
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function setterTest($attrName, $value)
    {
        $methodName = 'set'.ucfirst($attrName);
        $this->model->$methodName($value);
        $reflexionModel = new \ReflectionClass($this->model);
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($this->model), $value);

        return $reflexionModel;
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function getterTest($attrName, $value = null)
    {
        $newValue = ($value) ? $value : rand(1, 100000);
        $reflexionModel = new \ReflectionClass($this->model);
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $property->setValue($this->model, $newValue);

        $methodName = 'get'.ucfirst($attrName);

        $this->assertEquals($newValue, $this->model->$methodName());

        return $reflexionModel;
    }

    /**
     * @param string $attrName
     *
     * @return \ReflectionClass
     */
    protected function isserTest($attrName)
    {
        $newValue = rand(1, 100000);
        $reflexionModel = new \ReflectionClass($this->model);
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $property->setValue($this->model, $newValue);

        $methodName = 'is'.ucfirst($attrName);

        $this->assertEquals($newValue, $this->model->$methodName());

        return $reflexionModel;
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function adderTest($attrName, $value)
    {
        $reflexionModel = new \ReflectionClass($this->model);
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $baseVal = $property->getValue($this->model);

        $this->assertTrue(is_array($baseVal) || $baseVal instanceof ArrayCollection);
        $preCount = count($baseVal);
        $methodName = 'add'.ucfirst($attrName);

        if (!$reflexionModel->hasMethod($methodName)) {
            $methodName = substr($methodName, 0, strlen($methodName) - 1);
        }
        $this->model->$methodName($value);

        $newVal = $property->getValue($this->model);
        $this->assertCount($preCount + 1, $newVal);
        $this->assertEquals($value, end($newVal)[0]);

        return $reflexionModel;
    }

    /**
     * @param string $attrName
     * @param string $value
     *
     * @return \ReflectionClass
     */
    protected function removeTest($attrName, $reflexionModel, $value)
    {
        $property = $reflexionModel->getProperty($attrName);
        $property->setAccessible(true);
        $baseVal = $property->getValue($this->model);

        $this->assertTrue(is_array($baseVal) || $baseVal instanceof ArrayCollection);
        $preCount = count($baseVal);
        $methodName = 'remove'.ucfirst($attrName);

        if (!$reflexionModel->hasMethod($methodName)) {
            $methodName = substr($methodName, 0, strlen($methodName) - 1);
        }
        $this->model->$methodName($value);

        $newVal = $property->getValue($this->model);
        $this->assertCount($preCount - 1, $newVal);

        return $reflexionModel;
    }

    /**
     * @test
     */
    public function toStringTest()
    {
        if (method_exists($this->model, '__toString')) {
            $this->assertTrue(is_null($this->model->__toString()) || is_string($this->model->__toString()));
        }
    }
}
