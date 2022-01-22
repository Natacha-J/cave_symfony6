<?php

namespace App\Repository;

use App\Entity\SAccordeAvec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SAccordeAvec|null find($id, $lockMode = null, $lockVersion = null)
 * @method SAccordeAvec|null findOneBy(array $criteria, array $orderBy = null)
 * @method SAccordeAvec[]    findAll()
 * @method SAccordeAvec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SAccordeAvecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SAccordeAvec::class);
    }

    // /**
    //  * @return SAccordeAvec[] Returns an array of SAccordeAvec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SAccordeAvec
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
