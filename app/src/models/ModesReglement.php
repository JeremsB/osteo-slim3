<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * ModesReglement
 *
 * @ORM\Table(name="modes_reglement")
 * @ORM\Entity
 */
class ModesReglement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_mode_reglement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;


    /**
     * Get idModeReglement
     *
     * @return integer
     */
    public function getIdModeReglement()
    {
        return $this->idModeReglement;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ModesReglement
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
     * @var integer
     *
     * @ORM\Column(name="id_mode_reglement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;


    /**
     * Get idModeReglement
     *
     * @return integer
     */
    public function getIdModeReglement()
    {
        return $this->idModeReglement;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ModesReglement
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
     * @var integer
     *
     * @ORM\Column(name="id_mode_reglement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModeReglement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;


    /**
     * Get idModeReglement
     *
     * @return integer
     */
    public function getIdModeReglement()
    {
        return $this->idModeReglement;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ModesReglement
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
}
