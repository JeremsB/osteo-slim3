<?php

namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * Spheres
 *
 * @ORM\Table(name="spheres", indexes={@ORM\Index(name="spheres_patients_id_patient_fk", columns={"patient"}), @ORM\Index(name="spheres_type_sphere_id_type_sphere_fk", columns={"type"})})
 * @ORM\Entity
 */
class Spheres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", length=65535, nullable=true)
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
     * @var \TypeSphere
     *
     * @ORM\ManyToOne(targetEntity="TypeSphere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_sphere")
     * })
     */
    private $type;


    /**
     * Get idSphere
     *
     * @return integer
     */
    public function getIdSphere()
    {
        return $this->idSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Spheres
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
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Spheres
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
     * @param \TypeSphere $type
     *
     * @return Spheres
     */
    public function setType(\TypeSphere $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeSphere
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", length=65535, nullable=true)
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
     * @var \TypeSphere
     *
     * @ORM\ManyToOne(targetEntity="TypeSphere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_sphere")
     * })
     */
    private $type;


    /**
     * Get idSphere
     *
     * @return integer
     */
    public function getIdSphere()
    {
        return $this->idSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Spheres
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
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Spheres
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
     * @param \TypeSphere $type
     *
     * @return Spheres
     */
    public function setType(\TypeSphere $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeSphere
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sphere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSphere;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text", length=65535, nullable=true)
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
     * @var \TypeSphere
     *
     * @ORM\ManyToOne(targetEntity="TypeSphere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type", referencedColumnName="id_type_sphere")
     * })
     */
    private $type;


    /**
     * Get idSphere
     *
     * @return integer
     */
    public function getIdSphere()
    {
        return $this->idSphere;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Spheres
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
     * Set patient
     *
     * @param \Patients $patient
     *
     * @return Spheres
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
     * @param \TypeSphere $type
     *
     * @return Spheres
     */
    public function setType(\TypeSphere $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TypeSphere
     */
    public function getType()
    {
        return $this->type;
    }
}
