<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\DataTransformer;

use Nanaweb\JapaneseFormBundle\Form\DataTransformer\FullNameDevideTransformer;

class FullNameDevideDataTransformerTest extends \PHPUnit_Framework_TestCase
{
    private $transformer;
    
    public function setUp()
    {
        $this->transformer = new FullNameDevideTransformer('sei', 'mei');
    }
    
    public function testTransform()
    {
        $result = $this->transformer->transform('山田 太郎');
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['sei']));
        $this->assertTrue(isset($result['mei']));
        $this->assertEquals('山田', $result['sei']);
        $this->assertEquals('太郎', $result['mei']);
        
        $result = $this->transformer->transform('山田太郎');
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['sei']));
        $this->assertTrue(isset($result['mei']));
        $this->assertEquals('', $result['sei']);
        $this->assertEquals('', $result['mei']);
    }
    
    public function testReverseTransform()
    {
       $result = $this->transformer->reverseTransform(array('sei' => '山田', 'mei' => '太郎'));
       $this->assertTrue(is_string($result));
       $this->assertEquals('山田 太郎', $result);
    }
    
    public function testCustomSeparator()
    {
        $transformer = new FullNameDevideTransformer('sei', 'mei', ':');
        
        $result = $transformer->transform('山田:太郎');
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['sei']));
        $this->assertTrue(isset($result['mei']));
        $this->assertEquals('山田', $result['sei']);
        $this->assertEquals('太郎', $result['mei']);

        $result2 = $transformer->reverseTransform(array('sei' => '山田', 'mei' => '太郎'));
        $this->assertTrue(is_string($result2));
        $this->assertEquals('山田:太郎', $result2);
    }
    
    public function tearDown()
    {
        $this->transform = null;
    }
}