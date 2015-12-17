<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 17/12/2015
 * Time: 09:22
 */

namespace Imie\Controller;


use Imie\Entity\Bug;

class BugController extends Controller
{

    public function addAction() {
        // Récupère tous les produits
        $productRepo = $this->em->getRepository('Imie\Entity\Product');
        $products = $productRepo->findAll();

        if (!empty($_POST)) { // Si un formulaire est envoyé
            // Créer un nouveau bug
            $bug = new Bug();
            $prods = $_POST['products'];
           // array_walk($prods, function(&$value) { $value = (int)($value); });
            $prods = $productRepo->getProductsById($prods);
            $bug->setDescription(htmlentities($_POST['desc']));
            // Rempli les objets
            foreach ($prods as $prod) {
                $prod->addBug($bug);
            }
            // Enregistre le nouveau bug
            $this->em->persist($bug);
            $this->em->flush();

            header('Location: index.php?controller=bug&action=index');
        }
        $this->render('addBug.php', array(
            'products' => $products
        ));
    }

    public function indexAction() {
        $bugRepo = $this->getRepository('Imie\Entity\Bug');
        $bugs = $bugRepo->findAll();
        $this->render('bugs.php', array('bugs' => $bugs));
    }

    public function removeAction() {
        $repo = $this->em->getRepository('Imie\Entity\Bug');
        $idToModify = (int)$_GET['id'];
        // On récupère le produit indiqué par Id pour le supprimer
        $bugToModify = $repo->findOneById($idToModify);
        $this->em->remove($bugToModify);
        $this->em->flush();
        header('Location: index.php?controller=bug&action=index');
    }
}