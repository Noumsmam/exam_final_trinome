-- Création d'une vue pour afficher les détails des requêtes : nom de la ville, nom de l'article, quantité et date
CREATE OR REPLACE VIEW vue_requetes_details AS
SELECT
    r.id_requete,
    r.id_ville,
    r.id_article,
    v.nom_ville,
    a.nom_article,
    r.quantite,
    r.montant_total,
    r.date_requete,
    r.etat
FROM
    BNGRC_requete r
JOIN
    BNGRC_ville v ON r.id_ville = v.id_ville
JOIN
    BNGRC_article a ON r.id_article = a.id_article;
