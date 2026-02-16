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
                <h1 class="title"><?= $fiche['nom_ville'] ?></h1>
            </div>

            <div class="creer-besoin card" style="margin-top:12px;">
                <form action="/save_don" method="post" style="display:flex;gap:8px;align-items:center;">
                    <select name="besoin" id="besoin" class="input">
                        <!-- boucle -->
                        <option value="0">Selectionner</option>
                        <?php foreach ($listeArticle as $row) { ?>
                            <option value="<?php echo $row['id_article']; ?>"><?php echo $row['nom_article']; ?></option>
                        <?php } ?>
                    </select>
                        <input type="hidden" value="<?php echo $fiche['id_ville']; ?>" name="id_ville">
                        <input type="number" name="qtn">
                    <button class="button" type="submit">Valider</button>
                </form>
            </div>

            <div class="liste-besoin" style="margin-top:18px;">
                <?php foreach($listeDon as $row) { ?>
                    <div class="besoin card">
                        <span class="title"><?php echo $row['nom_article']; ?></span>
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

</body>

</html>