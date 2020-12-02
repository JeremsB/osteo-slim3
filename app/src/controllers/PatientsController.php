<?php

namespace App\Controller;

use App\Dao\TypeSphereDao;
//use App\Tools\WsException;
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
        return json_encode($res);
    }

}
