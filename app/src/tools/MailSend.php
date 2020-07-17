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
            $mail->setFrom('contact2@bpgo.fr', 'ACEF BPGO SOIREE FONCTION PUBLIQUE');
            $mail->addAddress($adresse, 'User');

            //Attachments
            $pdfCreator = new PdfCreator();
            $html2pdf = $pdfCreator->createPdf($invite);
            $content = $html2pdf->Output('Invitation.pdf', 'S');
            $mail->addStringAttachment($content,'invitation.pdf');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->CharSet = "UTF-8";
            $mail->Subject =  'Pass - Soirée Fonction Publique';
            $mail->Body    =  '
                <!doctype html>
                <html>
                
                <head>
                    <meta charset="utf-8">
                    <title>Pass - Soirée Fonction Publique</title>
                    <style type="text/css">
                        /* Fonts and Content */
                
                        body,
                        td {
                            font-family: Arial, sans-serif;
                            font-size: 18px;
                            color: #000000;
                        }
                
                        body {
                            background-color: #0E3885;
                            margin: 0;
                            padding: 0;
                            -webkit-text-size-adjust: none;
                            -ms-text-size-adjust: none;
                        }
                
                        img {
                            border: 0;
                            max-width: 100%;
                            height: auto;
                            vertical-align: top;
                        }
                
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
                
                <body bgcolor="#0E3885" style="font-family:Arial, sans-serif; font-size:16px; margin:0; color: #000000;">
                    <center>
                        <table width="700" class="w100" border="0" cellspacing="0" cellpadding="0" bgcolor="#0E3885">
                            <tbody>
                                <tr>
                                    <td align="center" bgcolor="#0E3885" style="text-align:center;">
                                        <table width="675" class="w100" border="0" cellspacing="0" cellpadding="0" bgcolor="#0E3885" align="center">
                                            <tbody>
                                                <tr>
                                                    <td align="center" bgcolor="#0E3885" style="text-align:center;">
                                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#ffffff" style="border-radius: 40px;">
                                                        <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style=\'color:#04A5C2; font-family: " Gill Sans ", "Gill Sans MT", Calibri, sans-serif; font-variant:small-caps; font-size:48px;\'>INVITATION SOIRÉE</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style=\'color:#04A5C2; font-size:48px;\'>FONCTION PUBLIQUE</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                     <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                
                                                                                    <td align="center" style="color: #1348A0">Votre inscription est confirmée</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#04A5C2">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" style="color : #ffffff; padding: 10px 30px;font-size: 20px;">
                                                                                                        <strong>JEUDI 31 MAI 2018 À 18H30</strong>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="color: #1348A0;font-size: 14px;">Centre de vacances ANAS - Tréveneuc</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="color: #1348A0">Vous trouverez en pièce jointe votre Pass d\'Entrée nominatif que vous devrez présenter le jour J.
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                     <table align="center" border="0" cellspacing="0" cellpadding="0" width="400">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <table width="88%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="49%" align="left" valign="middle" class="bloc">
                                                                                                    </td>
                                                                                                    <td class="bloc">&nbsp;</td>
                                                                                                    <td class="bloc">&nbsp;</td>
                                                                                                    <td width="49% " align="right " valign="middle " class="bloc">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                </tr>
                                                                </tbody>
                                                                </table>
                                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                                </table>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </body>
                
                </html>'
            ;

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