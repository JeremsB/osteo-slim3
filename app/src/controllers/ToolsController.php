<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 24/04/2018
 * Time: 14:15
 */

namespace App\Controller;


use App\Dao\InviteDao;
use App\Lib\MailSend;
use App\Lib\PdfCreator;
use App\Model\JoInvites;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Stream;
use Spipu\Html2Pdf\Html2Pdf;

final class ToolsController extends BaseController
{
    public function dispatchPdf(Request $request, Response $response, $args)
    {
        $inviteDao = new InviteDao($this->em);
        $id = $args["id"];
        $invite = $inviteDao->getInvitesByHash($id);
        $pdfCreator = new PdfCreator();
        $html2pdf = $pdfCreator->createPdf($invite);
        $response = $response->withHeader( 'Content-type', 'application/pdf' );
        $response->write( $html2pdf->Output('Invitation.pdf', 'S') );

        return $response;
    }
    public function testMailDoro(Request $request, Response $response, $args){
        $mailSend = new MailSend();
        $invite = new JoInvites();
        $invite->setNom('test');
        $invite->setPrenom('test');
        $mailSend->sendMail('jeremy.balcon@sotiaf.fr',$invite,'jeremy.balcon@sotiaf.fr','Jeremy*35136');
    }
    public function testMailMagni(Request $request, Response $response, $args){
        $mailSend = new MailSend();
        $invite = new JoInvites();
        $invite->setNom('test');
        $invite->setPrenom('test');
        $mailSend->sendMail('nicolas.durand@sotiaf.fr',$invite,'magnificat','magnificat*35830');
    }
    public function testConfirme(Request $request, Response $response, $args){
        $this->view->render($response, 'confirme.twig');
        return $response;
    }
    public function testRefus(Request $request, Response $response, $args){
        $this->view->render($response, 'complet.twig');
        return $response;
    }
    public function mail(Request $request, Response $response, $args){
        $this->view->render($response, 'email.html');
        return $response;
    }
}