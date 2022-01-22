<?php

namespace App\Repository;

use App\Entity\Contenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contenance[]    findAll()
 * @method Contenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contenance::class);
    }

    // /**
    //  * @return Contenance[] Returns an array of Contenance objects
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
    public function findOneBySomeField($value): ?Contenance
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
