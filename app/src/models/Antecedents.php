<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * Antecedents
 *
 * @ORM\Table(name="antecedents", indexes={@ORM\Index(name="antecedents_patients_id_patient_fk", columns={"patient"}), @ORM\Index(name="antecedents_type_antecedent_id_type_antecedent_fk", columns={"type"})})
 * @ORM\Entity
 */
class Antecedents
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_antecedents", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAntecedents;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ant", type="date", nullable=true)
     */
    private $dateAnt;

    /**
     * @var integer
     *
     * @ORM\Column(name="libelle", type="integer", nullable=true)
     */
    private $libelle;

    /**
     * @var \Patients
     *
     * @ORM\ManyToOne(targetEntity="Patients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient", referencedColumnName="id_patient")
     * })
     */
    private $patient;

    /**
     * @var \TypeAntecedent
     *
     * @ORM\ManyToOne(targetEntity="TypeAntecedent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_antecedent")
     * })
     */
    private $type;


    /**
     * Get idAntecedents
     *
     * @return integer
     */
    public function getIdAntecedents()
    {
        return $this->idAntecedents;
    }

    /**
     * Set dateAnt
     *
     * @param \DateTime $dateAnt
     *
     * @return Antecedents
     */
    public function setDateAnt($dateAnt)
    {
        $this->dateAnt = $dateAnt;

        return $this;
    }

    /**
     * Get dateAnt
     *
     * @return \DateTime
     */
    public function getDateAnt()
    {
        return $this->dateAnt;
    }

    /**
     * Set libelle
     *
     * @param integer $libelle
     *
     * @return Antecedents
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return integer
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Antecedents
     */
    public function setPatient(\Patients $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Patients
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set type
     *
     * @param \TypeAntecedent $type
     *
     * @return Antecedents
     */
    public function setType(\TypeAntecedent $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeAntecedent
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_antecedents", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAntecedents;

    /**
     * @var integer
     *
     * @ORM\Column(name="libelle", type="integer", nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ant", type="date", nullable=true)
     */
    private $dateAnt;

    /**
     * @var \Patients
     *
     * @ORM\ManyToOne(targetEntity="Patients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient", referencedColumnName="id_patient")
     * })
     */
    private $patient;

    /**
     * @var \TypeAntecedent
     *
     * @ORM\ManyToOne(targetEntity="TypeAntecedent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_antecedent")
     * })
     */
    private $type;


    /**
     * Get idAntecedents
     *
     * @return integer
     */
    public function getIdAntecedents()
    {
        return $this->idAntecedents;
    }

    /**
     * Set libelle
     *
     * @param integer $libelle
     *
     * @return Antecedents
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return integer
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set dateAnt
     *
     * @param \DateTime $dateAnt
     *
     * @return Antecedents
     */
    public function setDateAnt($dateAnt)
    {
        $this->dateAnt = $dateAnt;

        return $this;
    }

    /**
     * Get dateAnt
     *
     * @return \DateTime
     */
    public function getDateAnt()
    {
        return $this->dateAnt;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Antecedents
     */
    public function setPatient(\Patients $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Patients
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set type
     *
     * @param \TypeAntecedent $type
     *
     * @return Antecedents
     */
    public function setType(\TypeAntecedent $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeAntecedent
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_antecedents", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAntecedents;

    /**
     * @var integer
     *
     * @ORM\Column(name="libelle", type="integer", nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ant", type="date", nullable=true)
     */
    private $dateAnt;

    /**
     * @var \Patients
     *
     * @ORM\ManyToOne(targetEntity="Patients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient", referencedColumnName="id_patient")
     * })
     */
    private $patient;

    /**
     * @var \TypeAntecedent
     *
     * @ORM\ManyToOne(targetEntity="TypeAntecedent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_antecedent")
     * })
     */
    private $type;


    /**
     * Get idAntecedents
     *
     * @return integer
     */
    public function getIdAntecedents()
    {
        return $this->idAntecedents;
    }

    /**
     * Set libelle
     *
     * @param integer $libelle
     *
     * @return Antecedents
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return integer
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set dateAnt
     *
     * @param \DateTime $dateAnt
     *
     * @return Antecedents
     */
    public function setDateAnt($dateAnt)
    {
        $this->dateAnt = $dateAnt;

        return $this;
    }

    /**
     * Get dateAnt
     *
     * @return \DateTime
     */
    public function getDateAnt()
    {
        return $this->dateAnt;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Antecedents
     */
    public function setPatient(\Patients $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \Patients
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set type
     *
     * @param \TypeAntecedent $type
     *
     * @return Antecedents
     */
    public function setType(\TypeAntecedent $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeAntecedent
     */
    public function getType()
    {
        return $this->type;
    }
}
