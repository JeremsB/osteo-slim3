<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAntecedent
 *
 * @ORM\Table(name="type_antecedent")
 * @ORM\Entity
 */
class TypeAntecedent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_type_antecedent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAntecedent;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;


    /**
     * Get idTypeAntecedent
     *
     * @return integer
     */
    public function getIdTypeAntecedent()
    {
        return $this->idTypeAntecedent;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeAntecedent
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
     * @ORM\Column(name="id_type_antecedent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAntecedent;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;


    /**
     * Get idTypeAntecedent
     *
     * @return integer
     */
    public function getIdTypeAntecedent()
    {
        return $this->idTypeAntecedent;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeAntecedent
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
     * @ORM\Column(name="id_type_antecedent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeAntecedent;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;


    /**
     * Get idTypeAntecedent
     *
     * @return integer
     */
    public function getIdTypeAntecedent()
    {
        return $this->idTypeAntecedent;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeAntecedent
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
