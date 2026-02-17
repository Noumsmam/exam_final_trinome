<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="creer-besoin2">
        <form action="" method="post" class="card">

            <label for="nom">Nom du don</label>
            <input type="text" name="nom" id="nom" required>

            <label for="quantite">Quantité</label>
            <input class="input" type="number" name="quantite" id="quantite" min="1" required>

            <label for="type">Unité</label>
            <select name="type" id="type" required>
                <option value="litre">Litre</option>
                <option value="kilo">Kilo</option>
                <option value="unite">Unité</option>
                <option value="metre">Mètre</option>
            </select>

            <button type="submit" class="button">Créer le don</button>

        </form>
    </div>

</body>

</html>