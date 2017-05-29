<?php

namespace AppBundle\Util;

use AppBundle\Entity\Bookmark;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;
use Knp\Component\Pager\Paginator;
use Symfony\Component\Form\Form;

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

        if($filter->isValid()) {
            $this->fbu->setParts(array(
                '__root__'  => 'b',
                'b.words' => 'w',
                'b.terms' => 't',
                'b.user' => 'u'
            ));
            $this->fbu->addFilterConditions($filter, $qb);
        }
        dump($page);
        return $this->paginator->paginate(
            $qb->getQuery(),
            $page,
            $this->parameters['bookmark_per_page']
        );
    }

    public function fetchDataFromUrl($url)
    {
        $client = new Client();
        $res = $client->request('GET', $url);
        dump('res', $res);
        dump('body'. $res->getBody());
    }

    public function post($bookmark)
    {
        $this->fetchDataFromUrl($bookmark->getUrl());
        foreach ($bookmark->getWords() as $word) {
            $word->setBookmark($bookmark);
        }

        $this->em->persist($bookmark);
        $this->em->flush();

        return $bookmark;
    }

    public function patch($bookmark)
    {
        foreach ($bookmark->getWords() as $word) {
            $word->setBookmark($bookmark);
        }

        $this->em->persist($bookmark);
        $this->em->flush();

        return $bookmark;
    }
}
