<?php

namespace App\Controller;

use App\Dao\AdresseDao;
use App\Dao\CustomerDao;
use App\Dao\DetailIndividuDao;
use App\Dao\IdentWebDao;
use App\Dao\IndividuDao;
use App\Dao\NewsletterDao;
use App\Dao\OrigineIndivDao;
use App\Dao\TypeSphereDao;
use App\Dao\UnipaysDao;
use App\Tools\WsException;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

final class TypeSphereController extends BaseController
{
    private $typeSphereDao;

    public function __construct(Container $c)
    {
        parent::__construct($c);
        $this->typeSphereDao = new TypeSphereDao($this->em);
    }

    public function getTypesSpheres(Request $request, Response $response){
        $res = $this->typeSphereDao->getAll();
        $response = $response->withJson($res)->withStatus(200);
        return $response;
    }

    public function infoFromName(Request $request, Response $response)
    {
        $params = $request->getQueryParams();
        $subscriberId = isset($params['subscriberId']) ? $params['subscriberId'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        try {
            if (!(isset($subscriberId) && isset ($lastName) && isset ($codeStore)))
                throw new WsException(40000);
            if (!is_numeric($subscriberId))
                throw new WsException(40005);
            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            $res = $this->customerDao->infoFromName($editNum, $subscriberId, $lastName);
            if ($res == null)
                throw new WsException(40400);

            $newsletterOpt = $this->newsletterDao->getWithIndivNumAndOut($subscriberId);
            if (count($newsletterOpt) > 0) {
                $res[0]['aboNewsLetter'] = "1";
            } else {
                $res[0]['aboNewsLetter'] = "0";
            }
            $response = $response->withJson($res)->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    public function infoFromAddress(Request $request, Response $response)
    {
        $params = $request->getQueryParams();

        $firstName = isset($params['firstName']) ? $params['firstName'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;
        $city = isset($params['city']) ? $params['city'] : null;
        $postCode = isset($params['postCode']) ? $params['postCode'] : null;
        $country = isset($params['country']) ? $params['country'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        try {
            if (!(isset($firstName) && isset ($lastName) && isset($city) && isset($postCode) && isset($country) && isset ($codeStore)))
                throw new WsException(40000);
            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            $res = $this->customerDao->infoFromAddress($editNum, $lastName, $firstName, $postCode, $city, $country);
            if ($res == null)
                throw new WsException(40400);
            if (count($res) > 1)
                throw new WsException(40006);
            $response = $response->withJson($res)->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            //Exception inconnu
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    public function createRecipient(Request $request, Response $response, $args)

    {
        $params = $request->getParsedBody();

        $firstName = isset($params['firstName']) ? $params['firstName'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;
        $street = isset($params['street']) ? $params['street'] : null;
        $city = isset($params['city']) ? $params['city'] : null;
        $postCode = isset($params['postCode']) ? $params['postCode'] : null;
        $country = isset($params['country']) ? $params['country'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;

        $prefix = isset($params['prefix']) ? $params['prefix'] : '';
        $aboNewsLetter = isset($params['aboNewsLetter']) ? $params['aboNewsLetter'] : '';
        $company = isset($params['company']) ? $params['company'] : '';
        $tel = isset($params['phone']) ? $params['phone'] : '';
        $fax = isset($params['fax']) ? $params['fax'] : '';
        $region = isset($params['region']) ? $params['region'] : '';
        $optin = isset($params['optin']) ? $params['optin'] : '';
        $birthDay = isset($params['birthDay']) ? $params['birthDay'] : '';
        $mail = isset($params['mail']) ? $params['mail'] : '';
        try {
            if (!(isset($prefix) && isset($firstName) && isset($lastName) && isset($aboNewsLetter)
                && isset($company) && isset($tel) && isset($fax) && isset($mail) && isset($street) && isset($city) && isset($postCode) && isset($region)
                && isset($country) && isset($optin) && isset($birthDay) && isset($codeStore)))
                throw new WsException(40000);

            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);

            /* Formatage des paramètres */
            $adr1 = isset($street[0]) ? $street[0] : "";
            $adr2 = isset($street[1]) ? $street[1] : "";
            $adr3 = isset($street[2]) ? $street[2] : "";
            $nfsweb = $aboNewsLetter == true ? "0" : "1";
            $nfspapier = $optin == true ? "0" : "1";
            list($jj, $mm, $aaaa) = $this->explodeDate($birthDay, $editNum);


            $country = $this->unipaysDao->getWithCode($country);
            if ($country == null)
                throw new WsException(40014);
            // L'individu n'existe pas
            /* on cherche le code origine de l adresse  */
            $origine = $this->origineIndivDao->getWithEditNum($editNum);
            if (empty($origine) || $origine == null)
                throw  new WsException(40009);

            $orinum = $origine["ORI_NUM"];
            list($usec, $sec) = explode(" ", microtime());
            $current_timestamp = (date('dmy') . substr($sec, -5) . substr($usec, 2, strlen($usec) - 2));
            $this->individuDao->insert($editNum, $orinum, $nfspapier, $current_timestamp);
            $individu = $this->individuDao->getWithExnum($current_timestamp);
            if (empty($individu) || $individu == null)
                throw new WsException(40010);
            if (count($individu) != 1)
                throw new WsException(40010);

            $indivNum = $individu[0]['customerId'];
            list($prefix, $firstName, $lastName, $company, $numLet, $adr1, $adr2, $adr3, $city, $region, $postCode, $country) =
                $this->adresseDao->structureAdresse($editNum, $prefix, $firstName, $lastName, $company, $adr1, $adr2, $adr3, $city, $region, $postCode, $country);
            $this->adresseDao->insert($indivNum, $prefix, $firstName, $lastName, $mail, $tel, $company, $numLet, $adr1, $adr2, $adr3, $city, $region, $postCode, $country, $fax, $nfsweb);
            $this->detailIndividuDao->insert($indivNum, $jj, $mm, $aaaa);
            $response = $response->withJson($individu)->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            //Exception inconnu
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    private function explodeDate($birthDay, $editNum)
    {
        $dob_piece = explode("/", $birthDay);
        if (count($dob_piece) !== 3) {
            $jj = "";
            $mm = "";
            $aaaa = "";
        } else {
            if ($editNum == 1 || $editNum == 2) {
                $jj = sprintf("%02d", $dob_piece[1]);
                $mm = sprintf("%02d", $dob_piece[0]);
                $aaaa = $dob_piece[2];
            } else {
                $jj = sprintf("%02d", $dob_piece[0]);
                $mm = sprintf("%02d", $dob_piece[1]);
                $aaaa = $dob_piece[2];
            }
        }
        return [$jj, $mm, $aaaa];
    }

    public function infoFromId(Request $request, Response $response)
    {
        $params = $request->getQueryParams();
        $subscriberId = isset($params['subscriberId']) ? $params['subscriberId'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        try {
            if (!(isset($subscriberId) && isset ($codeStore)))
                throw new WsException(40000);
            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            $res = $this->adresseDao->formatAdresseV2($subscriberId, $editNum);
            if ($res == null)
                throw new WsException(40400);
            if (count($res) > 1)
                throw new WsException(40006);
            $response = $response->withJson($res)->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            //Exception inconnu
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    public function editAddress(Request $request, Response $response)
    {

        $params = $request->getParsedBody();

        $prefix = isset($params['prefix']) ? $params['prefix'] : null;
        $firstName = isset($params['firstName']) ? $params['firstName'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;
        $company = isset($params['company']) ? $params['company'] : null;
        $telephone = isset($params['phone']) ? $params['phone'] : null;
        $street = isset($params['street']) ? $params['street'] : null;
        $city = isset($params['city']) ? $params['city'] : null;
        $postCode = isset($params['postCode']) ? $params['postCode'] : null;
        $region = isset($params['region']) ? $params['region'] : null;
        $country = isset($params['country']) ? $params['country'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        $subscriberId = isset($params['subscriberId']) ? $params['subscriberId'] : null;
        try {
            if (!(isset($subscriberId) && isset($prefix) && isset($firstName) && isset($lastName)
                && isset($company) && isset($street) && isset($city) && isset($postCode)
                && isset($country) && isset($codeStore)))
                throw new WsException(40000);

            /* Formatage des paramètres */
            $adr1 = isset($street[0]) ? $street[0] : "";
            $adr2 = isset($street[1]) ? $street[1] : "";
            $adr3 = isset($street[2]) ? $street[2] : "";

            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            $country = $this->unipaysDao->getWithCode($country);
            if ($country == null)
                throw new WsException(40014);
            $indivAdresse = $this->adresseDao->getWithIndivNum($subscriberId);
            if (empty($indivAdresse))
                throw new WsException(40400);

            list($prefix, $firstName, $lastName, $company, $numLet, $adr1, $adr2, $adr3, $city, $region, $postCode, $country) =
                $this->adresseDao->structureAdresse($editNum, $prefix, $firstName, $lastName, $company, $adr1, $adr2, $adr3, $city, $region, $postCode, $country);
            $this->adresseDao->update($prefix, $firstName, $lastName, null, $telephone, $company, $numLet, $adr1, $adr2, $adr3, $city, $region, $postCode, $country, null, $subscriberId);
            $response = $response->withJson(array(array('customerId' => $subscriberId)))->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    public function editInformation(Request $request, Response $response)
    {
        $params = $request->getParsedBody();


        $prefix = isset($params['prefix']) ? $params['prefix'] : null;
        $firstName = isset($params['firstName']) ? $params['firstName'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;

        $actualPassword = isset($params['actualPassword']) ? $params['actualPassword'] : null;
        $password = isset($params['password']) ? $params['password'] : null;
        $mail = isset($params['mail']) ? $params['mail'] : null;

        $birthDay = isset($params['birthDay']) ? $params['birthDay'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        $subscriberId = isset($params['subscriberId']) ? $params['subscriberId'] : null;
        try {
            if (!(isset($prefix) && isset($firstName) && isset($lastName) && isset($birthDay) && isset($codeStore) && isset($subscriberId)))
                throw new WsException(40000);
            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            list($jj, $mm, $aaaa) = $this->explodeDate($birthDay, $editNum);

            $indivAdresse = $this->adresseDao->getWithIndivNum($subscriberId);
            if (empty($indivAdresse))
                throw new WsException(40400);

            //Changement de mail
            if (isset($mail)) {
                $identWeb = $this->identWebDao->getWithIndivNum($subscriberId);
                if (empty($identWeb))
                    throw new WsException(40021);

                //Test si il n'existe pas déjà un compte avec email
                if (!empty($this->identWebDao->getWithEditNumAndMail($editNum, $mail)) || !empty($this->adresseDao->getWithEditNumAndMail($editNum, $mail))) {
                    throw new WsException(40020);
                }
                //On met a jour le mot de passe également
                if (isset($password)) {
                    $this->identWebDao->update($subscriberId, $mail, $password);
                    //Ou juste l'email
                } else {
                    $this->identWebDao->updateEmail($subscriberId, $mail);
                }
                //On change juste le mot de passe
            } elseif (isset($password) && isset($actualPassword)) {
                $identWeb = $this->identWebDao->getWithIndivNumAndPassword($subscriberId, $actualPassword);
                if (empty($identWeb))
                    throw new WsException(40021);
                $this->identWebDao->updatePassword($editNum,$subscriberId, $password);
            }
            $this->adresseDao->updateAccountInformation($prefix, $firstName, $lastName, $subscriberId, $mail);
            $detailIndividu = $this->detailIndividuDao->getWithIndivNum($subscriberId);
            if (count($detailIndividu) > 0) {
                if (count($detailIndividu) > 1)
                    throw new WsException(40013);
                $this->detailIndividuDao->update($subscriberId, $jj, $mm, $aaaa);
            } else
                $this->detailIndividuDao->insert($subscriberId, $jj, $mm, $aaaa);
            $response = $response->withJson(array(array('customerId' => $subscriberId)))->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            //Exception inconnu
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

    public function testStructureAdress(Request $request, Response $response)
    {

        $params = $request->getParsedBody();

        $prefix = isset($params['prefix']) ? $params['prefix'] : null;
        $firstName = isset($params['firstName']) ? $params['firstName'] : null;
        $lastName = isset($params['lastName']) ? $params['lastName'] : null;
        $company = isset($params['company']) ? $params['company'] : null;
        $telephone = isset($params['phone']) ? $params['phone'] : null;
        $street = isset($params['street']) ? $params['street'] : null;
        $city = isset($params['city']) ? $params['city'] : null;
        $postCode = isset($params['postCode']) ? $params['postCode'] : null;
        $region = isset($params['region']) ? $params['region'] : null;
        $country = isset($params['country']) ? $params['country'] : null;
        $codeStore = isset($params['codeStore']) ? $params['codeStore'] : null;
        $subscriberId = isset($params['subscriberId']) ? $params['subscriberId'] : null;
        try {
            if (!(isset($subscriberId) && isset($prefix) && isset($firstName) && isset($lastName)
                && isset($company) && isset($street) && isset($city) && isset($postCode)
                && isset($country) && isset($codeStore)))
                throw new WsException(40000);

            /* Formatage des paramètres */
            $adr1 = isset($street[0]) ? $street[0] : "";
            $adr2 = isset($street[1]) ? $street[1] : "";
            $adr3 = isset($street[2]) ? $street[2] : "";

            $editNum = EDITNUMS[strtolower($codeStore)];
            if (!is_numeric($editNum))
                throw new WsException(40003);
            $country = $this->unipaysDao->getWithCode($country);
            if ($country == null)
                throw new WsException(40014);

            $returnData = $this->adresseDao->structureAdresse($editNum, $prefix, $firstName, $lastName, $company, $adr1, $adr2, $adr3, $city, $region, $postCode, $country);
            $response = $response->withJson($returnData)->withStatus(200);
        } catch (WsException $wsException) {
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
        } catch (Exception $exception) {
            $wsException = new WsException(50000);
            $response = $response->withJson(array("status" => $wsException->getCode(), "message" => $wsException->getMessage(), "exception" => $wsException->getException()))->withStatus($wsException->getHttpCode());
            $this->logger->err($exception);
        }
        return $response;
    }

}
