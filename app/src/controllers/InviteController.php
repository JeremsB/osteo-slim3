<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 11:48
 */

namespace App\Controller;

use App\Dao\InviteDao;
use App\Dao\ReponseDao;
use App\Lib\MailSend;
use App\Lib\PdfCreator;
use App\Model\JoInvites;
use App\Model\JoReponses;
use DateTime;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;

class InviteController extends BaseController
{
    private $inviteDao;
    private $reponseDao;

    public function __construct(Container  $c)
    {
        parent::__construct($c);
        $this->inviteDao = new InviteDao($this->em);
        $this->reponseDao = new ReponseDao($this->em);
    }
    public function dispatchInscription(Request $request, Response $response, $args)
    {
        $nbPresent = $this->reponseDao->countPresent();
        /*$nbAccompagnant = $this->reponseDao->countAccompagnant();
        if($nbPresent + $nbAccompagnant >= 100) {
            $this->view->render($response, 'complet.twig');
        }else{*/
            $id = $args["id"];
            $invite = $this->inviteDao->getInvitesByHash($id);
            if($invite){
                $this->view->render($response, 'inscription.twig',['invite' => $invite]);
            } else {
                $this->view->render($response, '404.twig',['invite' => $invite]);
            }
        //}
        return $response;
    }
    public function inscription(Request $request, Response $response, $args)
    {
        $nbPresent = $this->reponseDao->countPresent();
        /*$nbAccompagnant = $this->reponseDao->countAccompagnant();
        if($nbPresent + $nbAccompagnant >= 100){
            $this->view->render($response, 'complet.twig');
        } else {*/
            $invite = $this->inviteDao->getInvitesByHash($request->getParam('hash'));
            $invite->setEmail($request->getParam('email'));
            $invite->setTelPortable($request->getParam('tel'));
            $invite->setEntreprise($request->getParam('entreprise'));
            $invite->setFonction($request->getParam('fonction'));
            $invite->setSecteurActivite($request->getParam('secteurActivite'));
            $invite->setEstClient($request->getParam('client'));
            $this->inviteDao->saveInvite($invite);

            $reponse = $invite->getReponse();
            if(!$reponse) {
                $reponse = new JoReponses();
            }
            //$reponse->setPresent(true);
            $reponse->setInvites($invite);
            $reponse->setParticipe($request->getParam('participe'));
            $reponse->setLienConf($request->getParam('lienConf'));
            $date = new \DateTime("now");
            $date = date_format($date, "d-m-Y H:i:s");
            $reponse->setReponseDate($date);
            $reponse = $this->inviteDao->saveReponse($reponse);
            $invite->setReponse($reponse);
            $this->inviteDao->saveInvite($invite);
            //$mailSend = new MailSend();
            //$mailSend->sendMail($invite->getEmail(),$invite,'jeremy.balcon@sotiaf.fr','Jeremy*35136');
            $this->view->render($response, 'confirme.twig');
        //}
        return $response;
    }
    public function invite(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getInvites();
        //$nbPresent = $this->reponseDao->countPresent();
        $this->view->render($response, 'invites.twig',['invites' => $list/*,'nbClient'=> $nbPresent,'nbAccompagnant' => $nbAccompagnant*/]);
        return $response;
    }
    public function participant(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getParticipant();
        $nbPresent = $this->reponseDao->countPresent();
        //$nbAccompagnant = $this->reponseDao->countAccompagnant();
        $this->view->render($response, 'invites.twig',['invites' => $list,'nbClient'=> $nbPresent]);
        return $response;
    }
    public function refus(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getRefus();
        $this->view->render($response, 'refus.twig',['invites' => $list]);
        return $response;
    }
    public function dispatchAjoutInvite(Request $request, Response $response, $args){
        $this->view->render($response, 'ajoutInvite.twig');
        return $response;
    }

    public function getInvite(Request $request, Response $response, $args){
        $id=$args["id"];
        $invite = $this->inviteDao->getInvitesById($id);
        $this->view->render($response, 'ajoutInvite.twig',['invite' => $invite]);
        return $response;
    }

    public function ajoutInvite(Request $request, Response $response, $args){
        $joInvite = null;
        $present = $request->getParam('btnPresent');
        $accompagne = $request->getParam('btnAccompagne');
        if($request->getParam('id')){
            $joInvite = $this->inviteDao->getInvitesById($request->getParam('id'));
        }else{
            $joInvite = new JoInvites();
        }
        $joInvite->setCiv($request->getParam('civ'));
        $joInvite->setNom($request->getParam('nom'));
        $joInvite->setPrenom($request->getParam('prenom'));
        $joInvite->setTelPortable($request->getParam('telMobile'));
        $joInvite->setEmail($request->getParam('email'));


        $this->inviteDao->saveInvite($joInvite);

        if($present==1) {
            $reponse = $joInvite->getReponse();
            if (!$reponse) {
                $reponse = new AgepReponses();
            }
            if($accompagne ==1){
                $reponse->setAccompagnantCiv($request->getParam('acc_civ'));
                $reponse->setAccompagnantNom($request->getParam('acc_nom'));
                $reponse->setAccompagnantPrenom($request->getParam('acc_prenom'));
                $reponse->setAccompagnantVille($request->getParam('acc_ville'));
                $reponse->setAccompagnantCp($request->getParam('acc_cp'));
                $reponse->setAccompagnantAdr1($request->getParam('acc_adr1'));
                $reponse->setAccompagnantAdr2($request->getParam('acc_adr2'));
                $reponse->setAccompagnantAdr3($request->getParam('acc_adr3'));
                $reponse->setAccompagnantSociete($request->getParam('acc_societe'));
                $reponse->setAccompagnantTel($request->getParam('acc_tel'));
                $reponse->setAccompagnantEmail($request->getParam('acc_email'));
            }
            $reponse->setPresent($request->getParam('btnPresent'));
            $reponse->setInvites($joInvite);

            $reponse = $this->inviteDao->saveReponse($reponse);
            $joInvite->setReponse($reponse);
        }
            $this->inviteDao->saveInvite($joInvite);

        //Envois de mail
        //Configuration du SMTP acces
        $mailSend = new MailSend();
        $mailSend->sendMail($joInvite->getEmail(),$joInvite,'magnificat','magnificat*35830');
        return $response->withRedirect($this->router->pathFor('invite'));
    }
    public function suppInvite(Request $request, Response $response, $args){
        $this->inviteDao->suppInvite($args["id"]);
        return $response->withRedirect($this->router->pathFor('invite'));
    }
}