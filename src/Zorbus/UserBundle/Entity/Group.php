<?php

namespace Zorbus\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseGroup;

class Group extends BaseGroup
{

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}