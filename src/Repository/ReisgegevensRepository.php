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
    public function MaxDistanceBiked($dateNumber,$year){
        $query = $this->createQueryBuilder('q')
            ->select(' month(q.datum) as month, year(q.datum) as year, sum(q.afstand) as afstand')
            ->groupBy('q.vervoersmiddel, year, month')
            ->where("q.vervoersmiddel='Fiets' AND month(q.datum)  = $dateNumber AND year(q.datum) = $year")
            ->orderBy("afstand")
            ->setMaxResults(1)
            ->getQuery();
        return $query->getResult();
    }


    public function TotalDistance($dateNumber, $year){
        $query = $this->createQueryBuilder('q')
            ->select(' month(q.datum) as month, year(q.datum) as year, sum(q.afstand) as afstand')
            ->groupBy('year, month')
            ->where("month(q.datum) = $dateNumber AND year(q.datum) = $year")
            ->getQuery();
        return $query->getResult();
    }


    public function groupByVervoersmiddel($id){

        $query = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month, 
            year(q.datum) as year, sum(q.afstand) as afstand, sum(q.afstand*0.1) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            //->groupBy('q.vervoersmiddel, year, month')
            ->groupBy('q.vervoersmiddel')
            ->addGroupBy('year')
            ->OrderBy('year', 'DESC')
            ->addGroupBy('month')
            ->addOrderBy('month', 'DESC')
            ->where("q.vervoersmiddel='Auto' AND q.werknemer_id=$id ")
            ->getQuery();

        $query2 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month, 
            year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*0.25) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            //->groupBy('q.vervoersmiddel, year, month')
            ->groupBy('q.vervoersmiddel')
            ->addGroupBy('year')
            ->OrderBy('year', 'DESC')
            ->addGroupBy('month')
            ->addOrderBy('month', 'DESC')
            ->where("q.vervoersmiddel!='Fiets' AND q.vervoersmiddel!='Auto' AND q.werknemer_id=$id ")
            ->getQuery();

        $query3 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month,
            year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*1.0) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            //->groupBy('q.vervoersmiddel, year, month')
            ->groupBy('q.vervoersmiddel')
            ->addGroupBy('year')
            ->OrderBy('year', 'DESC')
            ->addGroupBy('month')
            ->addOrderBy('month', 'DESC')
            ->where("q.afstand>5 AND q.vervoersmiddel='Fiets' AND q.werknemer_id=$id ")
            ->getQuery();

        $query4 = $this->createQueryBuilder('q')
            ->select('p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month,
            year(q.datum) as year, sum(q.afstand) as afstand, sum(q.afstand*0.5) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            //->groupBy('q.vervoersmiddel, year, month')
            ->groupBy('q.vervoersmiddel')
            ->addGroupBy('year')
            ->OrderBy('year', 'DESC')
            ->addGroupBy('month')
            ->addOrderBy('month', 'DESC')
            ->where("q.afstand<=5 AND q.vervoersmiddel='Fiets' AND q.werknemer_id=$id ")
            ->getQuery();

        $result1=$query->getResult();
        $result2=$query2->getResult();
        $result3=$query3->getResult();
        $result4=$query4->getResult();

    return array_merge($result1, $result2, $result3, $result4);
    }





    public function groupByDatum($id){

        $query = $this->createQueryBuilder('q')
        ->select(" p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month, 
        year(q.datum) as year, sum(q.afstand) as afstand,
        sum(case when q.vervoersmiddel='Auto' then (q.afstand*0.1)
        when q.vervoersmiddel!='Fiets' AND q.vervoersmiddel!='auto' then (q.afstand*0.25)
        when q.afstand>5 AND q.vervoersmiddel='fiets' then (q.afstand*1.0)
        when q.afstand<=5 AND q.vervoersmiddel='fiets' then (q.afstand*0.5)
        else 0 end)
        as compensatie")
        ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
        //->groupBy('year, month, q.vervoersmiddel')
        ->GroupBy('year')
        ->OrderBy('year', 'DESC')
        ->addGroupBy('month')
        ->addOrderBy('month', 'DESC')
        ->addGroupBy('q.vervoersmiddel')
        ->where("q.werknemer_id=$id ")
        ->getQuery();

        $result=$query->getResult();
        return $result;
    }




    public function groupByDatumAll(){

        $query = $this->createQueryBuilder('q')
        ->select(" p.email as werknemerId, q.vervoersmiddel, month(q.datum) as month, 
        year(q.datum) as year, sum(q.afstand) as afstand,
        sum(case when q.vervoersmiddel='Auto' then (q.afstand*0.1)
        when q.vervoersmiddel!='Fiets' AND q.vervoersmiddel!='Auto' then (q.afstand*0.25)
        when q.afstand>5 AND q.vervoersmiddel='Fiets' then (q.afstand*1.0)
        when q.afstand<=5 AND q.vervoersmiddel='Fiets' then (q.afstand*0.5)
        else 0 end)
        as compensatie")
        ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
        ->groupBy('q.werknemer_id')
        ->orderBy('q.werknemer_id')
        ->addGroupBy('year')
        ->addOrderBy('year', 'DESC')
        ->addGroupBy('month')
        ->addOrderBy('month', 'DESC')
        ->addGroupBy('q.vervoersmiddel')
        ->getQuery();

        $result=$query->getResult();
        return $result;
    }

    public function FindAll2(){

        $query = $this->createQueryBuilder('q')

            ->select(' p.email as email, q.vervoersmiddel, month(q.datum) as month, year(q.datum) as year, q.afstand as afstand, q.afstand*0.1 as compensatie')
            ->leftJoin("q.werknemer_id",'p')
            ->getQuery();

        return $query->getResult();

    }


    public function groupByID(){

        $query = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId, q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*0.1) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->where("q.vervoersmiddel='auto'")
            ->orderBy('q.werknemer_id, year, month, q.vervoersmiddel')
            ->getQuery();

        $query2 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*0.25) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->where("q.vervoersmiddel!='fiets' AND q.vervoersmiddel!='auto' ")
            ->orderBy('q.werknemer_id, year, month, q.vervoersmiddel')
            ->getQuery();

        $query3 = $this->createQueryBuilder('q')
            ->select(' p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand,sum(q.afstand*1.0) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel, year, month')
            ->where("q.afstand>5 AND q.vervoersmiddel='fiets'")
            ->orderBy('q.werknemer_id, year, month, q.vervoersmiddel')
            ->getQuery();
        $query4 = $this->createQueryBuilder('q')
            ->select('p.email as werknemerId,  q.vervoersmiddel,month(q.datum) as month,year(q.datum) as year, sum(q.afstand) as afstand, sum(q.afstand*0.5) as compensatie')
            ->leftJoin("q.werknemer_id",'p')->addSelect('p.id')
            ->groupBy('q.werknemer_id,q.vervoersmiddel,year, month')
            ->where("q.afstand<=5 AND q.vervoersmiddel='fiets'")
            ->orderBy('q.werknemer_id, year, month, q.vervoersmiddel')
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
