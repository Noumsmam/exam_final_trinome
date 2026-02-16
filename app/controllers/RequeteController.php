<?php
    namespace app\controllers;

use app\models\Article;
use app\models\Requete;
    use flight\Engine;
    use Flight;
    class RequeteController {
        protected Engine $app;


        public function __construct() {

        }

        public function getDonByVille($id) {
            $requete = new Requete(Flight::db());
            $liste = $requete->findDonsByVille($id);
            return $liste;
        }

        public function getBesoinByVille($id) {
            $requete = new Requete(Flight::db());
            $liste = $requete->findAllRequeteBesoinbyidVille($id);
            return $liste;
        }

        public function saveBesoin() {
            $id_ville = $_POST['id_ville'] ;
            $id_article = $_POST['besoin'] ?? '';
            $qtn = $_POST['qtn'] ?? '';

            $article = new Article(Flight::db());
            $articleData = $article->findById($id_article);
            $prixU = $articleData['prix_unitaire'];
            $montant = $prixU * $qtn;

            $requete = new Requete(Flight::db());
            $requete->saveBesoin($id_ville,$qtn,$id_article,$montant);
            Flight::redirect('/fiche-besoins?id='.$id_ville);
        }

        public function saveDon() {
            $id_ville = $_POST['id_ville'] ;
            $id_article = $_POST['besoin'] ?? '';
            $qtn = $_POST['qtn'] ?? '';

            $article = new Article(Flight::db());
            $articleData = $article->findById($id_article);
            $prixU = $articleData['prix_unitaire'];
            $montant = $prixU * $qtn;

            $requete = new Requete(Flight::db());
            $requete->saveDon($id_ville,$qtn,$id_article,$montant);
            Flight::redirect('/fiche-dons?id='.$id_ville);
        }
    }
?>