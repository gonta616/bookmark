<?php

namespace AppBundle\Util;

use AppBundle\Entity\Bookmark;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;
use Knp\Component\Pager\Paginator;
use Symfony\Component\Form\Form;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DomCrawler\Crawler;

class BookmarkUtil
{
    private $parameters;
    private $gaufrette;
    private $em;
    private $pagenator;
    private $fbu;
    private $client;
    private $container;

    public function __construct(
        $parameters,
        $gaufrette,
        EntityManager$entityManager,
        Paginator $paginator,
        FilterBuilderUpdater $fbu,
        Client $client,
        Container $container
    )
    {
        $this->parameters = $parameters;
        $this->gaufrette = $gaufrette;
        $this->em = $entityManager;
        $this->paginator = $paginator;
        $this->fbu = $fbu;
        $this->client = $client;
        $this->container = $container;
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

        return $this->paginator->paginate(
            $qb->getQuery(),
            $page,
            $this->parameters['bookmark_per_page']
        );
    }

    public function fetchDataFromUrl($bookmark)
    {
        try {
            $res = $this->client->request('GET', $bookmark->getUrl());
            // dump('res: ', $res);
            // dump($res->getBody()->getContents());
            $crawler = new Crawler($res->getBody()->getContents());
            $bookmark->setTitle($crawler->filterXPath('//title')->text());
            $descriptions = $crawler->filterXpath("//meta[@name='description']")->extract(array('content'));
            if (sizeof($descriptions) > 0) {
                $bookmark->setDescription($descriptions[0]);
            }


            // get image path
            // $result = $crawler->filterXpath('//img')->extract(array('src'));
            // foreach ($result as $image) {
            //     $file = file_get_contents($image);
            //     // $this->gaufrette->get('local_fs')->write();
            //     dump($image);
            // }

        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
        }
    }

    public function post($bookmark)
    {
        $this->fetchDataFromUrl($bookmark);
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
