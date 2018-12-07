<?php

namespace App\Doctrine;

use App\Entity\Album;
use App\Entity\Artist;
use App\Utils\TokenGenerator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;

class UniqueTokenGenerator extends AbstractIdGenerator
{
    const TOKEN_LENGTH = 6;

    /**
     * Generates an identifier for an entity.
     *
     * @param EntityManager $em
     * @param Album|Artist $entity
     * @return string
     */
    public function generate(EntityManager $em, $entity)
    {
        $albumRepo = $em->getRepository(Album::class);
        $artistRepo = $em->getRepository(Artist::class);

        while (true) {
            $token = TokenGenerator::generate(self::TOKEN_LENGTH);

            $album = $albumRepo->find($token);
            if ($album) {
                continue;
            }

            $artist = $artistRepo->find($token);
            if ($artist) {
                continue;
            }

            return $token;
        }
    }
}
