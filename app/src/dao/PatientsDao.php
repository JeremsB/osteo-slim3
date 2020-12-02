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

    public function getAll()
    {
        $types = $this->em->getRepository('App\Model\TypeSphere')->findAll();
        return $types;
    }
}