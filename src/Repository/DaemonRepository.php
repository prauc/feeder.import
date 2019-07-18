<?php

namespace App\Repository;

use App\Entity\Daemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Daemon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Daemon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Daemon[]    findAll()
 * @method Daemon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DaemonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Daemon::class);
    }

    // /**
    //  * @return Daemon[] Returns an array of Daemon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Daemon
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
