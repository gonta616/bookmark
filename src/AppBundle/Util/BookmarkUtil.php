<?php

namespace AppBundle\Util;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Draft;

class BookmarkUtil
{
    private $em;
    private $parameters;

    public function __construct($parameters, EntityManager $entityManager)
    {
        $this->parameters = $parameters;
        $this->em = $entityManager;
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
