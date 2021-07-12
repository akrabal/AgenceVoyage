<?php

namespace App\Repository;

use App\Entity\Voyage;
use App\Entity\voyagerecherche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Voyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voyage[]    findAll()
 * @method Voyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voyage::class);
    }

    public function  findVoyage ( ?voyagerecherche $voyagerecherche )
    {
        $query = $this->createQueryBuilder('v')
         ->join('v.Compagnie','c')
        ->andWhere('v.statutVoyage = :val')
        ->setParameter('val', 'actif')
        ->orderBy('v.idVoyage', 'ASC')
        ;
        
        if ($voyagerecherche->getNonCompagnie())
         {
           $query= $query->andWhere('c.NomCompagnie = :NonCompagnie');
                   $query->setParameter('NonCompagnie', $voyagerecherche->getNonCompagnie()) ;
         }

         if ($voyagerecherche->getDateDepart())
         {
           $query= $query->andWhere('v.HeureDepart = :datedepart')
                   ->setParameter('datedepart', $voyagerecherche->getDateDepart()) ;
         }

        return $query->getQuery()
         ->getResult();

    }

    // /**
    //  * @return Voyage[] Returns an array of Voyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Voyage
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
