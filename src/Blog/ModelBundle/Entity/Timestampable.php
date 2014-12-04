<?php

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timestable abstract class to define created behavior
 *
 * @ORM\MappedSuperclass
 */
abstract class Timestampable
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;


    /**
     * construct
     */
    public function __construct()
    {
        $this->createAt = new \DataTime();
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return Author
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }
}