<?php

namespace Nanaweb\JapaneseFormBundle\Tests\Form\Type;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\FormException;

class FullNameTypeTest extends WebTestCase
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
                        ->add('customer', 'jp_fullname')
                        ->getForm()
            ;
            $this->assertTrue(true);
        }
        catch (FormException $e)
        {
            $this->fail($e->getMessage());
        }
    }
}