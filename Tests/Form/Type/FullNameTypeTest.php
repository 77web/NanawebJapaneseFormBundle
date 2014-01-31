<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;

use Nanaweb\JapaneseFormBundle\Form\Type\FullNameType;

class FullNameTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test_setDefaultOptions()
    {
        $resolver = $this->getMock('Symfony\Component\OptionsResolver\OptionsResolverInterface');
        $resolver
            ->expects($this->once())->method('setDefaults')
            ->with($this->logicalAnd($this->isType('array'), $this->arrayHasKey('name_for_first_name'), $this->arrayHasKey('name_for_family_name')))
        ;

        $type = new FullNameType();
        $type->setDefaultOptions($resolver);
    }

    public function test_buildForm()
    {
        $builder = $this->getMockForAbstractClass('Symfony\Component\Form\Test\FormBuilderInterface');
        $builder
            ->expects($this->exactly(2))
            ->method('add')
            ->with($this->logicalOr($this->equalTo('name1'), $this->equalTo('name2')), 'text', $this->isType('array'))
            ->will($this->returnValue($builder))
        ;
        $builder
            ->expects($this->once())
            ->method('addViewTransformer')
            ->with($this->isInstanceOf('Nanaweb\JapaneseFormBundle\Form\DataTransformer\FullNameDevideTransformer'))
            ->will($this->returnValue($builder))
        ;

        $type = new FullNameType();
        $type->buildForm($builder, array(
              'required' => false,
              'max_length' => 100,
              'label' => 'dummy',
              'read_only' => false,
              'error_bubbling' => false,
              'name_for_first_name' => 'name1',
              'name_for_family_name' => 'name2',
          ));
    }
}