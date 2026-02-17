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
                    <?php foreach ($liste as $row) { ?>
                        <option value="<?php echo $row['id_ville']; ?>"><?php echo $row['nom_ville']; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
        <div class="liste-achats">
            <div class="dispatch-title">
                <div class="nom-ville"><p>Item</p></div>
                <div class="dispatch-besoin"><p>Quantité</p></div>
                <div class="dispatch-qte"><p>Prix Unitaire</p></div>
                <div class="dispatch-date"><p>Total</p></div>
            </div>
            <div class="achats-card card">
                <p>Paracetamol</p>
                <p>50</p>
                <p>10000 Ar</p>
                <p>500000 Ar</p>
            </div>
            <div class="achats-card card">
                <p>Paracetamol</p>
                <p>50</p>
                <p>10000 Ar</p>
                <p>50000 Ar</p>
            </div>
            <div class="achats-card card">
                <p>Paracetamol</p>
                <p>50</p>
                <p>10000 Ar</p>
                <p>50000 Ar</p>
            </div>
            <div class="achats-card card">
                <p>Paracetamol</p>
                <p>50</p>
                <p>10000 Ar</p>
                <p>50000 Ar</p>
            </div>
        </div>
    </div>
</body>

</html>