<?php

namespace App\Repository;

use App\Entity\CandidatureAppelProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CandidatureAppelProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidatureAppelProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidatureAppelProjet[]    findAll()
 * @method CandidatureAppelProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatureAppelProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidatureAppelProjet::class);
    }

    // /**
    //  * @return CandidatureAppelProjet[] Returns an array of CandidatureAppelProjet objects
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
    public function findOneBySomeField($value): ?CandidatureAppelProjet
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
