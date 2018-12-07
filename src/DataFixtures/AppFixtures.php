<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Artist;
use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const DATASET_URL = 'https://gist.githubusercontent.com/fightbulc/9b8df4e22c2da963cf8ccf96422437fe/raw/8d61579f7d0b32ba128ffbf1481e03f4f6722e17/artist-albums.json';

    public function load(ObjectManager $manager)
    {
        $data = json_decode(file_get_contents(self::DATASET_URL), true);

        foreach ($data as $artistData) {
            $artist = new Artist();
            $artist->setName($artistData['name']);

            foreach ($artistData['albums'] as $albumData) {
                $album = new Album();
                $album->setTitle($albumData['title']);
                $album->setCover($albumData['cover']);
                $album->setDescription($albumData['description']);
                $album->setArtist($artist);

                foreach ($albumData['songs'] as $songData) {
                    $song = new Song();
                    $song->setTitle($songData['title']);
                    $song->setLength($this->convertLength($songData['length']));
                    $song->setAlbum($album);

                    $manager->persist($song);
                }

                $manager->persist($album);
            }

            $manager->persist($artist);
        }

        $manager->flush();
    }

    /**
     * Convert string time (H:i) into seconds
     *
     * @param string $length
     * @return int
     */
    private function convertLength(string $length): int
    {
        [$minutes, $seconds] = explode(':', $length);

        return $minutes + $seconds * 60;
    }
}
