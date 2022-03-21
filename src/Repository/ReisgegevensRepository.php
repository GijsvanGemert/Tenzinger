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
            ->select(' p.email as werknemerId, q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*0.1) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.vervoersmiddel='auto'")
            ->getQuery();

        $query2 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*0.25) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.vervoersmiddel!='fiets' AND q.vervoersmiddel!='auto' ")
            ->getQuery();

        $query3 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*1.0) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.afstand>5 AND q.vervoersmiddel='fiets'")
            ->getQuery();
        $query4 = $this->createQueryBuilder('q')
            ->select('p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand, sum(q.afstand*0.5) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel,year, month')
            ->orderBy('q.id', 'DESC')
            ->where("q.afstand<=5 AND q.vervoersmiddel='fiets'")
            ->getQuery();
        $result1=$query->getResult();
        $result2=$query2->getResult();
        $result3=$query3->getResult();
        $result4=$query4->getResult();
    return array_merge($result1,$result2,$result3,$result4);

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
