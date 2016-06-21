<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Equipes extends Model
{
    public function getSource(){
            return 'Equipes';
    }
    
    public function validation()
    {
        

        //  must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "id_equipe",
                    )
                )
            );

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
}

