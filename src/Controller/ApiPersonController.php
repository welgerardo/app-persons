<?php

namespace App\Controller;

use App\Repository\Sql\PersonConnection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiPersonController extends AbstractController
{
    #[Route("/")]
    public function getPerson() : Response
    {
        $conn = (new PersonConnection)->connect();

        $conn->connect();

        dump($conn->isConnected());
        return new Response("hello i am here!") ;
    }
}