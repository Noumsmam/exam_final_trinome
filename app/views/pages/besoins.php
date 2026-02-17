
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="liste-ville">
        <?php foreach ($liste as $row) { ?>
            <div class="ville card">
                <div class="item-info"><span class="title"><?php echo $row['nom_ville']; ?></span></div>
                <div class="item-actions"><a href="<?= BASE_URL ?>fiche-besoins?id=<?php echo $row['id_ville']; ?>" class="button">Voir besoins</a></div>
            </div>
        <?php } ?>
    </div>

</body>

</html>