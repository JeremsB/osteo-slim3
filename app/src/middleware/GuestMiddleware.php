<?php
namespace App\Middleware;

use Psr\Container\ContainerInterface;
use App\Lib\Session;

class GuestMiddleware
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function __invoke($request, $response, $next)
    {
        $router = $this->container['router'];
        if(!Session::exists('user')) {
            return $response->withRedirect($router->pathFor('login'));
        }
        $response = $next($request, $response);
        return $response;
    }
}