<?php

namespace Nanaweb\JapaneseFormBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class PostalCodeTransformer implements DataTransformerInterface
{
    public function transform($postalCode)
    {
        $postalCodes = array(
          'three' => '',
          'four' => '',
        );
        
        if (false !== strpos($postalCode, '-'))
        {
            list($three, $four) = explode('-', $postalCode);
            
            $postalCodes['three'] = $three;
            $postalCodes['four'] = $four;
        }
        
        return $postalCodes;
    }

    public function reverseTransform($postalCodes)
    {
        return $postalCodes['three'].'-'.$postalCodes['four'];
    }
}