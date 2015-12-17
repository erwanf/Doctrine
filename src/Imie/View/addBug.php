<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once 'head.php'; ?>
    <title>Bugs</title>
</head>
<body>
<div class="container">
    <?php include_once 'menu.php'; ?>
    <h1>Bugs</h1>
    <hr />
    <form method="post" action="index.php?controller=bug&action=add" class="form-group">
        <fieldset>
            <legend>Ajouter un bug</legend>

            <div class="form-group">
                <label for="products">Produits</label>
                <select id="products" name="products[]" class="form-control" multiple required>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product->getId(); ?>"><?= $product->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea id="desc" name="desc" placeholder="Description du problème" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Ajouter</button>
        </fieldset>
    </form>
</div>
</body>
</html>