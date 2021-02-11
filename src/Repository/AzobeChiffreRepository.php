<?php

namespace App\Repository;

use App\Entity\AzobeChiffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AzobeChiffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method AzobeChiffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method AzobeChiffre[]    findAll()
 * @method AzobeChiffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AzobeChiffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AzobeChiffre::class);
    }

    // /**
    //  * @return AzobeChiffre[] Returns an array of AzobeChiffre objects
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
    public function findOneBySomeField($value): ?AzobeChiffre
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
