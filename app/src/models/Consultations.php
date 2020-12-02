<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * Consultations
 *
 * @ORM\Table(name="consultations", indexes={@ORM\Index(name="consultations_modes_reglement_id_mode_reglement_fk", columns={"mode_reglement"}), @ORM\Index(name="consultations_patients_id_patient_fk", columns={"patient"})})
 * @ORM\Entity
 */
class Consultations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_consultation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsultation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_consult", type="datetime", nullable=true)
     */
    private $dateConsult;

    /**
     * @var string
     *
     * @ORM\Column(name="description_consult", type="text", length=65535, nullable=true)
     */
    private $descriptionConsult;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=true)
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    /**
     * @var \ModesReglement
     *
     * @ORM\ManyToOne(targetEntity="ModesReglement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mode_reglement", referencedColumnName="id_mode_reglement")
     * })
     */
    private $modeReglement;

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
     * Get idConsultation
     *
     * @return integer
     */
    public function getIdConsultation()
    {
        return $this->idConsultation;
    }

    /**
     * Set dateConsult
     *
     * @param \DateTime $dateConsult
     *
     * @return Consultations
     */
    public function setDateConsult($dateConsult)
    {
        $this->dateConsult = $dateConsult;

        return $this;
    }

    /**
     * Get dateConsult
     *
     * @return \DateTime
     */
    public function getDateConsult()
    {
        return $this->dateConsult;
    }

    /**
     * Set descriptionConsult
     *
     * @param string $descriptionConsult
     *
     * @return Consultations
     */
    public function setDescriptionConsult($descriptionConsult)
    {
        $this->descriptionConsult = $descriptionConsult;

        return $this;
    }

    /**
     * Get descriptionConsult
     *
     * @return string
     */
    public function getDescriptionConsult()
    {
        return $this->descriptionConsult;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Consultations
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Consultations
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set modeReglement
     *
     * @param \ModesReglement $modeReglement
     *
     * @return Consultations
     */
    public function setModeReglement(\ModesReglement $modeReglement = null)
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    /**
     * Get modeReglement
     *
     * @return \ModesReglement
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Consultations
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
     * @var integer
     *
     * @ORM\Column(name="id_consultation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsultation;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_consult", type="datetime", nullable=true)
     */
    private $dateConsult;

    /**
     * @var string
     *
     * @ORM\Column(name="description_consult", type="text", length=65535, nullable=true)
     */
    private $descriptionConsult;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=true)
     */
    private $montant;

    /**
     * @var \ModesReglement
     *
     * @ORM\ManyToOne(targetEntity="ModesReglement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mode_reglement", referencedColumnName="id_mode_reglement")
     * })
     */
    private $modeReglement;

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
     * Get idConsultation
     *
     * @return integer
     */
    public function getIdConsultation()
    {
        return $this->idConsultation;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Consultations
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set dateConsult
     *
     * @param \DateTime $dateConsult
     *
     * @return Consultations
     */
    public function setDateConsult($dateConsult)
    {
        $this->dateConsult = $dateConsult;

        return $this;
    }

    /**
     * Get dateConsult
     *
     * @return \DateTime
     */
    public function getDateConsult()
    {
        return $this->dateConsult;
    }

    /**
     * Set descriptionConsult
     *
     * @param string $descriptionConsult
     *
     * @return Consultations
     */
    public function setDescriptionConsult($descriptionConsult)
    {
        $this->descriptionConsult = $descriptionConsult;

        return $this;
    }

    /**
     * Get descriptionConsult
     *
     * @return string
     */
    public function getDescriptionConsult()
    {
        return $this->descriptionConsult;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Consultations
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set modeReglement
     *
     * @param \ModesReglement $modeReglement
     *
     * @return Consultations
     */
    public function setModeReglement(\ModesReglement $modeReglement = null)
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    /**
     * Get modeReglement
     *
     * @return \ModesReglement
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Consultations
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
     * @var integer
     *
     * @ORM\Column(name="id_consultation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsultation;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text", length=65535, nullable=true)
     */
    private $motif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_consult", type="datetime", nullable=true)
     */
    private $dateConsult;

    /**
     * @var string
     *
     * @ORM\Column(name="description_consult", type="text", length=65535, nullable=true)
     */
    private $descriptionConsult;

    /**
     * @var integer
     *
     * @ORM\Column(name="montant", type="integer", nullable=true)
     */
    private $montant;

    /**
     * @var \ModesReglement
     *
     * @ORM\ManyToOne(targetEntity="ModesReglement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mode_reglement", referencedColumnName="id_mode_reglement")
     * })
     */
    private $modeReglement;

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
     * Get idConsultation
     *
     * @return integer
     */
    public function getIdConsultation()
    {
        return $this->idConsultation;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Consultations
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set dateConsult
     *
     * @param \DateTime $dateConsult
     *
     * @return Consultations
     */
    public function setDateConsult($dateConsult)
    {
        $this->dateConsult = $dateConsult;

        return $this;
    }

    /**
     * Get dateConsult
     *
     * @return \DateTime
     */
    public function getDateConsult()
    {
        return $this->dateConsult;
    }

    /**
     * Set descriptionConsult
     *
     * @param string $descriptionConsult
     *
     * @return Consultations
     */
    public function setDescriptionConsult($descriptionConsult)
    {
        $this->descriptionConsult = $descriptionConsult;

        return $this;
    }

    /**
     * Get descriptionConsult
     *
     * @return string
     */
    public function getDescriptionConsult()
    {
        return $this->descriptionConsult;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Consultations
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return integer
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set modeReglement
     *
     * @param \ModesReglement $modeReglement
     *
     * @return Consultations
     */
    public function setModeReglement(\ModesReglement $modeReglement = null)
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    /**
     * Get modeReglement
     *
     * @return \ModesReglement
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Consultations
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
}
