<?php

namespace App\Controller;

use App\Dao\PatientsDao;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;

final class PatientsController extends BaseController
{
    private $patientsDao;

    public function __construct(Container $c)
    {
        parent::__construct($c);
        $this->patientsDao = new patientsDao($this->em);
    }

    public function getPatients(Request $request, Response $response){
        $res = $this->patientsDao->getAll();
        return json_encode($res);
    }

}
