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

        // API for AJAX: return besoins for a ville (HTML fragment)
        public function apiAchats() {
            $id_ville = $_GET['ville'] ?? null;
            $requete = new Requete(Flight::db());
            if ($id_ville) {
                $liste = $requete->findAllRequeteBesoinbyidVille($id_ville);
            } else {
                $liste = $requete->findAll();
            }

            // Render a minimal fragment
            foreach ($liste as $row) {
                $montant = $row['prix_unitaire'] * $row['quantite'];
                echo "<div class=\"besoin card\">";
                echo "<div><strong>".htmlspecialchars($row['nom_article'])."</strong></div>";
                echo "<div>Quantité: ".htmlspecialchars($row['quantite'])."</div>";
                echo "<div>Montant: ".number_format($montant,2,',',' ')."</div>";
                echo "<div><button class=\"simulate\" data-montant=\"$montant\">Simuler</button></div>";
                echo "</div>";
            }
        }

        // API recap returns JSON totals
        public function apiRecap() {
            $requete = new Requete(Flight::db());
            $totals = $requete->getTotals();
            header('Content-Type: application/json');
            echo json_encode($totals);
        }

        // Simulate an achat: returns cost with fee
        public function simulateAchat() {
            $montant = floatval($_POST['montant'] ?? 0);
            $config = Flight::get('config') ?? [];
            $feePercent = $config['purchase_fee_percent'] ?? 10;
            $total = $montant * (1 + $feePercent / 100.0);
            header('Content-Type: application/json');
            echo json_encode(['montant' => $montant, 'fee_percent' => $feePercent, 'total' => $total]);
        }

        // Validate achat (placeholder: real dispatch algorithm not implemented)
        public function validerAchat() {
            // For now just return success — real dispatch should consume 'don argent' and create/update dispatch records
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Achat validé (simulation).']);
        }

        public function createArticle(){
            $req = new Article(Flight::db());
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