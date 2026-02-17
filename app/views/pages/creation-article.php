<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="creer-besoin2">
        <form action="/create-article" method="post" class="card">

            <label for="nom">Nom du besoin</label>
            <input type="text" name="nom" id="nom" required>

            <label for="prix">Prix Unitaire</label>
            <input class="input" type="number" name="prix" id="prix" min="1" required>

            <label for="type">Unité</label>
            <select name="type" id="type" required>

                <?php foreach ($liste_type as $row) {
                ?>
                    <option value="<?php echo $row['id_type_article']; ?>"><?php echo $row['libelle_type_article']; ?></option>
                <?php
                } ?>

                <!-- <option value="litre">Litre</option>
                <option value="kilo">Kilo</option>
                <option value="unite">Unité</option>
                <option value="metre">Mètre</option> -->
            </select>

            <?php if(isset($_GET['num']) && $_GET['num'] == 1) { 
                ?><p style="color: green;">Création éffectuée</p><?php
            } ?>

            <button type="submit" class="button">Créer l'article'</button>

        </form>
    </div>

</body>

</html>