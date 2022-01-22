<?php

namespace App\Repository;

use App\Entity\EstEnStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstEnStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstEnStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstEnStock[]    findAll()
 * @method EstEnStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstEnStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstEnStock::class);
    }

    // /**
    //  * @return EstEnStock[] Returns an array of EstEnStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstEnStock
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
