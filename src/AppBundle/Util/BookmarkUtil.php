<?php

namespace AppBundle\Util;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Bookmark;
use Symfony\Component\Form\Form;
use Knp\Component\Pager\Paginator;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;

class BookmarkUtil
{
    private $em;
    private $parameters;
    private $pagenator;
    private $fbu;

    public function __construct($parameters, EntityManager $entityManager,Paginator $paginator, FilterBuilderUpdater $fbu)
    {
        $this->parameters = $parameters;
        $this->em = $entityManager;
        $this->paginator = $paginator;
        $this->fbu = $fbu;
    }

    public function getBookmark($page, $filter, $user_id = null)
    {
        $qb = $this->em->getRepository('AppBundle:Bookmark')->getBookmarkQueryBuilder($user_id);

        if (!empty($filter) && $filter->isValid())
        {
            $this->fbu->setParts(array(
                $this->fbu->setParts(array(
                    '__root__'  => 'b',
                    'b.words' => 'w',
                    'b.terms' => 't',
                    'b.user' => 'u'
                )),
                $this->fbu->addFilterConditions($filter, $qb),
            ));
        }

        return $this->paginator->paginate(
            $qb->getQuery(),
            $page,
            $this->parameters['bookmark_per_page']
        );
    }

    public function post($bookmark)
    {
        foreach ($bookmark->getWords() as $word) {
            $word->setBookmark($bookmark);
        }

        $this->em->persist($bookmark);
        $this->em->flush();

        return $bookmark;
    }

    public function patch($item)
    {
        foreach ($bookmark->getWords() as $word) {
            $word->setBookmark($bookmark);
        }

        $this->em->persist($item);
        $this->em->flush();

        return $item;
    }
}
