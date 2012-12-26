<?php

namespace Nanaweb\JapaneseFormBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class FullNameDevideTransformer implements DataTransformerInterface
{
    
    private $separator;
    private $nameForFamilyName;
    private $nameForFirstName;
    
    public function __construct($nameForFamilyName, $nameForFirstName, $separator = ' ')
    {
        $this->nameForFamilyName = $nameForFamilyName;
        $this->nameForFirstName = $nameForFirstName;
        $this->separator = $separator;
    }
    
    public function transform($fullname)
    {
        $familyName = '';
        $firstName = '';
        if (false !== strpos($fullname, $this->separator))
        {
          list($familyName, $firstName) = explode($this->separator, $fullname);
        }
        
        $names = array();
        $names[$this->nameForFamilyName] = $familyName;
        $names[$this->nameForFirstName] = $firstName;
        
        return $names;
    }

    public function reverseTransform($names)
    {
        foreach ($names as $key => $name)
        {
            $names[$key] = str_replace($this->separator, '', $name);
        }
        
        return $names[$this->nameForFamilyName].$this->separator.$names[$this->nameForFirstName];
    }
}