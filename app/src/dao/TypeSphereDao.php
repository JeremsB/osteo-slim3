<?php /** @noinspection ALL */

namespace App\Dao;


use App\Tools\WsException;
use Doctrine\DBAL\Driver\PDOConnection;
use Doctrine\ORM\EntityManager;
use Exception;
use App\Model\TypeSphere;


/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/07/19
 * Time: 10:02
 */
class TypeSphereDao
{
    private $em;
    private $logger;
    private $DAO = "AdresseChangeDao";

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        //$this->logger = $logger;
    }

    public function count($subscriberId)
    {
        $conn = $this->em->getConnection();
        $sql = 'select count(*) as count from ADRESSE_CHANGE where ABO_NUM = :ABO_NUM;';
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam('ABO_NUM', $subscriberId, PDOConnection::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetchAll();
            if (count($res) > 0)
                return $res[0]['count'];
            return null;
        } catch (Exception $exception) {
            $this->logger->err($exception);
            throw new WsException(50180);
        }
    }

    public function insert($aboNum, $adrChangeType, $adrChangeAnnuel)
    {
        $conn = $this->em->getConnection();
        $sql = 'insert into ADRESSE_CHANGE(ABO_NUM,ADRCHANGE_TYPE,ADRCHANGE_ANNUEL) values (:ABO_NUM,:ADRCHANGE_TYPE,:ADRCHANGE_ANNUEL)';
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam('ABO_NUM', $aboNum, PDOConnection::PARAM_INT);
            $stmt->bindParam('ADRCHANGE_TYPE', $adrChangeType, PDOConnection::PARAM_INT);
            $stmt->bindParam('ADRCHANGE_ANNUEL', $adrChangeAnnuel, PDOConnection::PARAM_STR);
            $stmt->execute();
        } catch (Exception $exception) {
            $this->logger->err($exception);
            throw new WsException(50181);
        }
    }

    public function getAll()
    {
        $types = $this->em->getRepository('App\Model\TypeSphere')->findAll();
        return $types;
    }
}