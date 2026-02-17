<?php

use app\controllers\ArticleController;
use app\controllers\DispatchController;
use app\controllers\RequeteController;
use app\controllers\VilleController;
use app\middlewares\SecurityHeadersMiddleware;
use app\models\Dispatch;
use app\models\Requete;
use app\models\TypeArticle;
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

    $router->get('/besoins', function () use ($renderPage) {
        $villeC = new VilleController();
        $liste = $villeC->getville();
        $renderPage('besoins', [
            'title' => 'Besoins',
            'liste' => $liste
        ]);
    });

    $router->get('/dons', function () use ($renderPage) {
        $villeC = new VilleController();
        $liste = $villeC->getville();
        $renderPage('dons', [
            'title' => 'Dons',
            'liste' => $liste
        ]);
    });

    $router->get('/reste', function () use ($renderPage) {
        $renderPage('reste', [
            'title' => 'Dashboard'
        ]);
    });

    $router->get('/fiche-besoins', function () use ($renderPage) {
        $id = $_GET['id'];
        $villeC = new VilleController();
        $fiche = $villeC->getVilleFiche($id);

        $articleC = new ArticleController();
        $liste = $articleC->getArtile();

        $besoin = new RequeteController();
        $listeBesoin = $besoin->getBesoinByVille($id);
        $renderPage('fiche-besoins', [
            'title' => 'Fiche besoin',
            'fiche' => $fiche,
            'listeArticle' => $liste,
            'listeBesoin' => $listeBesoin
        ]);
    });

    $router->get('/fiche-dons', function () use ($renderPage) {
        $id = $_GET['id'];
        $villeC = new VilleController();
        $fiche = $villeC->getVilleFiche($id);

        $articleC = new ArticleController();
        $liste = $articleC->getArtile();

        $don = new RequeteController();
        $listeDon = $don->getDonByVille($id);
        $renderPage('fiche-dons', [
            'title' => 'Fiche don',
            'fiche' => $fiche,
            'listeArticle' => $liste,
            'listeDon' => $listeDon
        ]);
    });

    $router->get('/creation-article', function () use ($renderPage) {
        $req = new TypeArticle(Flight::db());
        $liste_type = $req->findAll();
        $renderPage('creation-article', [
            'title' => 'Création article',
            'liste_type' => $liste_type
        ]);
    });

    $router->get('/stock', function () use ($renderPage) {
        $req = new Requete(Flight::db());
        $stock = $req->getDON();
        $renderPage('stock', [
            'title' => 'Stock',
            'stock' => $stock
        ]);
    });

    $router->get('/dispatch', function () use ($renderPage) {
        $req = new RequeteController();
        $liste = $req->getBesoinEnCours();
        $renderPage('dispatch', [
            'title' => 'dispatch',
            'liste' => $liste
        ]);
    });

    // Achats page (liste filtrable par ville via AJAX)
    $router->get('/achats', function () use ($renderPage) {
        $villeC = new VilleController();
        $liste = $villeC->getville();
        $renderPage('achats', [
            'title' => 'Besoins',
            'liste' => $liste
        ]);
    });

    $router->get('/fiche-achats', function () use ($renderPage) {
        $villeC = new VilleController();
        $liste = $villeC->getville();
        $renderPage('fiche-achats', [
            'title' => 'Fiche achats',
            'liste' => $liste
        ]);
    });

    // API endpoints for AJAX
    $router->get('/api/achats', [RequeteController::class, 'apiAchats']);
    $router->get('/api/recap', [RequeteController::class, 'apiRecap']);
    $router->post('/simulate_achat', [RequeteController::class, 'simulateAchat']);
    $router->post('/valider_achat', [RequeteController::class, 'validerAchat']);

    $router->post('/save_besoin', [RequeteController::class, 'saveBesoin']);

    $router->post('/save_don', [RequeteController::class, 'saveDon']);

    $router->get('/repartir', [DispatchController::class, 'repartir']);

    $router->post('/create-article', [RequeteController::class, 'createArticle']);

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
