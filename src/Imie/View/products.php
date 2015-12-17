<!doctype html>
<html lang="fr">
<head>
    <?php include_once "head.php"; ?>
    <title>Produits</title>
</head>
<body>
<div class="container">
    <?php include_once "menu.php"; ?>
    <h1>Liste des produits</h1>
    <p><a href="<?=_INDEXPATH_.'index.php?controller=product&action=add'?>">Ajouter un produit</a></p>
    <hr/>

    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Image</th>
        <th></th>
        <th></th>
        </thead>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product->getID() ?></td>
                <td><?= $product->getName() ?></td>
                <td><?= $product->getImage()->getId() ?></td>
                <td>
                    <img
                        src="<?= $product->getImage()->getName();?>"
                        alt="<?= $product->getName(); ?>"
                        title="<?= $product->getName(); ?>">
                </td>
                <td><a href="index.php?controller=product&action=modify&id=<?= $product->getId(); ?>">Modifier</a></td>
                <td><a href="index.php?controller=product&action=remove&id=<?= $product->getId(); ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>