<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class MatchsSpecial extends Model
{
    public function getSource(){
            return 'MatchsSpecial';
    }
    /*
    public function validation()
    {
        

        //  must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "id_match",
                    )
                )
            );

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }*/
}

