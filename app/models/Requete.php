<?php
    namespace app\models;
    use Flight;

    class Requete{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($requeteData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_requete (
                id_ville,
                id_article,
                quantite,
                montant_total,
                date_requete,
                etat
                ) VALUES (?, ?, ?, ?, ?, ?)"
            );

            $stmt->execute([
                $requeteData['id_ville'],
                $requeteData['id_article'],
                $requeteData['quantite'],
                $requeteData['montant_total'],
                $requeteData['date_requete'],
                $requeteData['etat']
            ]);
        }

        public function findById($id) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_requete WHERE id_requete = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        public function updateRequete($nouveauRequete){
            $stmt = $this->db->prepare(
                "UPDATE BNGRC_requete SET
                id_ville = ?,
                id_article = ?,
                quantite = ?,
                montant_total = ?,
                date_requete = ?,
                etat = ?
                WHERE id_requete = ?"
            );

            $stmt->execute([
                $nouveauRequete['id_ville'],
                $nouveauRequete['id_article'],
                $nouveauRequete['quantite'],
                $nouveauRequete['montant_total'],
                $nouveauRequete['date_requete'],
                $nouveauRequete['etat'],
                $nouveauRequete['id']
            ]);
        }

        public function deleteRequete($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_requete WHERE id_requete = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_requete");
            return $stmt->fetchAll();
        }

       public function findDonsByVille($id_ville){
            $stmt = $this->db->prepare("SELECT BNGRC_article.nom_article,BNGRC_article.prix_unitaire,BNGRC_requete.quantite,BNGRC_requete.date_requete 
            FROM BNGRC_requete  JOIN BNGRC_ville ON BNGRC_requete.id_ville = BNGRC_ville.id_ville JOIN BNGRC_article ON BNGRC_article.id_article = BNGRC_requete.id_article WHERE BNGRC_requete.etat = 'DON' AND BNGRC_requete.id_ville = ? ");
            $stmt->execute([$id_ville]);
            return $stmt->fetchAll();
        }

        public function findAllRequeteBesoinbyidVille($id) {
            $stmt = $this->db->prepare("SELECT BNGRC_article.nom_article,BNGRC_article.prix_unitaire,BNGRC_requete.quantite,BNGRC_requete.date_requete 
            FROM BNGRC_requete  JOIN BNGRC_ville ON BNGRC_requete.id_ville = BNGRC_ville.id_ville JOIN BNGRC_article ON BNGRC_article.id_article = BNGRC_requete.id_article WHERE BNGRC_requete.etat = 'BESOIN' AND BNGRC_requete.id_ville = ? ");
            $stmt->execute([$id]);
            return $stmt->fetchAll();
        }

        public function saveBesoin($id_ville,$qtn,$id_article,$montant) { 
            $stmt = $this->db->prepare("INSERT INTO BNGRC_requete(id_ville,id_article,quantite,montant_total,date_requete,etat,statut) VALUES (?,?,?,?,CURDATE(),'BESOIN','en cours') ");
            $stmt->execute([$id_ville,$id_article,$qtn,$montant]);
        }

        public function saveDon($id_ville,$qtn,$id_article,$montant) { 
            $stmt = $this->db->prepare("INSERT INTO BNGRC_requete(id_ville,id_article,quantite,montant_total,date_requete,etat,statut) VALUES (?,?,?,?,CURDATE(),'DON','fini') ");
            $stmt->execute([$id_ville,$id_article,$qtn,$montant]);
        }

        public function getBesoinEnCours() {
            $stmt = $this->db->query("SELECT BNGRC_requete.id_requete,BNGRC_requete.quantite,BNGRC_requete.id_ville,BNGRC_ville.nom_ville,BNGRC_requete.date_requete,BNGRC_article.nom_article
            FROM BNGRC_requete JOIN BNGRC_article ON BNGRC_requete.id_article = BNGRC_article.id_article JOIN 
            BNGRC_ville ON BNGRC_requete.id_ville = BNGRC_ville.id_ville WHERE BNGRC_requete.statut = 'en cours' AND BNGRC_requete.etat = 'BESOIN'");
            return $stmt->fetchAll();
        }

        public function getDON()  {
            $stmt= $this->db->query("SELECT BNGRC_requete.id_requete,BNGRC_requete.quantite,BNGRC_requete.id_ville,BNGRC_ville.nom_ville,BNGRC_requete.date_requete,BNGRC_article.nom_article,SUM(BNGRC_requete.quantite) AS stock
            FROM BNGRC_requete JOIN BNGRC_article ON BNGRC_requete.id_article = BNGRC_article.id_article JOIN  BNGRC_ville ON BNGRC_requete.id_ville = BNGRC_ville.id_ville WHERE BNGRC_requete.etat = 'DON' ORDER BY BNGRC_requete.date_requete GROUP BY BNGRC_article.nom_article");
            return $stmt->fetchAll();
        }     
        public function sumQuantiteByArticle() {
            $stmt = $this->db->query("SELECT BNGRC_article.id_article, BNGRC_article.nom_article, SUM(BNGRC_requete.quantite) AS total_quantite 
            FROM BNGRC_requete 
            JOIN BNGRC_article ON BNGRC_requete.id_article = BNGRC_article.id_article WHERE BNGRC_requete.etat = 'DON' 
            GROUP BY BNGRC_article.id_article, BNGRC_article.nom_article
            ORDER BY BNGRC_requete.date_requete ");
            return $stmt->fetchAll();
        }

        public function uptdateQuantite($qtn,$id) {
            $stmt = $this->db->prepare("UPDATE BNGRC_requete SET quantite = ? WHERE id_requete = ? ");
            $stmt->execute([$qtn,$id]);
        }

        public function getAllDons() {
            $stmt = $this->db->query("SELECT BNGRC_requete.id_requete, BNGRC_requete.quantite, BNGRC_requete.id_article, BNGRC_article.nom_article, BNGRC_requete.date_requete
            FROM BNGRC_requete
            JOIN BNGRC_article ON BNGRC_requete.id_article = BNGRC_article.id_article
            WHERE BNGRC_requete.etat = 'DON'
            ORDER BY BNGRC_requete.date_requete");
            return $stmt->fetchAll();
        }
    }
        

        

    
?>