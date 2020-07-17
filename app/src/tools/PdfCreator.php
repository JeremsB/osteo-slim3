<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 30/04/2018
 * Time: 16:12
 */

namespace App\Lib;


use Spipu\Html2Pdf\Html2Pdf;

class PdfCreator
{
    public function createPdf($invite){
        $html2pdf = new HTML2PDF('L', 'A4', 'en');
        if($invite->getReponse()){
            //if($invite->getReponse()->getAccompagnantPrenom()) {
                $html = '<div style="background-color: #0E3885;height: 99%;width: 100%">
                            <div style="margin-top:30px;margin:auto;background-color: #ffffff;height: 90%;width: 90%;border-radius: 40px;">
                                    <div style="text-align: center">
                                        <h1 style="color: #06A6C1;font-size: 60px;">PASS ENTREE</h1>
                                        <h1 style="color: #06A6C1;margin-top: -17px;"><span style="font-weight: 100">SOIRÉE</span> FONCTION PUBLIQUE</h1>
                                    </div >
                                    <br />
                                                                        <br />
                                    <div style="margin-left: 250px;">
                                        <!--<img src="http://194.250.42.70/BPGO/separator.png" width="450">-->
                                    </div>
                                    <br />
                                                                        <br />
                                    <div style="background-color: #06A6C1;width: 400px;text-align: center;margin-left: 275px">
                                            <h2 style="color: #ffffff;text-transform: uppercase">Jeudi 31 mai 2018 à 18h30</h2>
                                        </div>
                                    <div style="text-align: center;">
                                            <p style="font-size: 20px;color: #0E3885;margin-top: 10px;"><strong>Centre de vacances ANAS</strong></p> 
                                            <p style="font-size: 20px;color: #0E3885;margin-top: -16px;"><strong>25 Rue du Port Goret - 22410 Tréveneuc</strong></p>
                                     </div>
                                     <br />
                                     <div style="margin-left: 250px;">
                                        <!--<img src="http://194.250.42.70/BPGO/separator.png" width="450">-->
                                    </div>
                                <div style="width: 100%;text-align:center;">
                                    <p style="font-size: 18px;color: #0E3885;">L\'entrée ne sera autorisée que sur présentation de ce Pass d\'Entrée,valable pour : </p> 
                                    <p style="font-size: 22px;color: #06A6C1;"><strong style="text-transform: capitalize"> ' . $invite->getPrenom() . ' '. $invite->getNom(). ' </strong></p> 
                                    <p style="font-size: 18px;color: #0E3885;">Merci de le présenter lors de votre arrivée sous format papier ou digital et de vous munir d’une pièce d’identité.</p> 
                                </div>
                                <div style="width: 40%;text-align:left;margin-top: 30px;margin-left: 20px">
                                        <!--<img src="http://194.250.42.70/BPGO/LOGO_ACEF_Cotes_Armor_2.png" height="100" width="100">-->
                                    </div>
                                    <div style="width: 50%;position: relative;right: 20px;margin-top: -90px;">
                                    <div style="text-align: right;">
                                         <!--<img src="http://194.250.42.70/BPGO/BP_Grand_Ouest_D.png" height="100" width="200">-->
                                         </div>
                                    </div>
 
                    </div>
                    <p style="font-size: 12px;color: #ffffff;text-align: center">Banque Populaire Grand Ouest - 15, boulevard de la Boutière – CS 26858 – 35768 – Saint Grégoire Cedex – 857 500 227  RCS Rennes</p> 
                    <br/>
                </div>';
        }else{
            $html = '<div style="background-color: #0E3885;height: 99%;width: 100%">
                            <div style="margin-top:30px;margin:auto;background-color: #ffffff;height: 90%;width: 90%;border-radius: 40px;">
                                    <div style="text-align: center">
                                        <h1 style="color: #06A6C1;font-size: 60px;">PASS ENTREE</h1>
                                        <h1 style="color: #06A6C1;margin-top: -17px;"><span style="font-weight: 100">SOIRÉE</span> FONCTION PUBLIQUE</h1>
                                    </div >
                                    <br />
                                                                        <br />
                                    <div style="margin-left: 250px;">
                                        <!--<img src="http://194.250.42.70/BPGO/separator.png" width="450">-->
                                    </div>
                                    <br />
                                                                        <br />
                                    <div style="background-color: #06A6C1;width: 400px;text-align: center;margin-left: 275px">
                                            <h2 style="color: #ffffff;text-transform: uppercase">Jeudi 31 mai 2018 à 18h30</h2>
                                        </div>
                                    <div style="text-align: center;">
                                            <p style="font-size: 20px;color: #0E3885;margin-top: 10px;"><strong>Centre de vacances ANAS</strong></p> 
                                            <p style="font-size: 20px;color: #0E3885;margin-top: -16px;"><strong>25 Rue du Port Goret - 22410 Tréveneuc</strong></p>
                                     </div>
                                     <br />
                                     <div style="margin-left: 250px;">
                                        <!--<img src="http://194.250.42.70/BPGO/separator.png" width="450">-->
                                    </div>
                                <div style="width: 100%;text-align:center;">
                                    <p style="font-size: 18px;color: #0E3885;">L\'entrée ne sera autorisée que sur présentation de ce Pass d\'Entrée,valable pour : </p> 
                                    <p style="font-size: 22px;color: #06A6C1;"><strong style="text-transform: capitalize"> ' . $invite->getPrenom() . ' '. $invite->getNom(). ' </strong></p> 
                                    <p style="font-size: 18px;color: #0E3885;">Merci de le présenter lors de votre arrivée sous format papier ou digital et de vous munir d’une pièce d’identité.</p> 
                                </div>
                                <div style="width: 40%;text-align:left;margin-top: 30px;margin-left: 20px">
                                        <!--<img src="http://194.250.42.70/BPGO/LOGO_ACEF_Cotes_Armor_2.png" height="100" width="100">-->
                                    </div>
                                    <div style="width: 50%;position: relative;right: 20px;margin-top: -90px;">
                                    <div style="text-align: right;">
                                         <!--<img src="http://194.250.42.70/BPGO/BP_Grand_Ouest_D.png" height="100" width="200">-->
                                         </div>
                                    </div>
 
                    </div>
                    <p style="font-size: 12px;color: #ffffff;text-align: center">Banque Populaire Grand Ouest - 15, boulevard de la Boutière – CS 26858 – 35768 – Saint Grégoire Cedex – 857 500 227  RCS Rennes</p> 
                    <br/>
                </div>';
        }
        $html2pdf->writeHTML($html);
        return $html2pdf;
    }
}