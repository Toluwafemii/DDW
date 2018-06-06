<?php

namespace DDWeekend\Models;

class User
{
    
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    
    public function __contruct($first_name, $last_name, $email, $phone)
    {
        $this->firstName = $first_name;
        $this->lastName = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }
}