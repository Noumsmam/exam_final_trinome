
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php foreach($liste as $row) { ?>
        <div class="liste-ville">
            <div class="ville">
                <p><?php echo $row['nom_ville']; ?></p>
                <a href="<?= BASE_URL ?>/fiche-besoins?id=<?php echo $row['id_ville']; ?>"><button>Voir besoins</button></a>
            </div>
        </div>
    <?php } ?>

</body>
</html>