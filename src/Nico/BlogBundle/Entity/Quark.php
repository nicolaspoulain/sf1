<?php

namespace Nico\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quark
 */
class Quark
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $categories_csv;

    /**
     * @var integer
     */
    private $parent;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Quark
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set categories_csv
     *
     * @param string $categoriesCsv
     * @return Quark
     */
    public function setCategoriesCsv($categoriesCsv)
    {
        $this->categories_csv = $categoriesCsv;
    
        return $this;
    }

    /**
     * Get categories_csv
     *
     * @return string 
     */
    public function getCategoriesCsv()
    {
        return $this->categories_csv;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     * @return Quark
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set user_id
     *
     * @param integer $userId
     * @return Quark
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Quark
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Quark
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add groups
     *
     * @param \Nico\BlogBundle\Entity\Category $groups
     * @return Quark
     */
    public function addGroup(\Nico\BlogBundle\Entity\Category $groups)
    {
        $this->groups[] = $groups;
    
        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Nico\BlogBundle\Entity\Category $groups
     */
    public function removeGroup(\Nico\BlogBundle\Entity\Category $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @ORM\PrePersist
     */
    public function doSetCreatedAtValue()
    {
      if(!$this->getCreatedAt())
      {
        $this->created_at = new \DateTime();
      }
    }

    /**
     * @ORM\PreUpdate
     */
    public function doSetUpdatedAtValue()
    {
      if(!$this->getUpdatedAt())
      {
        $this->updated_at = new \DateTime();
      }
    }
}