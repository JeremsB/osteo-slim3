<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 30/04/2018
 * Time: 16:33
 */

namespace App\Lib;


use PHPMailer\PHPMailer\PHPMailer;

class MailSend
{
    public function sendMail($adresse,$invite,$user,$pass){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug=  0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
            $mail->Host = 'mail.sotiaf.fr';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $user;                 // SMTP username
            $mail->Password = $pass;                           // SMTP password
            $mail->Port = 25;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('invitation@bpgo-entreprendre2024.fr', 'BPGO ENTREPRENDRE 2024');
            $mail->addAddress($adresse, 'User');

            //Attachments
            /*$pdfCreator = new PdfCreator();
            $html2pdf = $pdfCreator->createPdf($invite);
            $content = $html2pdf->Output('Invitation.pdf', 'S');
            $mail->addStringAttachment($content,'invitation.pdf');*/

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = "UTF-8";
            $mail->Subject =  'Pass - BPGO Entreprendre 2024';
            $mail->Body    =  '
                <!doctype html>
                    <html>
                    <head>
                    <meta charset="utf-8">
                    <title>PASS BPGO ENTREPRENDRE 2024</title>
                        <style type="text/css">
                        /* Fonts and Content */
                    ​
                        body,
                        td {
                          font-family:\'Gill Sans MT\', Helvetica, Arial, sans-serif; 
                          font-size: 18px;
                          color: #000000;
                        }
                    ​
                        body {
                          background-color: #192A6B;
                          margin: 0;
                          padding: 0;
                          -webkit-text-size-adjust: none;
                          -ms-text-size-adjust: none;
                        }
                    ​
                        img {
                          border: 0;
                          /*max-width: 100%;*/
                          height: auto;
                          vertical-align: top;
                        }
                    ​
                        @media only screen and (max-width: 700px) {
                          .w100 {
                            width: 100%;
                          }
                          .bloc {
                            width: 100%;
                            display: block;
                            text-align: center!important;
                          }
                          .masque {
                            display: none !important;
                          }
                          .centrer {
                            text-align: center !important;
                          }
                          .h5 {
                            height: 5px;
                          }
                        }
                      </style>
                    </head>
                    ​
                    <body bgcolor="#192A6B" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Helvetica, Arial, sans-serif; font-size:16px; margin:0; color: #000000;">
                        <table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td width="4%"></td>
                                                    <td align="center">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tbody>
                                                                <tr><td height="10">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td><img src="http://www.bpgo-entreprendre2024.fr/img/header_passV2.png" alt="PASS D\'ENTREE" width="650"></td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 20px; color:#727271; font-weight: bold; text-align: justify;">LES JEUX OLYMPIQUES ET PARALYMPIQUES DE <span style="color: #192A6B">PARIS 2024</span> <br>DES <span style="color: #E30613">OPPORTUNITÉS</span> DE DÉVELOPPEMENT EN <span style="color: #E30613">RÉGION</span>. <br>PRÉPAREZ-VOUS DÈS MAINTENANT !</td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="border-bottom: solid 2px #E30613;"></td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271; text-align: justify;">La <span style="color: #192A6B">Banque Populaire Grand Ouest</span> est heureuse de vous compter parmi ses invités pour cette journée dédiée aux Jeux Olympiques et Paralympiques de Paris 2024.</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271; text-align: justify;">L’entrée à cet événement ne sera autorisée que sur présentation de ce pass d’entrée <strong>nominatif</strong> et <strong>non cessible</strong>, valable pour :</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td align="center" style="font-family: arial, sans-serif; font-size: 20px; color:#E30613; font-weight: bold; text-transform: uppercase">'.$invite->getNom().' '.$invite->getPrenom().'</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271;">Merci de le présenter lors de votre arrivée sous format papier ou digital.</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                  <td align="center" style="color:#192A6B; font-size:16px; font-family: arial, sans-serif; font-weight: bold;">
                                                                    ENTREPRENDRE 2024
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="color:#192A6B; font-size:16px; font-family: arial, sans-serif; font-weight: bold;">
                                                                    le 22 septembre, de 16h à 18h
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="color:#192A6B; font-size:16px; font-family: arial, sans-serif; font-weight: bold;">
                                                                    au siège de la Banque Populaire Grand Ouest
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="color:#192A6B; font-size:18px; font-family: arial, sans-serif; font-weight: bold;">
                                                                    15 boulevard de la Boutière
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td align="center" style="color:#192A6B; font-size:18px; font-family: arial, sans-serif; font-weight: bold;">
                                                                    35760 Saint Grégoire
                                                                  </td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table border="0" cellspacing="0" cellpadding="0" width="80%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/BPGO_logo_pett.png" alt=""></td>
                                                                                                <td width="15" ></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15" ></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/entreprendre2024_ptt.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/canaux.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/medef.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table border="0" cellspacing="0" cellpadding="0" width="80%">
                                                                                        <tbody>
                                                                                            <tr>
                    ​
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/adie.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/CRESS.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/solideo.png" alt=""></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 10px; color:#727271; text-align: center;">Banque Populaire Grand Ouest - Société Anonyme Coopérative de Banque Populaire à capital variable <br> Siège social : 15 boulevard de la Boutière - CS 26858 - 35768 Saint Grégoire cedex <br> 857 500 227 RCS Rennes. Banque Populaire Grand Ouest exploite la marque Crédit Maritime.</td>
                                                                </tr>
                                                                <tr><td style="color:#FFFFFF; font-size: 10px;"><a href="#UNSUB#" style="color:#FFFFFF;">Vous désinscrire</a></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="4%"></td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </body>
                    </html>';

            //get a return
            //Savoir si le mail a été envoyé
            //$return = $mail->send();
            /*if(!$mail->send()) {
                echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent.';
            }*/
            $mail->send();
        } catch (Exception $e) {
        }
    }

    public function sendMailLien($adresse,$invite,$user,$pass){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug=  0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
            $mail->Host = 'mail.sotiaf.fr';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $user;                 // SMTP username
            $mail->Password = $pass;                           // SMTP password
            $mail->Port = 25;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('invitation@bpgo-entreprendre2024.fr', 'BPGO ENTREPRENDRE 2024');
            $mail->addAddress($adresse, 'User');

            //Attachments
            /*$pdfCreator = new PdfCreator();
            $html2pdf = $pdfCreator->createPdf($invite);
            $content = $html2pdf->Output('Invitation.pdf', 'S');
            $mail->addStringAttachment($content,'invitation.pdf');*/

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = "UTF-8";
            $mail->Subject =  'Inscription - BPGO Entreprendre 2024';
            $mail->Body    =  '
                <!doctype html>
                    <html>
                    <head>
                    <meta charset="utf-8">
                    <title>INSCRIPTION BPGO ENTREPRENDRE 2024</title>
                        <style type="text/css">
                        /* Fonts and Content */
                    ​
                        body,
                        td {
                          font-family:\'Gill Sans MT\', Helvetica, Arial, sans-serif; 
                          font-size: 18px;
                          color: #000000;
                        }
                    ​
                        body {
                          background-color: #192A6B;
                          margin: 0;
                          padding: 0;
                          -webkit-text-size-adjust: none;
                          -ms-text-size-adjust: none;
                        }
                    ​
                        img {
                          border: 0;
                          /*max-width: 100%;*/
                          height: auto;
                          vertical-align: top;
                        }
                    ​
                        @media only screen and (max-width: 700px) {
                          .w100 {
                            width: 100%;
                          }
                          .bloc {
                            width: 100%;
                            display: block;
                            text-align: center!important;
                          }
                          .masque {
                            display: none !important;
                          }
                          .centrer {
                            text-align: center !important;
                          }
                          .h5 {
                            height: 5px;
                          }
                        }
                      </style>
                    </head>
                    ​
                    <body bgcolor="#192A6B" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Helvetica, Arial, sans-serif; font-size:16px; margin:0; color: #000000;">
                        <table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td width="4%"></td>
                                                    <td align="center">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tbody>
                                                                <tr><td height="10">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td><img src="http://www.bpgo-entreprendre2024.fr/img/header_confirmationV2.png" alt="PASS D\'ENTREE" width="650"></td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 20px; color:#727271; font-weight: bold; text-align: justify;">LES JEUX OLYMPIQUES ET PARALYMPIQUES DE <span style="color: #192A6B">PARIS 2024</span> <br>DES <span style="color: #E30613">OPPORTUNITÉS</span> DE DÉVELOPPEMENT EN <span style="color: #E30613">RÉGION</span>. <br>PRÉPAREZ-VOUS DÈS MAINTENANT !</td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="border-bottom: solid 2px #E30613;"></td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271; text-align: justify;">Bonjour,</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271; text-align: justify;">Nous avons bien pris en compte votre inscription.</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 15px; color:#727271;">Vous recevrez le lien pour visionner la conférence dès le 23 septembre.</td>
                                                                </tr>
                                                                <tr><td height="20px;">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td valign="middle" align="center">
                                                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table border="0" cellspacing="0" cellpadding="0" width="80%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/BPGO_logo_pett.png" alt=""></td>
                                                                                                <td width="15" ></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15" ></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/entreprendre2024_ptt.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/canaux.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/medef.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table border="0" cellspacing="0" cellpadding="0" width="80%">
                                                                                        <tbody>
                                                                                            <tr>
                    ​
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/adie.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/CRESS.png" alt=""></td>
                                                                                                <td width="15"></td>
                                                                                                <td>
                                                                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td valign="middle" height="30" style="border-left: black 1px solid;"></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                                <td width="15"></td>
                                                                                                <td align="center"><img src="http://www.bpgo-entreprendre2024.fr/img/solideo.png" alt=""></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                                <tr><td height="20">&nbsp;</td></tr>
                                                                <tr>
                                                                    <td style="font-family: arial, sans-serif; font-size: 10px; color:#727271; text-align: center;">Banque Populaire Grand Ouest - Société Anonyme Coopérative de Banque Populaire à capital variable <br> Siège social : 15 boulevard de la Boutière - CS 26858 - 35768 Saint Grégoire cedex <br> 857 500 227 RCS Rennes. Banque Populaire Grand Ouest exploite la marque Crédit Maritime.</td>
                                                                </tr>
                                                                <tr><td style="color:#FFFFFF; font-size: 10px;"><a href="#UNSUB#" style="color:#FFFFFF;">Vous désinscrire</a></td></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="4%"></td>
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </body>
                    </html>';

            //get a return
            //Savoir si le mail a été envoyé
            //$return = $mail->send();
            /*if(!$mail->send()) {
                echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent.';
            }*/
            $mail->send();
        } catch (Exception $e) {
        }
    }
}