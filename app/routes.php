<?php
// Routes
$app->get('/', 'App\Controller\InviteController:dispatchInscriptionVierge')
    ->setName('home');
$app->get('/suivi', 'App\Controller\LoginController:dispatch')
    ->setName('login');
$app->post('/', 'App\Controller\LoginController:login')
    ->setName('checkLogin');
//$app->get('/pdf/{id}', 'App\Controller\ToolsController:dispatchPdf')->setName('pdf');
$app->get('/inscription/{id}', 'App\Controller\InviteController:dispatchInscriptionHash')->setName('inscription');
$app->get('/inscription', 'App\Controller\InviteController:dispatchInscriptionVierge')->setName('inscription');
$app->post('/inscription', 'App\Controller\InviteController:inscription')->setName('inscriptio');
$app->get('/testMailDoro', 'App\Controller\ToolsController:testMailDoro')->setName('testMailDoro');
$app->get('/testMailMagni', 'App\Controller\ToolsController:testMailMagni')->setName('testMailMagni');
$app->get('/testConfirme', 'App\Controller\ToolsController:testConfirme')->setName('testConfirme');
$app->get('/testRefus', 'App\Controller\ToolsController:testRefus')->setName('testRefus');
$app->get('/mail', 'App\Controller\ToolsController:mail')->setName('mail');
//$app->get('/hash', 'App\Controller\ToolsController:generateHash')->setName('hash');

$app->group('/secure', function () {
    $this->get('/invite', 'App\Controller\InviteController:invite')->setName('invite');
    $this->get('/participant', 'App\Controller\InviteController:participant')->setName('participant');
    $this->get('/refus', 'App\Controller\InviteController:refus')->setName('refus');
    $this->get('/invitesLien', 'App\Controller\InviteController:invitesLien')->setName('invitesLien');
    $this->get('/ajoutInvite', 'App\Controller\InviteController:dispatchAjoutInvite')->setName('ajoutInvite');
    $this->post('/ajoutInvite', 'App\Controller\InviteController:ajoutInvite')->setName('ajoutInvite');
    $this->get('/getInvite/{id}', 'App\Controller\InviteController:getInvite')->setName('getInvite');
    $this->get('/suppInvite/{id}', 'App\Controller\InviteController:suppInvite')->setName('suppInvite');
    $this->get('/logout', 'App\Controller\LogoutController:dispatch')->setName('logout');
})->add(new App\Middleware\GuestMiddleware($app->getContainer()));