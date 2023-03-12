<?php
namespace App\Repository\Sql;
use Doctrine\DBAL\DriverManager;
use App\Repository\Sql\PersonConnection;

class PersonRepository extends PersonConnection
{
    public function getPerson()
    {
        DriverManager::getConnection([]);
    }

    public function savePerson(array $person)
    {try {
        $conn = $this->connect();

        $queryBuilder = $conn->createQueryBuilder();
        
        $queryBuilder->insert('person')->values([
            'mail'       => ':email',
            'first_name' => ':firstName',
            'last_name'  => ':lastName'
        ])->setParameters([
            'email' => $person['email'],
            'firstName' => $person['firstName'],
            'lastName' => $person['lastName']
        ])
        ;

        $queryBuilder->executeQuery();
        $conn->commit();
    } catch (\Throwable $th) {
        //throw $th;
    }

        

    }
}