<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Faq extends Model
{
    public function getSource(){
            return 'Faq';
    }
    
}

