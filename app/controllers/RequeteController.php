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

        public function getBesoinEnCours() {
            $req = new Requete(Flight::db());
            $liste = $req->getBesoinEnCours();
            return $liste;
        } 

        public function createArticle(){
            $req = new Article((Flight::db()));
            $requeteData = [
                'nom_article' => $_POST['nom'],
                'prix_unitaire' => $_POST['prix'],
                'id_type_article' => $_POST['type']
            ];
            $req->save($requeteData);
            Flight::redirect('/creation-article?num=1');
        }

    }
?>