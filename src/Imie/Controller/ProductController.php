<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 16/12/2015
 * Time: 09:44
 */

namespace Imie\Controller;


use Imie\Entity\Image;
use Imie\Entity\Product;

class ProductController extends Controller
{
    public function addAction()
    {
        if (!empty($_POST)) {
            // créer de nouveaux objets
            $product = new Product();
            $image =  new Image();
            //récuperer les infos du formulaire
            $image->setName(htmlentities($_POST['image']));
            $product->setName(htmlentities($_POST['name']));
            $product->setImage($image);
            // passage des objets à Doctrine
            $this->em->persist($product);
            $this->em->persist($image);
            $this->em->flush();
            // redirection
            header('Location: index.php?controller=product&action=index');
        }
        $this->render('addProduction.php');
    }

    

    public function indexAction()
    {
        $repo = $this->em->getRepository('Imie\Entity\Product');
        $query = $repo->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->getQuery();
        $products = $query->getResult();
        $this->render('products.php', array('products' => $products));
    }

    public function modifyAction()
    {
        if (!empty($_GET['id'])) {
            $repo = $this->em->getRepository('Imie\Entity\Product');
            $idToModify = (int)$_GET['id'];
            // On récupère le produit à modifier avec son id (passé par l'URL)
            $productToModify = $repo->findOneById($idToModify);

            if (!empty($_POST)) {   // Si le formulaire a été validé
                // On met à jour du produit
                $productToModify->setName(htmlentities($_POST['name']));
                if (empty($_POST['image'])) { // Si l'utilisateur a supprimé l'image
                    $productToModify->getImage()->setName('http://www.pulupulu.fr/dessins/null_LQ.jpg');
                } else {
                    $productToModify->getImage()->setName(htmlentities($_POST['image']));
                }
                // Pas besoin de refaire un $em->persist($productToModify) car il est déjà en base
                $this->em->flush();
                header('Location: index.php?controller=product&action=index');
            }

            $this->render('addProduction.php', array(
                'productToModify' => $productToModify
            ));
        }
        else{
            header('Location: index.php?controller=product&action=index');
        }
    }

    public function removeAction() {
        $repo = $this->em->getRepository('Imie\Entity\Product');
        $idToModify = (int)$_GET['id'];

        // On récupère le produit indiqué par Id pour le supprimer
        $productToModify = $repo->findOneById($idToModify);
        $this->em->remove($productToModify);
        $this->em->flush();
        header('Location: index.php?controller=product&action=index');
    }
}