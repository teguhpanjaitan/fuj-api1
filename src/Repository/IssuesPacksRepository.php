<?php

namespace App\Repository;

use App\Entity\IssuesPacks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method IssuesPacks|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssuesPacks|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssuesPacks[]    findAll()
 * @method IssuesPacks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssuesPacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssuesPacks::class);
    }

    // /**
    //  * @return IssuesPacks[] Returns an array of IssuesPacks objects
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
    public function findOneBySomeField($value): ?IssuesPacks
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
