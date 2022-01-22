<?php

namespace App\Repository;

use App\Entity\CategorieMets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieMets|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieMets|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieMets[]    findAll()
 * @method CategorieMets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieMetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieMets::class);
    }

    // /**
    //  * @return CategorieMets[] Returns an array of CategorieMets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieMets
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
