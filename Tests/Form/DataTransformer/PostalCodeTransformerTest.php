<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\DataTransformer;

use Nanaweb\JapaneseFormBundle\Form\DataTransformer\PostalCodeTransformer;

class PostalCodeTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PostalCodeTransformer
     */
    private $transformer;
    
    public function setUp()
    {
        $this->transformer = new PostalCodeTransformer();
    }
    
    public function testTransform()
    {
        $result = $this->transformer->transform('005-0022');
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['three']));
        $this->assertTrue(isset($result['four']));
        $this->assertEquals('005', $result['three']);
        $this->assertEquals('0022', $result['four']);
        
        $result2 = $this->transformer->transform('0050022');
        $this->assertTrue(is_array($result2));
        $this->assertTrue(isset($result2['three']));
        $this->assertTrue(isset($result2['four']));
        $this->assertEquals('', $result2['three']);
        $this->assertEquals('', $result2['four']);
    }
    
    public function testReverseTransform()
    {
       $result = $this->transformer->reverseTransform(array('three' => '005', 'four' => '0022'));
       $this->assertTrue(is_string($result));
       $this->assertEquals('005-0022', $result);
    }
    
    public function tearDown()
    {
        $this->transformer = null;
    }
}