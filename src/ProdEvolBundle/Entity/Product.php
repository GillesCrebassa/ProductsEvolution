<?php

namespace ProdEvolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProdEvolBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="supplier", type="string", length=120, nullable=true)
     */
    private $supplier;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @var string
     *
     * @ORM\Column(name="media", type="string", length=30,nullable=true)
     */
    private $media;

    /**
     * @var int
     *
     * @ORM\Column(name="typeId", type="integer", nullable=true)
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="string", length=255,nullable=true)
     */
    private $remarks;

    /**
     * @ORM\OneToMany(targetEntity="ProdEvolBundle\Entity\Release", mappedBy="product")
     */
    private $releases;
    
    public function __construct() {
        $this->releases = new ArrayCollection();
    }
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set supplier
     *
     * @param string $supplier
     *
     * @return Product
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return string
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Product
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set media
     *
     * @param string $media
     *
     * @return Product
     */
    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return string
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Product
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set remarks
     *
     * @param string $remarks
     *
     * @return Product
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get remarks
     *
     * @return string
     */
    public function getRemarks()
    {
        return $this->remarks;
    }
    
    
    
    

    /**
     * Add release
     *
     * @param \ProdEvolBundle\Entity\Release $release
     *
     * @return Product
     */
    public function addRelease(\ProdEvolBundle\Entity\Release $release)
    {
        $this->releases[] = $release;

        return $this;
    }

    /**
     * Remove release
     *
     * @param \ProdEvolBundle\Entity\Release $release
     */
    public function removeRelease(\ProdEvolBundle\Entity\Release $release)
    {
        $this->releases->removeElement($release);
    }

    /**
     * Get releases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReleases()
    {
        return $this->releases;
    }
}
