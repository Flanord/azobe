<?php

namespace App\Repository;

use App\Entity\ImageUne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageUne|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageUne|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageUne[]    findAll()
 * @method ImageUne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageUneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageUne::class);
    }

    // /**
    //  * @return ImageUne[] Returns an array of ImageUne objects
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
    public function findOneBySomeField($value): ?ImageUne
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
