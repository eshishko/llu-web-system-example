<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return mixed
     */
    public function lastFive()
    {
        return $this
            ->createQueryBuilder('article')
            ->select('article')
            ->where('article.isEnabled = :isEnabled')
            ->setMaxResults(5)
            ->setParameter('isEnabled', true)
            ->orderBy('article.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}