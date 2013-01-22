<?php

namespace Nanaweb\JapaneseFormBundle\Twig\Extension;

class JapanesePrefectureExtension extends \Twig_Extension
{
    protected $prefectureList;
    
    public function __construct(array $prefectureList)
    {
        $this->prefectureList = $prefectureList;
    }
    
    public function getFunctions()
    {
        return array(
          'prefecture_name' => new \Twig_Function_Method($this, 'findPrefectureName'),
        );
    }
    
    public function findPrefectureName($prefNo)
    {
        return isset($this->prefectureList[$prefNo]) ? $this->prefectureList[$prefNo] : '-';
    }
    
    public function getName()
    {
        return 'japanese_prefecture';
    }
}