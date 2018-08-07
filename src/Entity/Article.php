<?php

namespace App\Entity;

use App\Model\Slug\Slugifier;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @package App\Entity
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=191, nullable=false)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", length=191, nullable=false)
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        $this->slug = Slugifier::Slugify($title);


        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}