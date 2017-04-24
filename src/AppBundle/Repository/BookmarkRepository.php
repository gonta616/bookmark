<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Bookmark;
use Doctrine\ORM\EntityRepository;

class BookmarkRepository extends EntityRepository
{
    public function getBookmarkQueryBuilder($user_id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('b')
            ->from('AppBundle:Bookmark', 'b')
            ->leftJoin('b.words', 'w')
            ->leftJoin('b.terms', 't')
            ->leftJoin('b.user', 'u')
            ->orderBy('b.publishedDate', 'DESC')
        ;

        if(!empty($user_id))
            $qb->andWhere('u.id = :user_id')->setParameter('user_id', $user_id);

        return $qb;
    }
}
