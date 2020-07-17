<?php
namespace App\Dao;
use App\Model\JoReponses;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 10:12
 */

class ReponseDao
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function countPresent(){
            return $this->em->createQueryBuilder()
                ->select('COUNT(r.participe)')
                ->from(JoReponses::class,'r')
                ->where('r.participe = 1')
                ->andWhere('r.suppr IS NULL')
                ->getQuery()
                ->getSingleScalarResult();
    }
    /*public function countAccompagnant(){
            return $this->em->createQueryBuilder()
                ->select('COUNT(r.accompagnantNom)')
                ->from(JoReponses::class,'r')
                ->where('r.present = 1')
                ->andWhere('r.suppr IS NULL')
                ->andWhere("r.accompagnantNom <> ''")
                ->getQuery()
                ->getSingleScalarResult();
    }*/

}