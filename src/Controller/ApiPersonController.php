<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\ORM\EntityManager;
use App\Repository\Sql\PersonConnection;
use App\Request\AddPersonRequest;
use App\Request\BaseRequest;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiPersonController extends AbstractController
{
    private ValidatorInterface $validator;

    private LoggerInterface $logger;

    public function __construct(ValidatorInterface $validator, LoggerInterface $logger)
    {
        $this->validator = $validator;
        $this->logger = $logger;    
    }

    #[Route('persons', methods: 'GET', name: 'get-persons')]
    public function getPersons() : Response
    {
        return new Response("hello i am here!") ;
    }

    #[Route('persons', methods: 'POST', name: 'add-person')]
    public function addPerson(AddPersonRequest $request, EntityManagerInterface $entityManager) : Response
    {
        $content = $request->getContent();

        $person = new Person;
        $person->setFirstName($content->first_name);
        $person->setLastName($content->last_name);
        $person->setNif($content->nif);
        $person->setBirthday(new \DateTimeImmutable($content->birthday));
        
        $entityManager->persist($person);
        $entityManager->flush();

        return new Response("hello i am new here and i get the id : " . $person->getId() ) ;
    }
}