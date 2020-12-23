<?php

namespace App\Repository;

use App\Entity\AlaUne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method AlaUne|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlaUne|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlaUne[]    findAll()
 * @method AlaUne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlaUneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlaUne::class);
    }

    // /**
    //  * @return AlaUne[] Returns an array of AlaUne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AlaUne
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
