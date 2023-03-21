<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\ORM\EntityManager;
use App\Repository\Sql\PersonConnection;
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
    public function addPerson(BaseRequest $request, EntityManagerInterface $entityManager) : Response
    {

        dd($request->getRequest()->getContent());

        $content = json_decode($request->getRequest());
        $person = new Person;

        try {
            $person->setFirstName($content->first_name);
            $person->setLastName($content->last_name);
            $person->setNif($content->nif);
        } catch (\Throwable $th) {
            $errors = $this->validator->validate($person);

          
            $this->logger->error((string)$errors);
            dd($errors);
        }

       

        $entityManager->persist($person);
        $entityManager->flush();

        

        return new Response("hello i am new here and i get the id : " . $person->getId() ) ;
    }
}