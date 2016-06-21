<?php

// Importation de certaines packages phalcon
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Phalcon\Mvc\Model\Validator\Uniqueness;
//Création de la classe Users qui va hériter de la classe Model de phalco
class Users extends Model
{
    //Fonction qui permet de determiner le nom de la table de la bdd qui va être traitée 
    public function getSource(){
            return 'Users';
    }
    // Fonction qui permet de définir les contraintes qu'on veut appliquer à cette table
    //par exemple ici le champ "login" doit être unique( impossible d'avoir deux logins identiques)
    public function validation()
    {
        

        // User login must be unique
        $this->validate(
            new Uniqueness(
                array(
                    "field"   => "login",
                    )
                )
            );

        // Check if any messages have been produced
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }
}

