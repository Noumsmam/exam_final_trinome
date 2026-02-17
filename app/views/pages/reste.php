<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="reste-container">
        <h2>Besoins restants</h2>
        <div class="liste-dispatch">
            <div class="dispatch-title">
                <div class="nom-ville">
                    <p>Nom de la ville</p>
                </div>
                <div class="dispatch-besoin">
                    <p>Besoin</p>
                </div>
                <div class="dispatch-qte">
                    <p>Quantité</p>
                </div>
                <div class="dispatch-date">
                    <p>Date</p>
                </div>
                <div class="dispatch-button">
                    <p>Achat</p>
                </div>
            </div>
            <?php foreach ($liste as $row) { ?>
                <div class="dispatch-card">
                    <div class="nom-ville">
                        <p><?php echo $row['nom_ville']; ?></p>
                    </div>
                    <div class="dispatch-besoin">
                        <p><?php echo $row['nom_article']; ?></p>
                    </div>
                    <div class="dispatch-qte">
                        <p><?php echo $row['quantite']; ?></p>
                    </div>
                    <div class="dispatch-date">
                        <p><?php echo $row['date_requete']; ?></p>
                    </div>
                    <div class="dispatch-button">
                        <a href=""><button>Acheter</button></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>