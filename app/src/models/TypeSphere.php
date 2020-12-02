<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeSphere
 *
 * @ORM\Table(name="type_sphere")
 * @ORM\Entity
 */
class TypeSphere
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="short_libelle", type="string", length=255, nullable=true)
     */
    private $shortLibelle;


    /**
     * Get idTypeSphere
     *
     * @return integer
     */
    public function getIdTypeSphere()
    {
        return $this->idTypeSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeSphere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set shortLibelle
     *
     * @param string $shortLibelle
     *
     * @return TypeSphere
     */
    public function setShortLibelle($shortLibelle)
    {
        $this->shortLibelle = $shortLibelle;

        return $this;
    }

    /**
     * Get shortLibelle
     *
     * @return string
     */
    public function getShortLibelle()
    {
        return $this->shortLibelle;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="short_libelle", type="string", length=255, nullable=true)
     */
    private $shortLibelle;


    /**
     * Get idTypeSphere
     *
     * @return integer
     */
    public function getIdTypeSphere()
    {
        return $this->idTypeSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeSphere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set shortLibelle
     *
     * @param string $shortLibelle
     *
     * @return TypeSphere
     */
    public function setShortLibelle($shortLibelle)
    {
        $this->shortLibelle = $shortLibelle;

        return $this;
    }

    /**
     * Get shortLibelle
     *
     * @return string
     */
    public function getShortLibelle()
    {
        return $this->shortLibelle;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="short_libelle", type="string", length=255, nullable=true)
     */
    private $shortLibelle;


    /**
     * Get idTypeSphere
     *
     * @return integer
     */
    public function getIdTypeSphere()
    {
        return $this->idTypeSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeSphere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set shortLibelle
     *
     * @param string $shortLibelle
     *
     * @return TypeSphere
     */
    public function setShortLibelle($shortLibelle)
    {
        $this->shortLibelle = $shortLibelle;

        return $this;
    }

    /**
     * Get shortLibelle
     *
     * @return string
     */
    public function getShortLibelle()
    {
        return $this->shortLibelle;
    }
}
