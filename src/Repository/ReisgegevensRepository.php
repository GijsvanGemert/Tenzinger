<?php

namespace App\Repository;

use App\Entity\Reisgegevens;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reisgegevens|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reisgegevens|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reisgegevens[]    findAll()
 * @method Reisgegevens[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReisgegevensRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reisgegevens::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Reisgegevens $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Reisgegevens $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function groupByID(){

        $query = $this->createQueryBuilder('q')
            ->select('q.id, q.vervoersmiddel,month(q.datum) as month,q.datum, q.heen, sum(q.afstand) as afstand,identity(q.werknemer_id) as werknemerId')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.vervoersmiddel!='fiets'")
            ->getQuery();

        $query2 = $this->createQueryBuilder('q')
            ->select('q.id, q.vervoersmiddel,month(q.datum) as month,q.datum, q.heen, sum(q.afstand) as afstand,identity(q.werknemer_id) as werknemerId')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.afstand>5 AND q.vervoersmiddel='fiets'")
            ->getQuery();
        $query3 = $this->createQueryBuilder('q')
            ->select('q.id, q.vervoersmiddel,month(q.datum) as month,q.datum, q.heen, sum(q.afstand) as afstand,identity(q.werknemer_id) as werknemerId')
            ->groupBy('q.werknemer_id,q.vervoersmiddel,month')
            ->orderBy('q.id', 'DESC')
            ->where("q.afstand<=5 AND q.vervoersmiddel='fiets'")
            ->getQuery();
        $result1=$query->getResult();
        $result2=$query2->getResult();
        $result3=$query3->getResult();
    return array_merge($result1,$result2,$result3);

    }
    // /**
    //  * @return Reisgegevens[] Returns an array of Reisgegevens objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reisgegevens
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
