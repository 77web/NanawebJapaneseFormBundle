<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;



use Nanaweb\JapaneseFormBundle\Form\Type\PostalCodeType;

class PostalCodeTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test_buildForm()
    {
        $builder = $this->getMockForAbstractClass('Symfony\Component\Form\Test\FormBuilderInterface');
        $builder
            ->expects($this->exactly(2))
            ->method('add')
            ->with($this->logicalOr($this->equalTo('three'), $this->equalTo('four')), 'text', $this->isType('array'))
            ->will($this->returnValue($builder))
        ;
        $builder
            ->expects($this->once())
            ->method('addViewTransformer')
            ->with($this->isInstanceOf('Nanaweb\JapaneseFormBundle\Form\DataTransformer\PostalCodeTransformer'))
            ->will($this->returnValue($builder))
        ;

        $type = new PostalCodeType();
        $type->buildForm($builder, array('required' => false, 'read_only' => false, 'error_bubbling' => false));
    }
}