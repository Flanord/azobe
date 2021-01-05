<?php

namespace App\Repository;

use App\Entity\ImageEdito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageEdito|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageEdito|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageEdito[]    findAll()
 * @method ImageEdito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageEditoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageEdito::class);
    }

    // /**
    //  * @return ImageEdito[] Returns an array of ImageEdito objects
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
    public function findOneBySomeField($value): ?ImageEdito
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
