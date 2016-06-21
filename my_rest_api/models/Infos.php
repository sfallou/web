<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class Infos extends Model
{
    public function getSource(){
            return 'Infos';
    }
    
    
}

