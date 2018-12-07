<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 */
class Artist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Doctrine\UniqueTokenGenerator")
     * @ORM\Column(type="string", length=6, unique=true)
     * @Groups({"artists", "albums"})
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"artists", "albums"})
     */
    private $name;

    /**
     * @var Album[]
     * @ORM\OneToMany(targetEntity="Album", mappedBy="artist")
     * @Groups({"artists"})
     */
    private $albums;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Album[]
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param Album[] $albums
     * @return Artist
     */
    public function setAlbums($albums): self
    {
        $this->albums = $albums;

        return $this;
    }
}
