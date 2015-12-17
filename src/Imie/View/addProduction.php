<!doctype html>
<html lang="fr">
<head>
    <?php include_once "head.php"; ?>
    <title>Add product</title>
</head>
<body>
<div class="container">
    <?php include_once "menu.php"; ?>
    <h1>Produits</h1>

    <?php if (isset($productToModify)) { ?>
    <form method="post"
          action="../public/index.php?controller=product&action=modify&id=<?= $productToModify->getId(); ?>"
          class="form-group">
    <?php } else { ?>
    <form method="post"
          action="../public/index.php?controller=product&action=add"
          class="form-group">
        <?php } ?>
        <fieldset>
            <?php if (isset($productToModify)) { ?>
                <legend>Modifier un Produit</legend>
            <?php } else { ?>
                <legend>Ajouter un Produit</legend>
            <?php } ?>
            <div>
                <div class="from-group">
                    <label for="name">Nom :</label>
                    <input
                        type="text"
                        name="name"
                        value="<?= isset($productToModify) ? $productToModify->getName() : ''; ?>"
                        id="name"
                        class="form-control"
                        placeholder="Nom du produit">
                </div>
                <div class="from-group">
                    <label for="image">Image :</label>
                    <input type="text"
                           name="image"
                           value="<?= isset($productToModify) && null !== $productToModify->getImage() ? $productToModify->getImage()->getName() : ''; ?>"
                           id="image"
                           class="form-control"
                           placeholder="Saisissez une url d'image"
                    >
                </div>
            </div>
            <div class="from-group">
                <?php if (isset($productToModify)) { ?>
                    <button type="submit" class="btn btn-default">Modifier</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-default">Ajouter</button>
                <?php } ?>
            </div>
        </fieldset>

    </form>
</div>
</body>
</html>