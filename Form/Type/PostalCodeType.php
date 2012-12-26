<?php

namespace Nanaweb\JapaneseFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Nanaweb\JapaneseFormBundle\Form\DataTransformer\PostalCodeTransformer;

class PostalCodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $threeOptions = array(
          'max_length' => 3,
          'required' => $options['required'],
          'trim' => true,
          'read_only' => $options['read_only'],
          'error_bubbling' => $options['error_bubbling'],
        );
        $fourOptions = array(
          'max_length' => 4,
          'required' => $options['required'],
          'trim' => true,
          'read_only' => $options['read_only'],
          'error_bubbling' => $options['error_bubbling'],
        );
        
        $builder
            ->add('three', 'text', $threeOptions)
            ->add('four', 'text', $fourOptions)
            ->addViewTransformer(new PostalCodeTransformer())
        ;
    }

    public function getName()
    {
        return 'jp_postal_code';
    }
}