<?php

use App\Repository\Sql\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PersonRepositoryTest extends KernelTestCase
{
    /** @test */
    public function saveOnePerson()
    {
        $person = new PersonRepository;

        $person->savePerson([
            'email' => 'mgp@mgp.com',
            'firstName' => 'Manuel Gerardo',
            'lastName' => 'Pereira'
        ]);
    }
}