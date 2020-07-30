<?php


namespace App\Model;
use AgepReponses;
use Doctrine\ORM\Mapping as ORM;

/**
 * JoInvites
 *
 * @ORM\Table(name="JO_INVITES", indexes={@ORM\Index(name="IDX_8F0166CFCCAE05D", columns={"REPONSE_ID"})})
 * @ORM\Entity
 */
class JoInvites
{
    /**
     * @var integer
     *
     * @ORM\Column(name="INVITES_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $invitesId;

    /**
     * @var string
     *
     * @ORM\Column(name="CIV", type="string", length=50, nullable=true)
     */
    private $civ;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="TEL_PORTABLE", type="string", length=20, nullable=true)
     */
    private $telPortable;

    /**
     * @var string
     *
     * @ORM\Column(name="ENTREPRISE", type="string", length=50, nullable=true)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="FONCTION", type="string", length=50, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="CODE_NAF", type="string", length=50, nullable=true)
     */
    private $codeNaf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EST_CLIENT", type="boolean", nullable=true)
     */
    private $estClient;

    /**
     * @var JoReponses
     *
     * @ORM\ManyToOne(targetEntity="JoReponses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="REPONSE_ID", referencedColumnName="REPONSE_ID")
     * })
     */
    private $reponse;

    /**
     * @var string
     *
     * @ORM\Column(name="HASH", type="string", length=50, nullable=true)
     */
    private $hash;

    /**
     * Get invitesId
     *
     * @return integer
     */
    public function getInvitesId()
    {
        return $this->invitesId;
    }

    /**
     * Set civ
     *
     * @param string $civ
     *
     * @return JoInvites
     */
    public function setCiv($civ)
    {
        $this->civ = $civ;

        return $this;
    }

    /**
     * Get civ
     *
     * @return string
     */
    public function getCiv()
    {
        return $this->civ;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return JoInvites
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return JoInvites
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email1
     *
     * @param string $email
     *
     * @return JoInvites
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email1
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telPortable
     *
     * @param string $telPortable
     *
     * @return JoInvites
     */
    public function setTelPortable($telPortable)
    {
        $this->telPortable = $telPortable;

        return $this;
    }

    /**
     * Get telPortable
     *
     * @return string
     */
    public function getTelPortable()
    {
        return $this->telPortable;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return JoInvites
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return JoInvites
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonctions
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set codeNaf
     *
     * @param string $codeNaf
     *
     * @return JoInvites
     */
    public function setCodeNaf($codeNaf)
    {
        $this->codeNaf = $codeNaf;

        return $this;
    }

    /**
     * Get codeNaf
     *
     * @return string
     */
    public function getCodeNaf()
    {
        return $this->codeNaf;
    }

    /**
     * Set estClient
     *
     * @param boolean $estClient
     *
     * @return JoInvites
     */
    public function setEstClient($estClient)
    {
        $this->estClient = $estClient;

        return $this;
    }

    /**
     * Get estClient
     *
     * @return boolean
     */
    public function getEstClient()
    {
        return $this->estClient;
    }

    /**
     * Set reponse
     *
     * @param JoReponses $reponse
     *
     * @return JoInvites
     */
    public function setReponse(\App\Model\JoReponses $reponse = null)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return JoReponses
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set hash
     *
     * @param string $hash
     *
     * @return JoInvites
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

}

