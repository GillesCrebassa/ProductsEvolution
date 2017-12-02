<?php

namespace ProdEvolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Release
 *
 * @ORM\Table(name="release")
 * @ORM\Entity(repositoryClass="ProdEvolBundle\Repository\ReleaseRepository")
 */
class Release
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
     * @var date
     *
     * @ORM\Column(name="entryDate", type="date", nullable=false)
     */
    
    private $entryDate;

    /**
     * @var date
     *
     * @ORM\Column(name="publicationDate", type="date", nullable=false)
     */
    private $publicationDate;
    
    
    /**
     * @var date
     *
     * @ORM\Column(name="expirationDate", type="date", nullable=true)
     */
    private $expirationDate;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="licenseInfo", type="string", length=255, nullable=true)
     */
    private $licenseInfo;

    
    /**
     * @var string
     *
     * @ORM\Column(name="remarks", type="string", length=255, nullable=true)
     */
    private $remarks;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=120, nullable=true)
     */
    private $reference;

    /**
     *
     * @ORM\ManyToOne(targetEntity="ProdEvolBundle\Entity\Product", inversedBy="release")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;
    
    
    public function __construct() {
        $this->entryDate = new \DateTime();
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
     * @return Release
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
     * @param date $remarks
     *
     * @return Release
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get entryDate
     *
     * @return date
     */
    public function getentryDate()
    {
        return $this->entryDate;
    }

    /**
     * Set publicationDate
     *
     * @param string $publicationDate
     *
     * @return Release
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return date
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    
    
    /**
     * Set expirationDate
     *
     * @param date $expirationDate
     *
     * @return Release
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get expirationDate
     *
     * @return date
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set description
     *
     * @param string $remarks
     *
     * @return Release
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
     * Set description
     *
     * @param string $reference
     *
     * @return Release
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }    
    
    
    /**
     * Set licenseInfo
     *
     * @param string $licenseInfo
     *
     * @return Release
     */
    public function setLicenseInfo($licenseInfo)
    {
        $this->licenseInfo = $licenseInfo;

        return $this;
    }

    /**
     * Get licenseInfo
     *
     * @return string
     */
    public function getLicenseInfo()
    {
        return $this->licenseInfo;
    }

    

    
    


    

    /**
     * Set product
     *
     * @param \ProdEvolBundle\Entity\Product $product
     *
     * @return Release
     */
    public function setProduct(\ProdEvolBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \ProdEvolBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
