<?php
/**
 * Created by PhpStorm.
 * User: Nicolas Durand
 * Date: 23/04/2018
 * Time: 14:15
 */

namespace App\Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;
use App\Lib\Session;

final class LogoutController extends BaseController
{
    /*
     * Déconnexion
     */
    public function dispatch(Request $request, Response $response, $args)
    {
        Session::destroy('user');
        session_destroy();
        $this->view->render($response, 'login.twig');
        return $response->withRedirect($this->router->pathFor('login'));
    }
}