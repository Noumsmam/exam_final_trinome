<?php
    namespace app\models;
    use Flight;

    class TypeArticle{
        private $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function save($typeArticleData){
            $stmt = $this->db->prepare(
                "INSERT INTO BNGRC_type_article (
                libelle_type_article
                ) VALUES (?)"
            );

            $stmt->execute([
                $typeArticleData['libelle_type_article']
            ]);
        }

        public function findById($id) {
            $stmt = $this->db->prepare("SELECT * FROM BNGRC_type_article WHERE id_type_article = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        public function updateTypeArticle($nouveauTypeArticle){
            $stmt = $this->db->prepare(
                "UPDATE BNGRC_type_article SET
                libelle_type_article = ?
                WHERE id_type_article = ?"
            );

            $stmt->execute([
                $nouveauTypeArticle['libelle_type_article'],
                $nouveauTypeArticle['id']
            ]);
        }

        public function deleteTypeArticle($id){
            $stmt = $this->db->prepare("DELETE FROM BNGRC_type_article WHERE id_type_article = ?");
            $stmt->execute([$id]);
        }

        public function findAll(){
            $stmt = $this->db->query("SELECT * FROM BNGRC_type_article");
            return $stmt->fetchAll();
        }
    }
?>