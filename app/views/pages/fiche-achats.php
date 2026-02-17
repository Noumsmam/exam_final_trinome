<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="filtre">
            <form action="" method="post">
                <p style="font-weight: bold">Ville:</p>
                <select class="input" name="ville" id="ville">
                    <option value="all">Toutes les villes</option>
                    <?php foreach ($listeVille as $row) { ?>
                        <option value="<?php echo $row['id_ville']; ?>"><?php echo $row['nom_ville']; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <div class="liste-achats">
            <div class="dispatch-title">
                <p>Ville</p>
                <p>Item</p>
                <p>Quantité</p>
                <p>Prix Unitaire</p>
                <p>Total</p>
            </div>
            <?php foreach($liste as $row) { ?>
                <div class="achats-card card">
                    <p><?php echo $row['nom_ville']; ?> </p>
                    <p><?php echo $row['nom_article']; ?></p>
                    <p><?php echo $row['quantite']; ?></p>
                    <p><?php echo $row['prix_unitaire']; ?></p>
                    <p><?php echo $row['prix_unitaire'] * $row['quantite']; ?></p>
                </div>
            <?php }  ?>
        </div>
    </div>
</body>

</html>