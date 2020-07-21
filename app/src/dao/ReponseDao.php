<?php
namespace App\Dao;
use App\Model\JoInvites;
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
    public function countInvitesNoResponse(){
            return $this->em->createQueryBuilder()
                ->select('COUNT(i.invitesId)')
                ->from(JoInvites::class,'i')
                ->where('i.reponse IS NULL')
                ->getQuery()
                ->getSingleScalarResult();
    }
    public function countInvitesResponse(){
            return $this->em->createQueryBuilder()
                ->select('COUNT(r.reponseId)')
                ->from(JoReponses::class,'r')
                //->where('r.suppr != 1')
                ->where('r.suppr IS NULL')
                ->getQuery()
                ->getSingleScalarResult();
    }

}