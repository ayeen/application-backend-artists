<?php

namespace App\Controller;

use App\Entity\Artist;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;

class ArtistsController extends FOSRestController
{
    /**
     * Get all artists
     *
     * @View(serializerGroups={"artists"})
     * @return Artist[]
     */
    public function getArtistsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $artist = $em->getRepository(Artist::class)->findAll();

        return $artist;
    }

    /**
     * Get one artist by token
     *
     * @View(serializerGroups={"artists"})
     *
     * @param string $token
     * @return Artist
     */
    public function getArtistAction(string $token)
    {
        $em = $this->getDoctrine()->getManager();
        $artist = $em->getRepository(Artist::class)->findByToken($token);

        if (is_null($artist)) {
            throw $this->createNotFoundException('Artist not found');
        }

        return $artist;
    }
}
