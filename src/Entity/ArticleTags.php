<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as Doctrine;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Doctrine\Table(name="tags")
 * @Doctrine\Entity()
 * @Doctrine\HasLifecycleCallbacks
 */
class ArticleTags
{
    /**
     * @var integer
     *
     * @Doctrine\Column(name="id", type="integer", nullable=false,  options={"unsigned"=true})
     * @Doctrine\Id
     * @Doctrine\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @Doctrine\Column(name="name", type="string", length=25, nullable=false, unique=true)
     */
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @@param string $name
     * @return ArticleTags
     */
    public function setName($name): ArticleTags
    {
        $this->name = $name;
        return $this;
    }
}