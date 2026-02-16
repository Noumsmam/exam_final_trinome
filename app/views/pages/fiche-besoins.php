
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div class="fiche">

        <div class="titre-ville">
            <h1><?php echo $fiche['nom_ville']; ?></h1>
        </div>

        <div class="creer-besoin">
            <form action="#" method="post">
                <select name="besoin" id="besoin">
                    <!-- boucle -->
                    <option value="0">Selectionner</option>
                    <?php  foreach($listeArticle as $row) { ?>
                        <option value="<?php echo $row['id_article']; ?>"><?php echo $row['nom_article']; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Valider">
            </form>
        </div>

        <div class="liste-besoin">
            <div class="liste-ville">

            </div>
        </div>

    </div>

</body>
</html>