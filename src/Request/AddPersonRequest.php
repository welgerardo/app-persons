<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class AddPersonRequest extends BaseRequest
{
    public string $firstName;

    public ?string $lastName = null;

    public ?int $nif = null;

    public ?string $birthday = null; 

    
}