<?php

namespace Nanaweb\JapaneseFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrefectureType extends AbstractType
{
    private $prefectures;
    
    public function __construct(array $prefectures)
    {
        $this->prefectures = $prefectures;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->prefectures,
        ));
    }
    
    public function getParent()
    {
        return 'choice';
    }
    
    public function getName()
    {
        return 'jp_prefecture';
    }
}
