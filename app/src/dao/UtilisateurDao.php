<?php
namespace App\Dao;
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 10:12
 */

class UtilisateurDao
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getUser($login,$password){
        $array = ['login' => $login,'mdp' => $password];
        $utilisateur = $this->em->getRepository('App\Model\JoIdent')->findOneBy( $array);
        return $utilisateur;
    }

}