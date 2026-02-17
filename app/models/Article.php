<?php
    namespace app\models;
    use Flight;

    class Article{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($articleData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_article (
                nom_article,
                prix_unitaire,
                id_type_article
                ) VALUES (?, ?, ?)"
            );

            $stmt->execute([
                $articleData['nom_article'],
                $articleData['prix_unitaire'],
                $articleData['id_type_article']
            ]);
        }

        public function findById($id) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_article WHERE id_article = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        public function updateArticle($nouveauArticle){
            $stmt = $this->db->prepare(
                "UPDATE BNGRC_article SET
                nom_article = ?,
                prix_unitaire = ?,
                id_type_article = ?
                WHERE id_article = ?"
            );

            $stmt->execute([
                $nouveauArticle['nom_article'],
                $nouveauArticle['prix_unitaire'],
                $nouveauArticle['id_type_article'],
                $nouveauArticle['id']
            ]);
        }

        public function deleteArticle($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_article WHERE id_article = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_article");
            return $stmt->fetchAll();
        }

        
    }
?>