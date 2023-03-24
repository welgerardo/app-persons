<?php

namespace App\Request;

//use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class AddPersonRequest extends BaseRequest
{
    #[Assert\NotBlank(message:"First name is required.")]
    public string $first_name;

    public ?string $last_name = null;

    #[Assert\Type('string', message:"Invalid value")]
    public ?string $nif = null;

    #[Assert\DateTime('Y-m-d',message:"Invalid date.")]
    public ?string $birthday = null; 
}