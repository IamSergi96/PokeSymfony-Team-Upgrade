<?php

namespace App\Repository;

use App\Entity\Debilidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Debilidad>
 *
 * @method Debilidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debilidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debilidad[]    findAll()
 * @method Debilidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebilidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Debilidad::class);
    }

//    /**
//     * @return Debilidad[] Returns an array of Debilidad objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Debilidad
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
