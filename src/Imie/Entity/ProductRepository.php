<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 16/12/2015
 * Time: 09:42
 */

namespace Imie\Entity;


use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

    public function getProductsOrderedById() {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id')
            ->getQuery()
            ->getResult();
    }

    public function getProductsById($ids) {
        $qb = $this->createQueryBuilder('p');
        $qb->where($qb->expr()->in('p.id', $ids));
        return $qb->getQuery()->getResult();
    }

}