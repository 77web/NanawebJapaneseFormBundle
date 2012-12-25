<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrefectureTypeTest extends WebTestCase
{
    public function test()
    {
        $client = static::createClient();
        
        $container = $client->getContainer();
        
        $form = $container
                    ->get('form.factory')
                    ->createBuilder()
                    ->add('pref', 'jp_prefecture')
                    ->getForm()
        ;
        $formView = $form->createView();
        
        $this->assertEquals(47, count($formView['pref']->vars['choices']));
    }
}