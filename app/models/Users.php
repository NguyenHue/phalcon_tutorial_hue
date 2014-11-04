<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\PresenceOf,
    Phalcon\Mvc\Model\Validator\Email;

class Users extends Model
{

    public $id;

    public $name;

    public $email;

    public function validation()
    {
        $this->validate(new PresenceOf(array(
            'field' => 'name',
            'message' => 'Name is not required'
        )));
        $this->validate(new PresenceOf(array(
            'field' => 'email',
            'message' => 'The e-mail is not required'
        )));
        $this->validate(new Email(array(
            'field' => 'email',
            'message' => 'The e-mail is not valid'
        )));
        if ($this->validationHasFailed() == true) {
                return false;
        }
    }

}