
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="container">
        <div class="fiche">

        <div class="titre-ville">
            <h1><?php echo $fiche['nom_ville']; ?></h1>
        </div>
            <div class="creer-besoin card" style="margin-top:12px;">
                <form action="#" method="post" style="display:flex;gap:8px;align-items:center;">
                    <select name="besoin" id="besoin" class="input">
                        <!-- boucle -->
                        <option value="0">Selectionner</option>
                        <?php foreach ($listeArticle as $row) { ?>
                            <option value="<?php echo $row['id_article']; ?>"><?php echo $row['nom_article']; ?></option>
                        <?php } ?>
                    </select>
                    <button class="button" type="submit">Valider</button>
                </form>
            </div>

            <div class="liste-besoin">
                <div class="liste-ville" style="margin-top:18px;">
                    <?php foreach($listeBesoin as $row) { ?>
                        <div class="besoin card">
                            <span class="title"><?php echo $row['nom_article'] ?></span>
                            <div class="item-mesure">
                                <p style="font-weight: bold;">Qte:</p>
                                <p> <?php echo $row['quantite']; ?></p>
                                <p style="font-weight: bold">Date: </p>
                                <p><?php echo $row['date_requete']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>

</body>

</html>