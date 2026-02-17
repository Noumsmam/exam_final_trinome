
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
                    <div class="besoin card">
                        <span class="title">Katsaka</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 200kg</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                    <div class="besoin card">
                        <span class="title">Vary</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 400kg</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                    <div class="besoin card">
                        <span class="title">Ronono</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 50l</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                    <div class="besoin card">
                        <span class="title">Tole</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 400m</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                    <div class="besoin card">
                        <span class="title">Planche</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 250</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                    <div class="besoin card">
                        <span class="title">Akanjo</span>
                        <div class="item-mesure">
                            <p style="font-weight: bold;">Qte:</p>
                            <p> 2 bal</p>
                            <p style="font-weight: bold">Date: </p>
                            <p>12/01/26</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>