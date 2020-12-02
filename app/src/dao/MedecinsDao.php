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
class ConsultationsDao
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        $consultations = $this->em->getRepository('App\Model\Consultations')->findAll();
        return $consultations;
    }
}