<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\FormException;

class PrefectureTypeTest extends WebTestCase
{
    public function test()
    {
        $client = static::createClient();
        
        $container = $client->getContainer();
        
        try
        {
            $form = $container
                        ->get('form.factory')
                        ->createBuilder()
                        ->add('pref', 'jp_prefecture')
                        ->getForm()
            ;
            $this->assertTrue(true);
        }
        catch (FormException $e)
        {
            $this->fail($e->getMessage());
        }
        $formView = $form->createView();
        
        $this->assertEquals(47, count($formView['pref']->vars['choices']));
    }
}