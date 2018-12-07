<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"artists", "albums"})
     */
    private $cover;

    /**
     * @ORM\Column(type="text")
     * @Groups({"albums"})
     */
    private $description;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="albums")
     * @ORM\JoinColumn(name="album_token", referencedColumnName="token")
     * @Groups({"albums"})
     */
    private $artist;

    /**
     * @var Song[]
     * @ORM\OneToMany(targetEntity="Song", mappedBy="album")
     * @Groups({"albums"})
     */
    private $songs;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getSongs()
    {
        return $this->songs;
    }

    public function setSongs($songs): self
    {
        $this->songs = $songs;

        return $this;
    }
}
