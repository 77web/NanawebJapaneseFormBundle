<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;


use Nanaweb\JapaneseFormBundle\Form\Type\PrefectureType;

class PrefectureTypeTest extends \PHPUnit_Framework_TestCase
{
    public function test_setDefaultOptions()
    {
        $resolver = $this->getMock('Symfony\Component\OptionsResolver\OptionsResolverInterface');
        $resolver
            ->expects($this->once())
            ->method('setDefaults')
            ->with($this->logicalAnd($this->isType('array'), $this->arrayHasKey('choices')))
        ;
        $dummyPrefs = array('pref1', 'pref2', 'pref3');

        $type = new PrefectureType($dummyPrefs);
        $type->setDefaultOptions($resolver);
    }
}