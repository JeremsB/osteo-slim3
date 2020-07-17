<?php


namespace App\Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * AgepReponses
 *
 * @ORM\Table(name="JO_REPONSES", indexes={@ORM\Index(name="IDX_253480723CF173BE", columns={"INVITES_ID"})})
 * @ORM\Entity
 */
class JoReponses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="REPONSE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reponseId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PARTICIPE", type="boolean", nullable=true)
     */
    private $participe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="SUPPR", type="boolean", nullable=true)
     */
    private $suppr;

    /*
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="REPONSE_DATE", type="datetime", nullable=true)
     */
    //private $reponseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="REPONSE_DATE", type="string", nullable=true)
     */
    private $reponseDate;

    /**
     * @var JoInvites
     *
     * @ORM\ManyToOne(targetEntity="JoInvites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="INVITES_ID", referencedColumnName="INVITES_ID")
     * })
     */
    private $invites;

    /**
     * @var boolean
     *
     * @ORM\Column(name="LIEN_CONF", type="boolean", nullable=true)
     */
    private $lienConf;

    /**
     * Get reponseId
     *
     * @return integer
     */
    public function getReponseId()
    {
        return $this->reponseId;
    }

    /**
     * Set participe
     *
     * @param boolean $participe
     *
     * @return JoReponses
     */
    public function setParticipe($participe)
    {
        $this->participe = $participe;

        return $this;
    }

    /**
     * Get participe
     *
     * @return boolean
     */
    public function getParticipe()
    {
        return $this->participe;
    }

    /**
     * Set suppr
     *
     * @param boolean $suppr
     *
     * @return JoReponses
     */
    public function setSuppr($suppr)
    {
        $this->suppr = $suppr;

        return $this;
    }

    /**
     * Get suppr
     *
     * @return boolean
     */
    public function getSuppr()
    {
        return $this->suppr;
    }

    /**
     * Set reponseDate
     *
     * @param string $reponseDate
     *
     * @return JoReponses
     */
    public function setReponseDate($reponseDate)
    {
        $this->reponseDate = $reponseDate;

        return $this;
    }

    /**
     * Get reponseDate
     *
     * @return string
     */
    public function getReponseDate()
    {
        return $this->reponseDate;
    }

    /**
     * Set invites
     *
     * @param JoInvites $invites
     *
     * @return AgepReponses
     */
    public function setInvites(JoInvites $invites = null)
    {
        $this->invites = $invites;

        return $this;
    }

    /**
     * Get invites
     *
     * @return JoInvites
     */
    public function getInvites()
    {
        return $this->invites;
    }

    /**
     * Set lienConf
     *
     * @param boolean $lienConf
     *
     * @return JoReponses
     */
    public function setLienConf($lienConf)
    {
        $this->lienConf = $lienConf;

        return $this;
    }

    /**
     * Get lienConf
     *
     * @return boolean
     */
    public function getLienConf()
    {
        return $this->lienConf;
    }
}

