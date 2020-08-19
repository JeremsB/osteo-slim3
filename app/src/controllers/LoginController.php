<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 10:10
 */

namespace App\Controller;

use App\Lib\Session;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;
use App\Dao\UtilisateurDao;

class LoginController extends BaseController
{
    private $userDao;

    public function __construct(Container  $c)
    {
        parent::__construct($c);
        $this->userDao = new UtilisateurDao($this->em);
    }
    public function login(Request $request, Response $response, $args)
    {
        $array = $request->getParsedBody();
        $array['password'] = hash('whirlpool',$array['password']);
        $user = $this->userDao->getUser($array['login'], $array['password']);
        if (isset($user)) {
            Session::set('user', $user);
            $this->view['test'] = true;
            return $response->withRedirect($this->router->pathFor('invite'));
        } else {
            $this->view->render($response, 'login.twig',['message' => 'Erreur d\'identification, veuillez réessayer.']);
        }
        return $response;
    }
    public function dispatch(Request $request, Response $response, $args)
    {
        Session::destroy('user');
        $this->view->render($response, 'login.twig');
        return $response;
    }

    public function dispatch404(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'bad_hash.twig');
        return $response;
    }
}
