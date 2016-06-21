<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Photos extends Model
{
    public function getSource(){
            return 'Photos';
    }
    
    public function validation()
    {
        

        //  must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "chemin",
                    )
                )
            );

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
}

