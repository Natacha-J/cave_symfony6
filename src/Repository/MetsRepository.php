<?php

namespace App\Repository;

use App\Entity\Mets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mets[]    findAll()
 * @method Mets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mets::class);
    }

    // /**
    //  * @return Mets[] Returns an array of Mets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mets
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
