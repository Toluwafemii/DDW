<?php

namespace DDWeekend\Models;

class User
{

    public $firstname;
    public $lastname;
    public $email;
    public $phone;

    public function __construct($first_name, $last_name, $email, $phone)
    {
        $this->firstname = $first_name;
        $this->lastname = $last_name;
        $this->email = $email;
        $this->phone = $phone;
    }
}