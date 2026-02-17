<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div class="container">
        <div class="liste-ville">

            <?php foreach($liste as $row){?>
                <div class="ville card">
                    <div class="item-info"><span class="title"><?= $row['nom_ville']?></span></div>
                    <div class="item-actions"><a href="<?= BASE_URL ?>fiche-dons?id=<?php echo $row['id_ville']; ?>" class="button">Voir dons</a></div>
                </div>
            <?php }?>
        
        </div>
    </div>

</body>
</html>