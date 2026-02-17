CREATE OR REPLACE VIEW vue_dons AS 
SELECT r.id_requete, r.id_ville, r.id_article, r.quantite, r.montant_total, r.date_requete, r.etat, a.nom_article
FROM BNGRC_requete r
JOIN BNGRC_article a ON r.id_article = a.id_article
WHERE r.etat = 'DON';