<?php

namespace App\Repository;

use App\Entity\MensajeAlumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MensajeAlumno>
 *
 * @method MensajeAlumno|null find($id, $lockMode = null, $lockVersion = null)
 * @method MensajeAlumno|null findOneBy(array $criteria, array $orderBy = null)
 * @method MensajeAlumno[]    findAll()
 * @method MensajeAlumno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MensajeAlumnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MensajeAlumno::class);
    }

    public function add(MensajeAlumno $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MensajeAlumno $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MensajeAlumno[] Returns an array of MensajeAlumno objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MensajeAlumno
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
