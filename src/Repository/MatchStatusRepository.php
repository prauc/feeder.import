<?php

namespace App\Repository;

use App\Entity\MatchStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MatchStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchStatus[]    findAll()
 * @method MatchStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MatchStatus::class);
    }

    // /**
    //  * @return MatchStatus[] Returns an array of MatchStatus objects
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
    public function findOneBySomeField($value): ?MatchStatus
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
