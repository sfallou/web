<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Ecoles extends Model
{
    public function getSource(){
            return 'Ecoles';
    }
    
    public function validation()
    {
        

        // nom must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "nom_ecole",
                    )
                )
            );

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
}

