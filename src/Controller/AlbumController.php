<?php

namespace App\Controller;

use App\Entity\Album;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;

class AlbumController extends FOSRestController
{
    /**
     *
     * @param string $token
     * @return Album
     */
    public function getAlbumAction(string $token)
    {
        $em = $this->getDoctrine()->getManager();
        $album = $em->getRepository(Album::class)->findByToken($token);

        if (is_null($album)) {
            throw $this->createNotFoundException('Album not found');
        }

        return $album;
    }
}
