<!-- //src/Imie/View/bugs.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once "head.php"; ?>
    <title>Bugs</title>
</head>
<body>
<div class="container">
    <?php include_once "menu.php"; ?>
    <h1>Bugs</h1>

    <p><a href="index.php?controller=bug&action=add">Ajouter un bug</a></p>
    <hr/>
    <table class="table table-striped table-hover">
        <caption>Liste des bugs</caption>
        <thead>
        <tr>
            <th scope="row">Id</th>
            <th scope="row">Date</th>
            <th scope="row">Description du Bug</th>
            <th scope="row">Produits</th>
            <th scope="row"></th>
            <th scope="row"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bugs as $bug) {?>
            <tr>
                <td><?= $bug->getId(); ?></td>
                <td><?= $bug->getDate()->format('Y-m-d H:i:s'); ?></td>
                <td><?= $bug->getDescription(); ?></td>
                <td>
                    <ul>
                        <?php
                        $products = $bug->getProducts();
                        foreach ($products as $prod) {
                            ?>

                            <li><?= $prod->getId() ?> - <?= $prod->getName() ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </td>
                <td><a href="index.php?controller=bug&action=modify&id=<?= $bug->getId(); ?>">Modifier</a></td>
                <td><a href="index.php?controller=bug&action=remove&id=<?= $bug->getId(); ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>