<?php
namespace AppBundle\Repository;

use AppBundle\Entity\Term;
use Doctrine\ORM\EntityRepository;

class TermRepository extends EntityRepository
{
    public function getTermQueryBuilder($user_id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('t')
            ->from('AppBundle:Term', 't')
            ->leftJoin('t.user', 'u')

        if (!empty($user_id))
        {
            $qb->andWhere('u.id = :user_id')->setParameter('user_id', $user_id);
        }

        return $qb;
    }
}
