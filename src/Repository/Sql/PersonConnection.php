<?php

namespace App\Repository\Sql;

use Doctrine\DBAL\DriverManager;

class PersonConnection
{
    public function connect()
    {
        return DriverManager::getConnection([
            'dbname'   => 'database',
            'user'     => 'user',
            'password' => 'secret',
            'host'     => 'database:3306',
            'driver'   => 'pdo_mysql'
        ]);
    }
}
