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
use App\Lib\Constants;
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
    public function dispatchInscriptionHash(Request $request, Response $response, $args)
    {
        $nbPresent = $this->reponseDao->countPresent();
        /*if($nbPresent >= Constants::JAUGE) {
            $this->view->render($response, 'complet.twig');
        }else{*/
        $id = $args["id"];
        $invite = $this->inviteDao->getInvitesByHash($id);
        if($invite){
            if ($invite->getReponse() != null) {
                $this->view->render($response, 'confirme.twig' ,['invite' => $invite,'reponse'=> $invite->getReponse()]);
            } else {
                $this->view->render($response, 'inscription.twig', ['invite' => $invite, 'jauge' => Constants::JAUGE, 'nbParticipants' => $nbPresent]);
            }
        } else {
            $this->view->render($response, 'bad_hash.twig',['invite' => $invite]);
        }
        //}
        return $response;
    }
    public function dispatchInscriptionVierge(Request $request, Response $response, $args)
    {
        $nbPresent = $this->reponseDao->countPresent();
        /*if($nbPresent >= Constants::JAUGE) {
            $this->view->render($response, 'complet.twig');
        }else{*/
        $this->view->render($response, 'inscription.twig', ['jauge' => Constants::JAUGE, 'nbParticipants' => $nbPresent]);
        //}
        return $response;
    }
    public function inscription(Request $request, Response $response, $args)
    {
        $nbPresent = $this->reponseDao->countPresent();
        /*if($nbPresent >= Constants::JAUGE) {
            $this->view->render($response, 'complet.twig');
        }else {*/
        if ($request->getParam('hash') != null){
            $invite = $this->inviteDao->getInvitesByHash($request->getParam('hash'));
        } else {
            $invite = new JoInvites();
        }
            //$invite = $this->inviteDao->getInvitesByHash($request->getParam('hash'));
        $invite->setEmail($request->getParam('email'));
        $invite->setPrenom($request->getParam('prenom'));
        $invite->setNom($request->getParam('nom'));
        $invite->setCiv($request->getParam('civ'));
        $invite->setTelPortable($request->getParam('tel'));
        $invite->setEntreprise($request->getParam('entreprise'));
        $invite->setFonction($request->getParam('fonction'));
        $invite->setCodeNaf($request->getParam('codeNaf'));
        $invite->setEstClient($request->getParam('client'));

        $this->inviteDao->saveInvite($invite);

        if ($request->getParam('hash') == null){
            $hash = hash('whirlpool',$invite->getInvitesId());
            $invite->setHash($hash);
            $this->inviteDao->saveInvite($invite);
        }

            $reponse = $invite->getReponse();
            if (!$reponse) {
                $reponse = new JoReponses();
            }
            $reponse->setInvites($invite);
            $reponse->setParticipe($request->getParam('participe'));
            if ($request->getParam('participe') == true) {
                $reponse->setLienConf(false);
            } else {
                $reponse->setLienConf($request->getParam('lienConf'));
            }
            $date = new \DateTime("now");
            $date = date_format($date, "d-m-Y H:i:s");
            $reponse->setReponseDate($date);
            $reponse = $this->inviteDao->saveReponse($reponse);
            $invite->setReponse($reponse);
            $this->inviteDao->saveInvite($invite);

            $mailSend = new MailSend();
            if ($request->getParam('participe') == true) {
                $mailSend->sendMail($invite->getEmail(), $invite, 'magnificat', 'magnificat*35830');
            } else if ($request->getParam('lienConf') == true) {
                $mailSend->sendMailLien($invite->getEmail(), $invite, 'magnificat', 'magnificat*35830');
            }
            $this->view->render($response, 'confirme.twig' ,['invite' => $invite,'reponse'=> $reponse]);
        //}
        return $response;
    }
    public function invite(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getInvites();
        $nbParticipants = $this->reponseDao->countPresent();
        $nbInvitesNr = $this->reponseDao->countInvitesNoResponse();
        $nbInvitesR = $this->reponseDao->countInvitesResponse();
        $nbInvites = $nbInvitesNr + $nbInvitesR;
        $this->view->render($response, 'invites.twig',['invites' => $list,'nbInvites'=> $nbInvites, 'nbParticipants' => $nbParticipants, 'jauge' => Constants::JAUGE]);
        return $response;
    }
    public function participant(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getParticipant();
        $nbParticipants = $this->reponseDao->countPresent();
        $this->view->render($response, 'invitesParticipe.twig',['invites' => $list, 'nbParticipants' => $nbParticipants, 'jauge' => Constants::JAUGE]);
        return $response;
    }
    public function refus(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getRefus();
        $this->view->render($response, 'refus.twig',['invites' => $list]);
        return $response;
    }
    public function invitesLien(Request $request, Response $response, $args)
    {
        $list = $this->inviteDao->getInvitesLien();
        $nbParticipants = $this->reponseDao->countPresent();
        $nbLiens = $this->reponseDao->countLiens();
        $this->view->render($response, 'invitesLien.twig',['invites' => $list,'nbLiens'=> $nbLiens, 'nbParticipants' => $nbParticipants, 'jauge' => Constants::JAUGE]);
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
        $participe = $request->getParam('btnParticipe');
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
        $joInvite->setEntreprise($request->getParam('entreprise'));
        $joInvite->setFonction($request->getParam('fonction'));
        $joInvite->setCodeNaf($request->getParam('codeNaf'));
        $joInvite->setEstClient($request->getParam('btnClient'));

        $this->inviteDao->saveInviteAdmin($joInvite);

        $reponse = $joInvite->getReponse();
        if (!$reponse) {
            $reponse = new JoReponses();
        }
        $reponse->setParticipe($request->getParam('btnParticipe'));
        $reponse->setLienConf($request->getParam('btnLinkConf'));
        $reponse->setSuppr(null);
        $reponse->setInvites($joInvite);

        $reponse = $this->inviteDao->saveReponse($reponse);
        $joInvite->setReponse($reponse);

        $this->inviteDao->saveInviteAdmin($joInvite);

        //Envois de mail
        //Configuration du SMTP acces
        $mailSend = new MailSend();
        if ($request->getParam('btnParticipe') == true) {
            $mailSend->sendMail($joInvite->getEmail(), $joInvite, 'magnificat', 'magnificat*35830');
            return $response->withRedirect($this->router->pathFor('participant'));
        } else if ($request->getParam('btnLinkConf') == true) {
            $mailSend->sendMailLien($joInvite->getEmail(), $joInvite, 'magnificat', 'magnificat*35830');
            return $response->withRedirect($this->router->pathFor('invitesLien'));
        }
        return $response->withRedirect($this->router->pathFor('invite'));
    }
    public function suppInvite(Request $request, Response $response, $args){
        $this->inviteDao->suppReponse($args["id"]);
        return $response->withRedirect($this->router->pathFor('invite'));
    }
}