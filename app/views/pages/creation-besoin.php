<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="creer-besoin2">
        <form action="" method="post" class="card">

            <label for="nom">Nom du besoin</label>
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

            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" required>

            <label for="urgence">Niveau d'urgence</label>
            <select name="urgence" id="urgence">
                <option value="faible">Faible</option>
                <option value="moyenne">Moyenne</option>
                <option value="critique">Critique</option>
            </select>

            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"></textarea>

            <button type="submit" class="button">Créer le besoin</button>

        </form>
    </div>

</body>

</html>