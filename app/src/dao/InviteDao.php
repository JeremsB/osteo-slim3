<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 16:32
 */

namespace App\Dao;


use App\Model\AgepReponses;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\Query\ResultSetMapping;

class InviteDao
{
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function getInvites(){
//        $query = $this->em->createQuery('SELECT u, p FROM AgepInvite i JOIN p.invite p');
//        $list = $query-getResult();
        $list = $this->em->getRepository('App\Model\JoInvites')->findAll();
        $arrayInvite = [];
        foreach ($list as $invite){
            if(!is_null($invite->getReponse())) {
                if (!($invite->getReponse()->getSuppr())) {
                    $arrayInvite[] = $invite;
                }
            }else{
                $arrayInvite[] = $invite;
            }
        }
        return $arrayInvite;
    }
    public function getInvitesById($id){
        $invite = $this->em->getRepository('App\Model\JoInvites')->find($id);
        return $invite;
    }
    public function getInvitesByHash($hash){
        $array = ['hash' => $hash];
        $invite = $this->em->getRepository('App\Model\JoInvites')->findOneBy($array);
        return $invite;
    }
    public function getAccompagnant($id){
        $array = ['invites' => $id];
        $reponse = $this->em->getRepository('App\Model\AgepReponses')->findOneBy($array);
        return $reponse;
    }

    public function getParticipant(){
        $invites = $this->em->getRepository('App\Model\JoInvites')->findAll();
        $arrayInvite = [];
        foreach ($invites as $invite){
            if(!is_null($invite->getReponse())) {
                if ($invite->getReponse()->getParticipe()) {
                    if (!($invite->getReponse()->getSuppr())) {
                        $arrayInvite[] = $invite;
                    }
                }
            }
        }
        return $arrayInvite;
    }
    public function getRefus(){
        $invites = $this->em->getRepository('App\Model\JoInvites')->findAll();
        $arrayInvite = [];
        foreach ($invites as $invite){
            if(!is_null($invite->getReponse())){
                if(!($invite->getReponse()->getParticipe())) {
                    if(!($invite->getReponse()->getSuppr()))
                    $arrayInvite[] = $invite;
                }
            }
        }
        return $arrayInvite;
    }
    public function suppInvite($id){
        $array = ['invitesId' => $id];
        $invite = $this->em->getRepository('App\Model\JoInvites')->findOneBy($array);
        $reponse = $invite->getReponse();
        //echo $reponse->getPresent();
        if($reponse){
            $reponse->setSuppr(true);
        }else{
            $reponse = new AgepReponses();
            $reponse->setInvites($invite);
            $reponse->setSuppr(true);
            $this->em->persist($reponse);
        }
        $invite->setReponse($reponse);
        $this->em->persist($invite);
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        }
    }

    public function saveReponse($accompagnant){
        try{
            $this->em->persist($accompagnant);
            $this->em->flush();
        }catch (\Exception $e){

        }
        return $accompagnant;
    }

    public function saveInvite($JoInvite){
        try{
            $this->em->persist($JoInvite);
            $this->em->flush();
            $JoInvite->setHash(md5($JoInvite->getInvitesId()));
            $this->em->persist($JoInvite);
            $this->em->flush();
        }catch (\Exception $e){

        }
    }
}