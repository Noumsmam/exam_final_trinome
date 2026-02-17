<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="liste-besoin">
        <h2 style="margin: auto;">Liste de dons en stock</h2>
        <div class="liste-ville">
            <?php foreach ($stock as $row) { ?>

                <div class="besoin card">
                    <span class="title"><?php echo $row['nom_article'] ?></span>
                    <div class="item-mesure">
                        <p style="font-weight: bold;">Stock:</p>
                        <p> <?php echo $row['stock']; ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</body>

</html>