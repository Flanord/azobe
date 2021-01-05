<?php

namespace App\Repository;

use App\Entity\ImageActif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageActif|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageActif|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageActif[]    findAll()
 * @method ImageActif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageActifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageActif::class);
    }

    // /**
    //  * @return ImageActif[] Returns an array of ImageActif objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageActif
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
