<?php

namespace App\Repository;

use App\Entity\NiveauAccord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NiveauAccord|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauAccord|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauAccord[]    findAll()
 * @method NiveauAccord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauAccordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauAccord::class);
    }

    // /**
    //  * @return NiveauAccord[] Returns an array of NiveauAccord objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NiveauAccord
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
