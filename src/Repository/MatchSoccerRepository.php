<?php

namespace App\Repository;

use App\Entity\MatchSoccer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MatchSoccer|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchSoccer|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchSoccer[]    findAll()
 * @method MatchSoccer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchSoccerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MatchSoccer::class);
    }

    // /**
    //  * @return MatchSoccer[] Returns an array of MatchSoccer objects
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
    public function findOneBySomeField($value): ?MatchSoccer
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
