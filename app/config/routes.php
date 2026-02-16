<?php

use app\controllers\ArticleController;
use app\controllers\Villecontroller;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

    $renderPage = function (string $view, array $data = []) use ($app) {
        // Génère le contenu de la page
        $content = $app->view()->fetch('pages/' . $view . '.php', $data);

        // Affiche le layout en injectant le contenu
        $app->render('layout.php', array_merge($data, [
            'content' => $content
        ]));
    };

    $router->get('/', function () use ($renderPage) {
        $renderPage('dashboard', [
            'title' => 'Dashboard'
            
        ]);
    });

	$router->get('/besoins', function() use ($renderPage) {
        $villeC = new Villecontroller();
        $liste = $villeC->getville();
        $renderPage('besoins', [
            'title' => 'Besoins',
            'liste' => $liste
        ]);
    });

    $router->get('/dons', function () use ($renderPage) {
        $renderPage('dons', [
            'title' => 'Dons'
        ]);
    });

    $router->get('/reste', function () use ($renderPage) {
        $renderPage('reste', [
            'title' => 'Dashboard'
        ]);
    });

    $router->get('/fiche-besoins', function() use ($renderPage) {
        $id = $_GET['id'];
        $villeC = new VilleController();
        $fiche = $villeC->getVilleFiche($id);

        $articleC = new Articlecontroller();
        $liste = $articleC->getArtile();
        $renderPage('fiche-besoins', [
            'title' => 'Fiche besoin',
            'fiche' => $fiche,
            'listeArticle' => $liste
        ]);
    });

    $router->get('/fiche-dons', function () use ($renderPage) {
        $renderPage('fiche-dons', [
            'title' => 'Fiche don'
        ]);
    });

    $router->get('/creation-besoin', function () use ($renderPage) {
        $renderPage('creation-besoin', [
            'title' => 'Création besoin'
        ]);
    });

    $router->get('/creation-don', function () use ($renderPage) {
        $renderPage('creation-don', [
            'title' => 'Création don'
        ]);
    });

    $router->get('/dispatch', function () use ($renderPage) {
        $renderPage('Dispatch', [
            'title' => 'Dispatch'
        ]);
    });


    // $router->get('/', function() use ($app) {
    // 	$app->render('welcome', [ 'message' => 'You are gonna do great things!' ]);
    // });

    // $router->get('/hello-world/@name', function($name) {
    // 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
    // });

    // $router->group('/api', function() use ($router) {
    // 	$router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
    // 	$router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
    // 	$router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
    // });

}, [SecurityHeadersMiddleware::class]);
