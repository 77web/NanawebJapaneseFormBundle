<?php

namespace Nanaweb\JapaneseFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Nanaweb\JapaneseFormBundle\Form\DataTransformer\FullNameDevideTransformer;

class FullNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $childOptions = array(
          'max_length' => $options['max_length'],
          'required' => $options['required'],
          'label' => $options['label'],
          'trim' => true,
          'read_only' => $options['read_only'],
          'error_bubbling' => $options['error_bubbling'],
        );
        
        $builder
            ->add($options['name_for_family_name'], 'text', $childOptions)
            ->add($options['name_for_first_name'], 'text', $childOptions)
        ;
        
        $transformer = new FullNameDevideTransformer($options['name_for_family_name'], $options['name_for_first_name']);
        $builder
            ->addViewTransformer($transformer)
        ;
    }

    public function getName()
    {
        return 'jp_fullname';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'name_for_first_name' => 'first_name',
            'name_for_family_name' => 'family_name',
        ));
    }
}
