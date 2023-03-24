<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BaseRequest
{

    protected ValidatorInterface $validator;

    protected object $content;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;        
    }

    public function getRequest() : object
    {
        /**@var Request $request */
        $request = Request::createFromGlobals();

        $this->content = json_decode($request->getContent());

        return $this->content;
    }

    public function getContent()
    {
        $this->getRequest();
        
        foreach($this->content as $key => $value){
            if(property_exists($this, $key))
                $this->{$key} = $value;
        }

        return $this->isValid();
        
    }

    protected function isValid()
    {
        $errors = $this->validator->validate($this);

        $messages= [];
        if(count($errors)){
            foreach ($errors as $message) {
                $messages[$message->getPropertyPath()] = $message->getMessage();
            }

            $ex = new \Exception(json_encode($messages), 400);
            throw $ex;
        }

        return $this;
    }
}