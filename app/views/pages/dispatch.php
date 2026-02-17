<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribution des dons</title>
</head>

<body>
    <div class="dispatch-container">
        <div class="dispatch-header">
            <h1>Distribution des dons</h1>
            <a href="/repartir"><button>Dispatcher</button></a>
        </div>

        <div class="liste-dispatch">
            <div class="dispatch-title">
                <div class="nom-ville"><p>Nom de la ville</p></div>
                <div class="dispatch-besoin"><p>Besoin</p></div>
                <div class="dispatch-qte"><p>Quantité</p></div>
                <div class="dispatch-date"><p>Date</p></div>
            </div>
            <?php foreach($liste as $row) { ?>
                <div class="dispatch-card">
                    <div class="nom-ville"><p><?php echo $row['nom_ville']; ?></p></div>
                    <div class="dispatch-besoin"><p><?php echo $row['nom_article']; ?></p></div>
                    <div class="dispatch-qte"><p><?php echo $row['quantite']; ?></p></div>
                    <div class="dispatch-date"><p><?php echo $row['date_requete']; ?></p></div>
                </div>
           <?php } ?>
        </div>
    </div>

</body>

</html>