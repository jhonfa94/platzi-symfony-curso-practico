<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findLatest():array
    {
        return $this->createQueryBuilder('post')
            ->addSelect('comments', 'category')
            ->leftJoin('post.comments', 'comments')
            ->leftJoin('comments.category', 'category')
            ->orderBy('post.id', 'DESC')
            // ->setMaxResults(22)
            ->getQuery()
            ->getResult();
    }

    public function findPostBySlug(string $slug): ?Post
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    public function findCommentsBySlug(string $slug): array
    {
        return $this->createQueryBuilder('post')
            ->innerJoin('post.comments', 'comment')
            ->addSelect('comment')
            ->where('post.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Post[] Returns an array of Post objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
